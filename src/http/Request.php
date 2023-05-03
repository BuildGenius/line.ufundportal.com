<?php

namespace PhoominS\LineUfund\Http;

class Request {
    public function __construct()
    {
        $this->get = [];
        $this->post = [];
        
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->setGet($_GET);
        } else {

        }
    }
    public function get($name, $default = "") {
        return isset($this->$name) ? $this->$name:$default;
    }
    public function post() {

    }
    private function set() {

    }
    function setGet($getarr) {
        $this->get = $getarr;

        foreach($getarr as $label => $val) {
            $this->$label = $val;
        }

        return $this;
    }
    function setPost() {

    }
}