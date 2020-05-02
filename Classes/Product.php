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


}


?>