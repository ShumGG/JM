<?php

class Product {

    public static function registerproduct($data) {
        $type = $data["type"];
        $name = Clear::Clearvars($data["name"]);
        $quantity_box = Clear::Clearvars($data["quantity_box"]);
        $box_pallet = Clear::Clearvars($data["box_pallet"]);
        $result = Model::registerproduct($type, $name, $quantity_box, $box_pallet);
        echo json_encode($result);
    }

    public static function getpreviousproduct($data) {
        $row = Model::getpreviousproduct($data["room"]);
        echo json_encode($row);
    }

    public static function getpallets ($name, $quantity_to_package) {
        $result = Model::getquantityproduct($name);
        $quantity_to_package = str_replace(",","",$quantity_to_package);
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
       if (count($result) == 0) {
           echo json_encode(0);
       }else {
           echo json_encode($result);
       }
    }
}

?>