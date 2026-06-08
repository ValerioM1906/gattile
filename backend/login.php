<?php 
include_once 'common/header.php';
?>

    <div>
        <form action="" method="post" name="form_login">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <label for="password">Password:</label>
            <input type="text" id="password" name="password">
            <input type="submit" value="Login">
            <label for="remember">Ricordami:</label>
            <input type="checkbox" id="remember" name="remember">
        </form>
    </div>
    <div id="prova"></div>
    <script src="js/validaLogin.js">
    </script>


<?php 
include_once "common/footer.php"
?>
