<?php
use PhoominS\LineUfund\Configuration\Configuration;
require(dirname(__DIR__) . '/global.php');

$config = new Configuration;

// try to connect sql server with PDO
try {
    $db = new PDO(
        'sqlsrv:server=' . $config->ConfigDB()->IP  . ';Database=' . $config->ConfigDB()->Database
        , $config->ConfigDB()->User
        , $config->ConfigDB()->Password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    $msg = 'Error: ' . $e->getCode() . ' for ' . $e->getMessage();
    echo $msg;
    die;
}

$insert_message_log = <<<EOT
INSERT INTO LineMessageLogs (
    [events],
    [destination],
    [webhookEventId],
    [Text],
    [replyToken],
    [mode],
    [createTime]
) VALUES (
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?
)
EOT;

// Declare datetime with pattern 2000-01-01 00:00:00
date_default_timezone_set('Asia/Bangkok');
$datetime = date('Y-m-d H:i:s');

// Declare post variable with post request
$post = json_decode(file_get_contents('php://input'));

// check post has event
$stmt = $db->prepare($insert_message_log);

$stmt->execute([
    $post->events[0]->type,
    $post->destination,
    $post->events[0]->webhookEventId,
    json_encode($post->events[0]),
    $post->events[0]->replyToken,
    $post->events[0]->mode,
    $datetime
]);

// check post event is joined group
if ($post->events[0]->type == 'join') {
    $groupId = $post->events[0]->source->groupId;

    // get Group information by group id
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.line.me/v2/bot/group/' . $groupId . '/summary',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer c5tA1zdhW2A9P3yr3ZJiuZ6yFCQQFwI8aEXAgqrB1cPp+ZQcho2z+lHJzk9ewIar1eSyEPRVKrOKcyX7csuQ2ZzhOhwC0AjqTMu6GPwOZslz5kzAT7a20jo3lp6Vyfqmf4eu98f7Oz2mX8mDzNRBdQdB04t89/1O/w1cDnyilFU='
    ),
    ));

    $response = json_decode(curl_exec($curl));

    curl_close($curl);

    $sql_insert_group = <<<EOT
    INSERT INTO LineUsers (
        UserGroup,
        GroupIds,
        GroupName,
        JoinBy,
        CreateTime
    ) VALUES (
        ?,
        ?,
        ?,
        ?,
        ?
    )
EOT; 

    // insert into database group
    $stmt = $db->prepare($sql_insert_group);
    $stmt->execute([
        1,
        $response->groupId,
        $response->groupName,
        $post->destination,
        $datetime
    ]);
}