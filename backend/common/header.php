<?php
session_start();
$un='Non loggato';
$admin=false;
if (isset($_SESSION['username'])){
    $un='Non loggato';
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gattile</title>
    <link rel="icon" type="image/x-icon" href="/gattile/backend/img/favicon.ico">
    <link rel="stylesheet" href="/gattile/backend/css/style.css">
</head>
<body>
    <header>
        <h1>TITOLO</h1>
        <nav class="header_nav">
        <a href="">
            Pagina Principale
        </a>
        <a href="">Volontariato</a>
        <?php 
        if(isset($_SESSION['is_admin'])
            && $_SESSION['is_admin'])
        echo '<a href=\'\'>Inserimento gatti </a> ' 
        ?>
        </nav>

    </header>