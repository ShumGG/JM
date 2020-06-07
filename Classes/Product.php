<?php

class Product {

    public static function registerproduct($data) {
        $type = $data["type"];
        $name = Clear::Clearvars($data["name"]);
        $quantity_box = Clear::Clearvars($data["quantity_box"]);
        $box_pallet = Clear::Clearvars($data["box_pallet"]);
        $result = Model::registerproduct($type, $name, $quantity_box, $box_pallet);
        if ($result) {
            echo json_encode($result);
            //header("refresh:2,index?url=login");
        }else {
            echo "Error al registrar el producto";
        }
    }

    public static function getpreviousproduct($data) {
        $row = Model::getpreviousproduct($data["room"]);
        echo json_encode($row);
    }

    public static function getpallets ($name, $quantity_to_package) {
        $result = Model::getquantityproduct($name);
        $pallets = ($quantity_to_package/$result["quantity_box"])/$result["boxes_pallet"];
        if ($pallets < 1) {
            return 1;
        }
        return round($pallets);
    }
    
    public static function getproducts($data) {
        $type = Clear::Clearvars($data["type"]);
        $row = Model::getproducts($type);
        echo json_encode($row);
    }

    public static function getcurrentproducts() {
       $result = Model::getcurrentproducts();
       return $result;
    }

    public static function getfinishedproducts() {
       $result = Model::getfinishedproducts();
       echo json_encode($result);
    }
}

?>