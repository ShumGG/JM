<?php


class Routes {

    private static $routes = [];

    public static function set ($url, \Closure $function) {

        self::$routes[$url] = $function;
    }

    public static function geturl($url) {

        if (strstr($url, '?') === false) {

            return $url;
        }

        return substr($url, 0, strpos($url, '?'));

    }

    public static function go($url = "") {

        $url = empty($url) ? 'index' : self::geturl($url);
        
        if (!isset(self::$routes[$url])) {

            return;
        }
        
        call_user_func(self::$routes[$url]);

    }

}

?>