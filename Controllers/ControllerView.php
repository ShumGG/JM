<?php

class ControllerView {

    const path_adminviews = "Views/admin_views/%s.php";
    const path_admin = "Views/%s.php";
    
    public static function renderview($view) {
 
            $content = file_get_contents(self::getPath(self::path_adminviews, $view));

            echo $content;
        
    }

    public static function createview($content) {

        echo $content;

    }
    
    private static function getPath (string $path, string $view) {
        
        return sprintf($path, $view);
    }

}


?>