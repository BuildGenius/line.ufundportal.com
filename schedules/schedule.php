<?php
use GO\Scheduler;

$scheduler = new Scheduler();

// check SQL job activities
$scheduler->call(function () {
    $server_name = '192.168.43.203';
    $database = 'HPCOM7';
    $username = 'phoomin.sr';
    $password = 'jH^gCHj$ua';
    // $connection_string = array('Database' => 'HPCOM7', 'UID' => 'phoomin.sr', 'PWD' => 'jH^gCHj$ua');
    $conn = new PDO("sqlsrv:server=$server_name;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = <<<EOT
    USE msdb;
    GO

    EXEC sp_help_jobactivity
EOT;
})->daily(21, 30);