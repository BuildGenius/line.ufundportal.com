<?php
require(dirname(__DIR__) . '/vendor/autoload.php');
use PhoominS\models\line_webhook_request;

$post = $_POST;
$webhook = new line_webhook_request($post);
var_dump($_POST);

for ($i = 0;$i < count($post);$i++) {
    $block_msg = $post[$i]['events'];

    $webhook->setWebhook_id($block_msg['webhookEventId']);
    $webhook->setEvents($block_msg);

    // $webhook->add();
}
