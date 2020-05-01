<?php

class Model {

    private static $connection;
    private static $config;


    public static function set(array $array) {
        
        self::$config = $array;
    }

    public static function connect() {

        $db = self::$config["db"];
        $host = self::$config["localhost"];
        $db_name = self::$config["db_name"];
        $user = self::$config["user"];
        $pass = self::$config["pass"];

        try {

            $self::$connection = new PDO ("$db:host=$host;dbname=$db_name",$user,$pass);

        }catch(Exception $e) {

            throw new $e;
        }

        return $self::$connection;
    }

    public static function registerproduct($name, $quantityBox, $quantityPalet, $departure_room, $packing_room) {
        // empezamos a registrar producto
    }

}



?>