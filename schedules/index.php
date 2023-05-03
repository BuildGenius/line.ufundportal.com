<?php
require(dirname(__DIR__) . '/vendor/autoload.php');

use PhoominS\LineUfund\SQL\deeply;

$table = '<table>';
$conn = new deeply;
$conn->setServer('43.254.133.123');
$conn->setDatabaseName('msdb');
$conn->setUserName('sa');
$conn->setPassword('Com@7ktwoadmin###');

$conn->connection();

$resObj = $conn->query('EXEC sp_help_jobactivity')->result();
$resColumn = $conn->query('EXEC sp_help_jobactivity')->result('array')[0];
$table .= '<thead><tr>';

$table .= "<td>job_name</td>"
. "<td>run_requested_date</td>"
. "<td>start_execution_date</td>"
. "<td>last_executed_step_id</td>"
. "<td>last_executed_step_date</td>"
. "<td>run_status</td>"
. "<td>next_scheduled_run_date</td>";

$table .= '</tr></thead>';

for ($i = 0;$i < count($resObj);$i++) {
        $table .= '<tr><td>' . $resObj[$i]->job_name . '</td>'
        . '<td>' . $resObj[$i]->run_requested_date . '</td>'
        . '<td>' . $resObj[$i]->start_execution_date . '</td>'
        . '<td>' . $resObj[$i]->last_executed_step_id . '</td>'
        . '<td>' . $resObj[$i]->last_executed_step_date . '</td>'
        . '<td>' . $resObj[$i]->run_status . '</td>'
        . '<td>' . $resObj[$i]->next_scheduled_run_date . '</td></tr>';
}

$table .= '</table>';
// $query = <<<EOT
// EXEC msdb.dbo.sp_help_jobactivity
// EOT;

// var_dump($conn->query('')->result());

echo $table;