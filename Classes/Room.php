<?php

class Room {

    public static function setroom($data) {
        $room = Clear::ClearVars($data["room"]);
        $name = Clear::ClearVars($data["new_name"]);
        $lot = Clear::ClearVars($data["new_lot"]);
        $quantity_to_package = Clear::ClearVars($data["new_quantity_to_package"]);
        $pallets = Product::getpallets($name, $quantity_to_package);
        $finished_pallets = 0;
        $progress = 0;

        $result = Model::setroom($room, $name, $lot, $quantity_to_package, $pallets, $finished_pallets, $progress);
        if ($result) {
            echo json_encode($result);
        }else {
            echo json_encode("There's was an error setting to package, please check database.");
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

        echo json_encode($result);
    }

    public static function finishpackage($data) {
        $room = Clear::ClearVars($data["room"]);
        $finish_date = Date("Y-m-d");
        $result = Model::finishpackage($room, $finish_date);
        echo json_encode($result);
    }
}


?>