<?php


class Login_admin {

    public static function login ($user, $pass) {
    
        $user = Clear::Clearvars($user);
        $pass = Clear::Clearvars($pass);
        
        $sql = Model::login($user, $pass);

        if ($sql !=0) {

            $data = array (
                '{admin}'=>$sql["user"]
            );
            
            ControllerView::createview($data, "admin_panel");
      
        }else {

            echo "Error al iniciar sesion";
        }
    }
}

?>