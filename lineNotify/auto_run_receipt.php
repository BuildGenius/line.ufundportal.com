<?php
require_once(dirname(__DIR__) . '/global.php');

use PhoominS\LineUfund\MinimalLine\reply_message;
use PhoominS\LineUfund\Http\Request;

$message = new reply_message(ONPROD);
$req = new Request();

if ($req->get('status') == 'true') {
    $message->setMessage('Receipt เริ่มรันแล้วนะครับ');
    $message->send();

    $message->setSticker('11538', '51626496');
    $message->send();
} else {
    $message->setMessage('Receipt จบการรันแล้วนะครับ');
    $message->send();

    $message->setSticker('11538', '51626496');
    $message->send();
}

