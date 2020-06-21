<?php

class Controller {

    const path = "Views/%s.php";

    public static function renderview($view) {
        $content = file_get_contents(self::getPath($view));
        echo $content;
    }

    private static function getPath (string $view) {
        
        return sprintf(self::path, $view);
    }

    public static function getView( string $view) {
        
        if (file_exists("Views/".$view . ".php")) {

            return $view;
        }
    }
}


?>