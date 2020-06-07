<?php

class ControllerView {

    const PATH_ADMINVIEWS = "Views/admin_views/%s.php";
  
    public static function renderview($view) { //funcion para crear la vista en general sin agregar valores

        $view = Clear::ClearVars($view);
        $content = self::getcontent($view);

        echo $content;
    }

    public static function createview(array $array, $view) { //funcion para crear la vista agregando valores

        $content = self::getcontent($view);
        $content = strtr($content, $array);
        echo $content;
    }

    public static function setview($view){

        echo $view;
    }
    
    //privates functions
    
    public static function getcontent($view) { //funcion para obtener la vista mediante el path

        if (file_exists(sprintf(self::PATH_ADMINVIEWS,$view))) {
            return file_get_contents(sprintf(self::PATH_ADMINVIEWS, $view));
        }else {
            return $error = "error la vista no existe";
        }
    }
}
?>