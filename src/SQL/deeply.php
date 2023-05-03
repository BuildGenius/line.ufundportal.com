<?php
namespace PhoominS\LineUfund\SQL;

use PDO;
use Exception;

class deeply {
    function __construct()
    {
        $this->server = '';
        $this->databaseName = '';
        $this->username = '';
        $this->password = '';
        $this->result = '';

        return $this;
    }

    function set($key, $value) {

    }

    function get($key) {
        return $this->$key;
    }

    function connection() {
        try {
            $this->conn = new PDO("sqlsrv:server=" . $this->get('server') . " ; Database = " . $this->get('databaseName'), $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->conn;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function add() {

    }

    function update() {
        
    }

    function query($query = '') {
        try {
            $conn = $this->connection();
            $this->stmt = $conn->prepare($query);
            $this->stmt->execute();

            return $this;
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    function result($type = 'object') {
        switch ($type) {
            case 'object':
                $this->result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
                break;

            case 'array':
                $this->result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                break;

            case 'key pair':
                $this->result = $this->stmt->fetchAll(PDO::FETCH_KEY_PAIR);
                break;

            case 'header only':
                $this->result = $this->stmt->fetchAll(PDO::FETCH_COLUMN);
                break;
            
            default:
                $this->result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
                break;
        }
        
        return $this->result;
    }

    function setParam() {

    }

    function setUserName ($username) {
        $this->username = $username;
        return $this;
    }

    function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    function setServer($server) {
        $this->server = $server;
        return $this;
    }

    function setDatabaseName($databaseName) {
        $this->databaseName = $databaseName;
        return $this;
    }
}