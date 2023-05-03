<?php
require(dirname(__DIR__) . '/global.php');

use PhoominS\LineUfund\MinimalLine\reply_message;
use PhoominS\LineUfund\Http\Request;

switch ($_GET['project']) {
    case 'auto run receipt' :
            $rp = new reply_message($onProd);
            $rp->setMessage('Receipt เริ่มรันแล้วนะครับ');
            $rp->send();

            $rp->setSticker('8522', '16581269');
            $rp->send();
        break;
    case 'trigger':
            $rp = new reply_message($onProd);
            $rp->setMessage('Trigger "TGG_auto_bill_payment" is disable');
            $rp->send();

            $rp->setSticker('11538', '51626496');
            $rp->send();
        break;
    case 'gen invoice': 
            $rp = new reply_message($onProd);
            $rp->setMessage('SQL to completed gen invoice and start convert Barcode.');
            $rp->send();

            $rp->setSticker('11538', '51626496');
            $rp->send();
        break;
    default: 
            $rp = new reply_message($onProd);
            $req = new Request();

            if ($req->get('msg', '') !== '') {
                $rp->setMessage($req->msg);
                $rp->send(); 
            }
        break;
}