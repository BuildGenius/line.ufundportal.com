<?php
namespace PhoominS\LineUfund\MinimalLine;

use Exception;

class reply_message {
    function __construct($production = true)
    {
        if ($production == true) {
            $this->httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('fDlox1shrxTaCZJnFaNl55aVNDh/M1fxAL59kJ/a3ZI3ATi5EU1fu5jKJvLRQMGB0ffLFAzhQ6uOY7Jqy2MprwtWXr7pCbJ7fTfeuZ9CNHG/nHz+4RwyfccMyXeI8gas2XJSmoEK0DE9NGC5paKeZwdB04t89/1O/w1cDnyilFU=');
            $this->bot = new \LINE\LINEBot($this->httpClient, ['channelSecret' => '104a6fa81b58e4eb79ecc51fc0dd0230']);
            $this->userId = 'Ca62f4126c47d85c656a2e897e627891d';
        } else {
            $this->httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('fDlox1shrxTaCZJnFaNl55aVNDh/M1fxAL59kJ/a3ZI3ATi5EU1fu5jKJvLRQMGB0ffLFAzhQ6uOY7Jqy2MprwtWXr7pCbJ7fTfeuZ9CNHG/nHz+4RwyfccMyXeI8gas2XJSmoEK0DE9NGC5paKeZwdB04t89/1O/w1cDnyilFU=');
            $this->bot = new \LINE\LINEBot($this->httpClient, ['channelSecret' => '104a6fa81b58e4eb79ecc51fc0dd0230']);
            $this->userId = 'Ua0c2a3546f00c92b931fe127b7d30220';
        }

        return $this;
    }

    function setter($key, $value) {

    }

    function getter() {

    }

    function setSticker($package_id, $sticker_id) {
        $this->textMessageBuilder = new \LINE\LINEBot\MessageBuilder\StickerMessageBuilder($package_id, $sticker_id);

        return $this;
    }

    function setMessage($message) {
        $this->textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);

        return $this;
    }

    function getMessage() {

    }

    function send() {
        try {
            $this->response = $this->bot->pushMessage($this->userId, $this->textMessageBuilder);
            // $this->log->create();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            // $this->setMessage();
            // $this->send();
        }
    }
}