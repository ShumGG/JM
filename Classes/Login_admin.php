<?php


class Login_admin {

    const path = "Views/%s.php";

    public static function login ($user, $pass) {
    
        $user = Clear::Clearvars($user);
        $pass = Clear::Clearvars($pass);
        
        $sql = Model::login($user, $pass);

        if ($sql !=0) {

            $data = array (
                '{admin}'=>$sql["user"]
            );

            self::createview($data, "admin_panel");

        }else {

            echo "Error al iniciar sesion";
        }
    }

    private static function createview(array $array, $view) {

        $content = self::getcontent($view);
        
        $content = strtr($content, $array);

        ControllerView::createview($content);
    }

    private static function getcontent($view) {

        return file_get_contents(sprintf(self::path, $view));

    }
}

?>