<?php

require_once 'web.php';

    function __autoload($class_name) {
        if (file_exists("Classes/" . $class_name . ".php")) {
            require_once "Classes/" . $class_name . ".php";
        }elseif (file_exists("Controllers/" . $class_name . ".php")) {
            require_once "Controllers/" . $class_name . ".php";
        }
    }

    Routes::go($_GET["url"] ?? '');

?>