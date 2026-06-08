<?php 
include_once 'common/header.php'
?>
<div>
    <form action="" method="post", name="formRegistrazione">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome">
        <label for="cognome">Cognome:</label>
        <input type="text" id="cognome" name="cognome">
        <label for="cognome">Indirizzo:</label>
        <input type="text" id="indirizzo" name="indirizzo">
        <label for="username">Citta:</label>
        <input type="text" id="citta" name="citta">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <label for="password">Conferma password:</label>
        <input type="password" id="conferma_password" name="conferma_password">

        <input type="submit" value="Registrati">
        
    </form>
    <script src="js/validaRegistrazione.js"></script>
</div>

<?php 
include_once 'common/footer.php'
?>