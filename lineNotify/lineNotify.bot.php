<?php
require(dirname(__DIR__) . '/global.php');

use PhoominS\LineUfund\MinimalLine\reply_message;
use PhoominS\LineUfund\Http\Request;
use PhoominS\LineUfund\Configuration\Configuration;

$config = new Configuration;

$rp = reply_message::init($config->getLineBotToken()
, $config->getLineBotSecret());

// try to connect sql server with PDO
try {
    $db = new PDO(
    'sqlsrv:server=' . $config->ConfigDB()->IP . ';Database=' . $config->ConfigDB()->Database
    , $config->ConfigDB()->User
    , $config->ConfigDB()->Password
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    $msg = 'Error: ' . $e->getCode() . ' for ' . $e->getMessage();
    echo $msg;
    die;
}

$project = isset($_GET['project'])? $_GET['project']:'';
$msg = isset($_GET['msg'])? $_GET['msg']:'';
$K2_userkey = isset($_GET['k2userkey'])? $_GET['k2userkey']:'';
$groupName = isset($_GET['group_name'])? $_GET['group_name']:'';

$k2UserKey = function ($userkey) use ($db) {
    $sql = <<<EOT
    SELECT GroupIds 
    FROM [LineUsers]
    WHERE [k2_userId] = ?
    EOT;

    $stmt = $db->prepare($sql);
    $stmt->execute([$userkey]);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
};

$userId = function ($groupName) use ($db) {
    $sql = <<<EOT
    SELECT GroupIds
    FROM [LineUsers]
    WHERE [GroupName] = ?
    EOT;

    $stmt = $db->prepare($sql);
    $stmt->execute([$groupName]);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
};

if (isset($_GET['group_name'])) {
    $userIds = $userId($groupName);
} else {
    $userIds = $k2UserKey($K2_userkey);
}

switch ($project) {
    case 'auto run receipt' :
            $rp->setMessage('Receipt เริ่มรันแล้วนะครับ');

            for ($i = 0;$i < count($userIds);$i++) {
                $rp->setUserId($userIds[$i]['GroupIds'])
                ->send();    
            }
        break;
    case 'trigger':
            $rp->setMessage('Trigger "TGG_auto_bill_payment" is disable');

            for ($i = 0;$i < count($userIds);$i++) {
                $rp->setUserId($userIds[$i]['GroupIds'])
                ->send();    
            }
        break;
    case 'gen invoice': 
            $rp->setMessage('SQL to completed gen invoice and start convert Barcode.');

            for ($i = 0;$i < count($userIds);$i++) {
                $rp->setUserId($userIds[$i]['GroupIds'])
                ->send();    
            }
        break;
    default: 
            if ($msg !== '') {
                $rp->setMessage($msg);
                
                if (isset($_GET['group_name'])) {
                    $userIds = $userId($groupName);
                } else {
                    $userIds = $k2UserKey($K2_userkey);
                }

                for ($i = 0;$i < count($userIds);$i++) {
                    $rp->setUserId($userIds[$i]['GroupIds'])
                    ->send();    
                }
            }
        break;
}