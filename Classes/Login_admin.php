<?php

class Login_admin {

    public static function login () {
        
        session_start();
        if (isset($_SESSION["user"])) {
            $data = array (
                '{admin}'=>$_SESSION["user"]
            );
            ControllerView::createview($data, "admin_panel");
        }else {
            $user = Clear::Clearvars($_POST["user"]);
            $pass = Clear::Clearvars($_POST["pass"]);
            $sql = Model::login($user, $pass);
            if ($sql !=0) {
                $data = array (
                    '{admin}'=>$sql["user"]
                );
                self::start_session($user);
                ControllerView::createview($data, "admin_panel");
            }else {
                "Error al iniciar sesion";
            }
        }
    }

    public static function start_session($user) {
        $_SESSION["user"] = $user;
    }

    public static function logout() {
        session_start();
        $_SESSION = [];
        session_destroy();
        header("Location:index.php");
    }
}

?>