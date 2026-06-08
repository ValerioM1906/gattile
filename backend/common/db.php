<?php 
class DB{
    public static function getLettore()
    {
        return self::connetti("lecture", "P@ssw0rd!");
    }

    public static function getRegistratore()
    {
        return self::connetti("registrator", "ToB31nsert?");
    }
    
    private static function connetti($username, $password){
        $conn = new mysqli("localhost", $username, $password, "gattile_db");
        return $conn;
    }
}
?>