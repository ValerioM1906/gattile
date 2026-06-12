<?php
session_start();
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
require_once '../common/db.php';
$c=DB::getLettore();
$res=$c->query('select *
from gatti g 
order by g.data_arrivo desc;');
if($res && $res->num_rows>0){
    while ($row = $result->fetch_assoc()) {
        $gatti[] = $row;
    }
}

echo json_encode($gatti);
$c->close();



?>