<?php
namespace PhoominS\LineUfund\MinimalLine;

use Exception;

class reply_message {
    public static function getInstance() {
        $linebot = new reply_message;
    
        return $linebot;
    }
    function setter($key, $value) {
        $this->$key = $value;
        return $this;
    }

    function getter() {

    }

    public static function init($chanelToken, $chanelSecret) {
        $lineBot = reply_message::getInstance();
        $lineBot->setChanelToken($chanelToken);
        $lineBot->setChanelSecret($chanelSecret);

        $lineBot->httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($lineBot->ChanelToken);
        $lineBot->bot = new \LINE\LINEBot($lineBot->httpClient, ['channelSecret' => $lineBot->ChanelSecret]);

        return $lineBot;
    }

    function setChanelToken($chanelToken) {
        $this->setter('ChanelToken', $chanelToken);
        
        return $this;
    }

    function setChanelSecret($chanelSecret) {
        $this->setter('ChanelSecret', $chanelSecret);
        
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
            return $this->response;
        } catch (Exception $ex) {
            return 'Err code' . $ex->getCode() . ': ' . $ex->getMessage();
        }
    }
}