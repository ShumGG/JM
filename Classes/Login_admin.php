<?php

class Login_admin {

    public static function login ($data) {
        $user = Clear::Clearvars($data["user"]);
        $pass = Clear::Clearvars($data["pass"]);
        $query = Model::login($user, $pass);
        if ($query != 0) {
            self::start_session($query);
        }else {
            echo json_encode("0");
        }
    }
    
    public static function start_session($query) {
        setcookie("user",$query["user"],time()+3600*24*7); //7 days
        session_start();
        $_SESSION["user"] = $query["user"];
    }

    public static function get_user() {
        session_start();
        echo json_encode($_COOKIE["user"]);
    }
    
    public static function verify_session($url) {
        if (!isset($_COOKIE["user"])) {
            header("Location:index.php");
        }else {
            ControllerView::renderview($url);
        }
    }

    public static function verify_session_index() {
        if (isset($_COOKIE["user"])) {
            ControllerView::renderview("admin_panel");
        }else {
            Controller::renderview("index");
        }
    }

    public static function logout() {
        session_start();
        $_SESSION = [];
        session_destroy();
        setcookie("user","",time()-1);
        header("Location:index.php");
    }

}

?>