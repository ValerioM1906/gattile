<?php
session_start();
require_once '../common/db.php';
header('Content-Type: application/json');
$dati = json_decode(file_get_contents('php://input'), true);
$c = DB::getLettore();
$query= $c->prepare('select *
from utenti u 
where u.username = ? and u.password = ? ;');
$query->bind_param("ss", $dati['username'], $dati['password']);
$query->execute();
$utente = $query->get_result();

    
    if ($utente->num_rows>0) {
        $r=$utente->fetch_assoc();   
        if ($dati['remember']==true)
            setcookie('ricordami', $dati['username'], time()+72*3600, '/', '', false, true);
        echo json_encode([
            'status' => 'OK', 
            'message' => 'LOGGATO',
            'nome' => $r['nome'],    
            'cognome' => $r['cognome']
        ]);}
        
else{
    echo json_encode(['status' => 'error', 'message' => $dati['username'].' '.$dati['password']]);
    exit;
}
?>