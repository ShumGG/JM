<?php

class ControllerView {

    const PATH_ADMINVIEWS = "Views/admin_views/%s.php";
    
    public static function renderview($view) { //funcion para crear la vista en general sin agregar valores
 
            $content = self::getcontent($view);

            echo $content;
        
    }

    public static function createview(array $array, $view) { //funcion para crear la vista agregando valores

        $content = self::getcontent($view);
        $content = strtr($content, $array);
        echo $content;
    }

    private static function getcontent($view) { //funcion para obtener la vista mediante el path

        return file_get_contents(sprintf(self::PATH_ADMINVIEWS, $view));

    }

}


?>