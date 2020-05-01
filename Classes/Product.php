<?php

class Product {

   
    private static function registerproduct($name, $quantityBox, $quantityPalet, $departure_room, $packing_room) {

        $name = self::clean($name);
        $quantityBox = self::clean($quantityBox);
        $quantityPalet = self::clean($quantityPalet);
        $departure_room = self::clean($departure_room);
        $packing_room = self::clean($packing_room);

        Model::registerproduct($name, $quantityBox, $quantityPalet, $departure_room, $packing_room);
        
    }   

    public static function clean($var) {

        return htmlentities(addslashes($var));

    }
}


?>