<?php

class Clear {

    public static function Clearvars ($var) {

        return htmlentities(addslashes($var));

    }
}

?>