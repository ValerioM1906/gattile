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

    // 4. Verifichiamo se l'utente esiste E se la password coincide con l'hash nel DB
    if ($utente->num_rows>0) {
        $r=$utente->fetch_assoc();
        // Se l'utente ha spuntato il "Ricordami", qui andrebbe anche la logica del cookie da 72h
        if($r===null)
            {
                echo json_encode([
            'status' => 'OK', // Uniforma l'indice (usi 'stato' o 'status' nel JS?)
            'message' => 'LOGGATO',
            'nome' => 'nullo',       // Usiamo i nomi reali delle colonne estratti dal DB
            'cognome' => 'nullo'
        ]);}
        else{   
        // Risposta JSON corretta verso JavaScript
        echo json_encode([
            'status' => 'OK', // Uniforma l'indice (usi 'stato' o 'status' nel JS?)
            'message' => 'LOGGATO',
            'nome' => $r['nome'],       // Usiamo i nomi reali delle colonne estratti dal DB
            'cognome' => $r['cognome']
        ]);}
        }
else{
    echo json_encode(['status' => 'error', 'message' => $dati['username'].' '.$dati['password']]);
    exit;
}
?>