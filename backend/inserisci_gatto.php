<?php 
include 'common/header.php';
if(!(isset($_SERVER['is_admin']) and $_SERVER['is_admin']))
    {
        echo '<p>NON autorizzato</p>';
        include 'common/footer.php';
        exit;
    }
?>




