<?php

class Model {

    private static $connection;
    private static $config;
    private const DEFAULT_RESULT = "NULL";
    private const TABLE_TYPE = "products_%s";

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

    public static function registerproduct($type , $name, $quantity_box, $box_pallet) {
        $type = self::table_type($type);
        $query = self::connect()->prepare("INSERT INTO $type (name, quantity_box, boxes_pallet) VALUES (?,?,?)");
        return $query->execute([$name, $quantity_box, $box_pallet]);
    }
    
    public static function login ($user, $pass) {
        $query = self::connect()->prepare("SELECT * FROM `admin` WHERE `user`=:user and `pass`=:pass");
        $query->execute(["user" => $user,"pass"  => $pass]);
        $row = $query->rowCount();
        if ($row != 0) {
            $row = $query->fetch(PDO::FETCH_ASSOC);
        }
        return $row;
    }

    public static function getpreviousproduct($room) {
        //IT SELECTS THE HIGHER ID, BECAUSE THE HIGHER ID OF THAT TYPE OF PRODUCT ITS THE LATEST FINISHED
        $query = self::connect()->prepare(("SELECT * FROM  `finished_products` WHERE `id`= (SELECT MAX(id) FROM `finished_products` WHERE `room`=:room) AND `room`=:room"));
        $query->execute(["room"=>$room]);
        $row = $query->fetchAll(PDO::FETCH_ASSOC);   
        return $row;
    }

    public static function setroom($room,$name, $lot, $quantity_to_package, $pallets) {
        $query = self::connect()->prepare("INSERT INTO `current_products` (room, name, lot, quantity_to_package, pallets, finished_pallets) VALUES (?,?,?,?,?,?)");
        return $query->execute([$room,$name,$lot,$quantity_to_package,$pallets,0]);
    }

    public static function getquantityproduct($name) {
        $query = self::connect()->prepare("SELECT quantity_box, boxes_pallet FROM products WHERE `name`=:name");
        $query->execute(["name"=>$name]);
        return $row = $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function getcurrentproducts() {
    $query = self::connect()->prepare("SELECT * FROM `current_products`");
        $row = $query->execute();
        return $row = $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function addpallet($room) {
        $query = self::connect()->prepare("UPDATE `current_products` SET finished_pallets = finished_pallets + 1, progress = ROUND((finished_pallets*100)/pallets) WHERE `room`=:room");
        return $query->execute(["room"=>$room]);
    }

    public static function get_busyroom($room) {
        $query = self::connect()->prepare("SELECT * FROM `current_products` WHERE `room`=:room");
        $query->execute(["room"=>$room]);
        return $row = $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function finishpackage($room) {
        $query = self::connect()->prepare("INSERT INTO `finished_products` 
        (room, name, lot, quantity_packed, pallet) SELECT room, name, lot, quantity_to_package, finished_pallets 
        FROM `current_products` WHERE `room`=:room");
        $query->execute(["room"=>$room]);
        $query = self::connect()->prepare("DELETE FROM `current_products` WHERE `room`=:room");
        $query->execute(["room"=>$room]);
    }

    public static function getproducts($type) {
        $query = self::connect()->prepare("SELECT `name` FROM `products` WHERE `type`=:type");
        $query->execute(["type"=>$type]);
        return $row = $query->fetchAll(PDO::FETCH_COLUMN); //FETCH COLUMN RETURNS ONLY THE COLUMN WITHOUT BEING AND OBJECT
    }

    public static function getfinishedproducts() {
        $query = self::connect()->prepare("SELECT * FROM `finished_products`");
        $query->execute();
        return $row = $query->fetchAll(PDO::FETCH_ASSOC); //FETCH COLUMN RETURNS ONLY THE COLUMN WITHOUT BEING AND OBJECT
    }
}

?>