<?php
require_once(dirname(__DIR__) . '/global.php');

use PhoominS\LineUfund\MinimalLine\reply_message;
use PhoominS\LineUfund\Http\Request;

$message = new reply_message(ONPROD);
$req = new Request();
$message->setMessage($req->msg);
$message->send();