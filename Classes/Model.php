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
            self::$connection = new PDO ("$db:host=$host;dbname=$db_name",$user,$pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }catch(Exception $e) {
            echo $e;
        }
        return self::$connection;
    }

    public static function registerproduct($type , $name, $quantity_box, $box_pallet) {

        $query = self::connect()->prepare("SELECT COUNT(*) FROM `products` WHERE `name`=:name AND `type`=:type");
        $query->execute(["name"=>$name,"type"=>$type]);
        $result = $query->fetch(PDO::FETCH_COLUMN);
        if ($result >= 1) {
            return 0;
        }else {
            $query = self::connect()->prepare("INSERT INTO `products` (name, quantity_box, boxes_pallet, type, register_day) VALUES (?,?,?,?,NOW())");
            return $result = $query->execute([strtolower($name), $quantity_box, $box_pallet, $type]);
            return true;
        }
    }
    
    public static function login ($user, $pass) {
        $query = self::connect()->prepare("SELECT * FROM `admin` WHERE `user`=:user");
        $query->execute(["user" => $user]);
        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($pass,$result["pass"])) {
                return $result;
            }
        }
        return 0;
    }

    public static function setroom($room,$name, $lot, $quantity_to_package, $pallets, $finished_pallets, $progress) {
        $query = self::connect()->prepare("INSERT INTO `current_products` (room, name, lot, quantity_to_package, pallets, finished_pallets, progress, start_date) VALUES (?,?,?,?,?,?,?,NOW())");
        return $query->execute([$room,$name,$lot,$quantity_to_package,$pallets,$finished_pallets,$progress]);
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
        $query = self::connect()->prepare("UPDATE `current_products` SET finished_pallets = finished_pallets + 1 , progress = ROUND((finished_pallets*100)/pallets) WHERE `room`=:room AND 
        current_products.finished_pallets < current_products.pallets");
        $result = $query->execute(["room"=>$room]);
        return $result = $query->rowCount();
    }

    public static function get_busyroom($room) {
        $query = self::connect()->prepare("SELECT * FROM `current_products` WHERE `room`=:room");
        $query->execute(["room"=>$room]);
        return $result = ($query->rowCount() == 1) ? $query->fetchAll(PDO::FETCH_ASSOC): 0;
    }

    public static function getpreviousproduct($room) {
        
        //IT SELECTS THE HIGHER ID, BECAUSE THE HIGHER ID OF THAT TYPE OF PRODUCT ITS THE LATEST FINISHED
        $query = self::connect()->prepare(("SELECT * FROM  `finished_products` WHERE `id`= (SELECT MAX(id) FROM `finished_products` WHERE `room`=:room) AND `room`=:room"));
        $query->execute(["room"=>$room]);
        return $row = $query->fetchAll(PDO::FETCH_ASSOC);   
    }

    public static function finishpackage($room, $finish_date) {
        $connection = self::connect();
        try{
            
            $connection->beginTransaction();
        
            $sql = "INSERT INTO `finished_products` 
            (room, name, lot, quantity_packed, pallets, start_date) SELECT room, name, lot, quantity_to_package, finished_pallets, 
            start_date FROM `current_products` WHERE `room`=:room";
            $stmt = $connection->prepare($sql);
            $stmt->execute(["room"=>$room]);
            
            $sql = "UPDATE `finished_products` SET `finish_date`=:finish_date WHERE `room`=:room";
            $stmt = $connection->prepare($sql);
            $stmt->execute(["finish_date"=>$finish_date, "room"=>$room]);
            
            $sql = "DELETE FROM `current_products` WHERE `room`=:room";
            $stmt = $connection->prepare($sql);
            $stmt->execute(["room"=>$room]);

            $connection->commit();
            
        } catch(Exception $e){
            return $e->getMessage();
            $connection->rollBack();
        }
    }

    public static function getproducts($type) {
        $query = self::connect()->prepare("SELECT `name` FROM `products` WHERE `type`=:type");
        $query->execute(["type"=>$type]);
        return $row = $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getfinishedproducts() {
        $query = self::connect()->prepare("SELECT * FROM `finished_products` ORDER BY `id`");
        $query->execute();
        return $row = $query->fetchAll(PDO::FETCH_ASSOC); 
    } 
}

?>