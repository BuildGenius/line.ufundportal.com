<?php
require(dirname(__DIR__) . '/global.php');

use PhoominS\LineUfund\MinimalLine\reply_message;
use PhoominS\LineUfund\Http\Request;

$rp = new reply_message(ONPROD);
$rp->setChanelToken('fDlox1shrxTaCZJnFaNl55aVNDh/M1fxAL59kJ/a3ZI3ATi5EU1fu5jKJvLRQMGB0ffLFAzhQ6uOY7Jqy2MprwtWXr7pCbJ7fTfeuZ9CNHG/nHz+4RwyfccMyXeI8gas2XJSmoEK0DE9NGC5paKeZwdB04t89/1O/w1cDnyilFU=')
->setChanelSecret('104a6fa81b58e4eb79ecc51fc0dd0230');
$project = isset($_GET['project'])? $_GET['project']:'';
$msg = isset($_GET['msg'])? $_GET['msg']:'';

switch ($project) {
    case 'auto run receipt' :
            $rp->setMessage('Receipt เริ่มรันแล้วนะครับ')
            ->setUserId(false ? 'Ca62f4126c47d85c656a2e897e627891d':'Ua0c2a3546f00c92b931fe127b7d30220')
            ->send();

            $rp->setSticker('8522', '16581269')
            ->setUserId(false ? 'Ca62f4126c47d85c656a2e897e627891d':'Ua0c2a3546f00c92b931fe127b7d30220')
            ->send();
        break;
    case 'trigger':
            $rp->setMessage('Trigger "TGG_auto_bill_payment" is disable')
            ->setUserId(false ? 'Ca62f4126c47d85c656a2e897e627891d':'Ua0c2a3546f00c92b931fe127b7d30220')
            ->send();

            $rp->setSticker('11538', '51626496')
            ->setUserId(false ? 'Ca62f4126c47d85c656a2e897e627891d':'Ua0c2a3546f00c92b931fe127b7d30220')
            ->send();
        break;
    case 'gen invoice': 
            $rp->setMessage('SQL to completed gen invoice and start convert Barcode.')
            ->setUserId(false ? 'Ca62f4126c47d85c656a2e897e627891d':'Ua0c2a3546f00c92b931fe127b7d30220')
            ->send();

            $rp->setSticker('11538', '51626496')
            ->setUserId(false ? 'Ca62f4126c47d85c656a2e897e627891d':'Ua0c2a3546f00c92b931fe127b7d30220')
            ->send();
        break;
    default: 
            $req = new Request();

            if ($req->get('msg', '') !== '') {
                $rp->setMessage($msg)
                ->setUserId(false ? 'Ca62f4126c47d85c656a2e897e627891d':'Ua0c2a3546f00c92b931fe127b7d30220')
                ->send();
            }
        break;
}