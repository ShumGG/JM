<?php

class Room {

    public static function setroom($data) {
        
        $room = Clear::ClearVars($data["room"]);
        $name = Clear::ClearVars($data["new_name"]);
        $lot = Clear::ClearVars($data["new_lot"]);
        $quantity_to_package = Clear::ClearVars($data["new_quantity_to_package"]);
        $pallets = Product::getpallets($name, $quantity_to_package);
        $result = Model::setroom($room, $name, $lot, $quantity_to_package, $pallets);
        
        if ($result) {
            header("Location:index.php?url=see_actual_products");
        }else {
            echo "Habitacion ocupada";
            header("refresh:2,index.php?url=start_packing");
        }
    }

    public static function get_busyroom($data) {

        $data = Clear::ClearVars($data["room"]);
        $result = Model::get_busyroom($data);

        echo json_encode($result);
    }

    public static function getcurrentproducts() {

        $result = Product::getcurrentproducts();
        
        echo json_encode($result);
    }

    public static function addpallet($data) {
        $room = Clear::ClearVars($data["room"]);
        $result = Model::addpallet($room);
    }

    public static function finishpackage($data) {
        $room = Clear::ClearVars($data["room"]);
        $result = Model::finishpackage($room);
    }
}


?>