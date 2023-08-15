<?php
namespace PhoominS\LineUfund\MinimalLine;

use Exception;

class reply_message {
    function setter($key, $value) {
        $this->$key = $value;
        return $this;
    }

    function getter() {

    }

    function setChanelToken($chanelToken) {
        $this->setter('ChanelToken', $chanelToken);
        $this->httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('fDlox1shrxTaCZJnFaNl55aVNDh/M1fxAL59kJ/a3ZI3ATi5EU1fu5jKJvLRQMGB0ffLFAzhQ6uOY7Jqy2MprwtWXr7pCbJ7fTfeuZ9CNHG/nHz+4RwyfccMyXeI8gas2XJSmoEK0DE9NGC5paKeZwdB04t89/1O/w1cDnyilFU=');
        
        return $this;
    }

    function setChanelSecret($chanelSecret) {
        $this->setter('ChanelToken', $chanelSecret);
        $this->bot = new \LINE\LINEBot($this->httpClient, ['channelSecret' => $chanelSecret]);
        
        return $this;
    }

    function setUserId($userId) {
        $this->setter('userId', $userId);
        return $this;
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