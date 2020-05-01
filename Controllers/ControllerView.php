<?php

class ControllerView {

    const path = "Views/admin_views/%s.php";

    public static function renderview($view) {

        $content = file_get_contents(self::getPath($view));

        echo $content;

    }

    private static function getPath (string $view) {
        
        return sprintf(self::path, $view);
    }

}


?>