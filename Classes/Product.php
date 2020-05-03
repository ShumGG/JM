<?php

class Product {

   
    public static function registerproduct($type, $p_name, $q_box) {

        $type = Clear::Clearvars($type[0]);
        $p_name = Clear::Clearvars($p_name);
        $q_box = Clear::Clearvars($q_box);
        $result = Model::registerproduct($type, $p_name, $q_box);
        
        if ($result == 1) {

            echo "Se ha registrado el producto";
            //ControllerView::renderview("new_product");

        }else {

            echo "Error al registrar el producto";
        }

    }   

    public static function getpreviousproduct($room) {

        $room = Clear::Clearvars($room[0]);

        $row = Model::getpreviousproduct($room);
        
        self::createarray($row);

    }


    private static function createarray($row) {
        if (is_array($row)) {
            $data = array(
                '{room}'=>$row["room"],
                '{n_pp}'=>$row["name"],
                '{lot_pp}'=>$row["lot"],
                '{q_pp}'=>$row["quantity_produced"]
            );
            ControllerView::createview($data, "start_packing");
        }else {
            $data = array('{room}'=>$row,'{n_pp}'=>$row,'{lot_pp}'=>$row,'{q_pp}'=>$row);
            ControllerView::createview($data, "start_packing");
        }
    }
}

?>