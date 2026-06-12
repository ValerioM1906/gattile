<?php
session_start();
require_once '../common/db.php';
header('Content-Type: application/json');
$dati = json_decode(file_get_contents('php://input'), true);
$c=DB::getRegistratore();
$c1=DB::getLettore();
$query=$c1->prepare('select *
from utenti u 
where u.username = ? ;');   
$query->bind_param("s", $dati['username']);
$query->execute();  
$result=$query->get_result();
if($result->num_rows>0){
    echo json_encode(['status' => 'error', 'message' => 'Username già esistente']);
    exit;
}
$query=$c->prepare("Insert into utenti(nome, cognome, username, password, indirizzo, is_admin)
                    values(?,?,?,?,?,?)");
$tmp=0;
$query->bind_param('sssssi', $dati['nome'], $dati['cognome'], $dati['username'], $dati['password'], $dati['indirizzo'], $tmp);
$cnt=$query->execute();
if($cnt>0){
    setcookie('ricordami', $dati['username'], time()+72*3600, '/', '', false, true);
    echo json_encode(['status' => 'OK', 'message' => 'Registrazione avvenuta con successo']);
}
else{
    echo json_encode(['status' => 'error', 'message' => 'Errore durante la registrazione']);
}

?>