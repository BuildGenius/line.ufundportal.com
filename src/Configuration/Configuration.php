<?php

namespace PhoominS\LineUfund\Configuration;

class Configuration {
    function __construct() {
        $this->jsonfile = file_get_contents(dirname(__DIR__, 2) . '/configuration.json');
        $this->phpConfig = json_decode($this->jsonfile);
    }

    function getConfig() {
        return $this->phpConfig;
    }

    function getLineBotToken() {
        return $this->getConfig()->linebot->ChannelToken;
    }

    function getLineBotSecret() {
        return $this->getConfig()->linebot->ChannelSecret;
    }

    function ConfigDB() {
        return $this->getConfig()->SQLConnection;
    }
}