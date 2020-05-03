<?php

class Model {

    private static $connection;
    private static $config;


    public static function set(array $array) {
        
        self::$config = $array;
    }

    public static function connect() {
        
        $db = self::$config["db"];
        $host = self::$config["host"];
        $db_name = self::$config["db_name"];
        $user = self::$config["user"];
        $pass = self::$config["pass"];

        try {

            self::$connection = new PDO ("$db:host=$host;dbname=$db_name",$user,$pass);

        }catch(Exception $e) {

            echo $e;
        }

        return self::$connection;
    }

    public static function registerproduct($type, $p_name, $q_box) {
        
        $query = self::connect()->prepare("INSERT INTO products (type, name, quantity) VALUES (?,?,?)");

        return $query->execute([$type, $p_name, $q_box]);
    
    }
    
    public static function login ($user, $pass) {

        $query = self::connect()->prepare("SELECT * FROM `admin` WHERE `user`=:user and `pass`=:pass");
        
        $query->execute([
            "user" => $user,
            "pass"  => $pass
        ]);

        $row = $query->rowCount();
        
        if ($row != 0) {
            $row = $query->fetch(PDO::FETCH_ASSOC);
        }

        return $row;
    }

    public static function getpreviousproduct($room) {

        //consulta en donde se elige el id mas alto del producto empacado en esa habitacion, el id mas alto sera el ultimo terminado

        $query = self::connect()->prepare(("SELECT * FROM `finished_products` WHERE `ID` = (SELECT MAX(ID) FROM `finished_products`) AND `room`=:room"));
        $query->execute(["room"=>$room]);
        
        $result = $query->rowCount();

        if ($result !=0 ) {
            $row = $query->fetch(PDO::FETCH_ASSOC);   
        }else {
            $row = "null";
        }
        
        return $row;

    }
}

?>