<?php

Model::set([

    "db"=>"mysql",
    "host"=> "localhost",
    "db_name"=>"jm",
    "user"=>"root",
    "pass"=>""

]);

Routes::set('index',function() {  
    Controller::renderview('index');
});


Routes::set('sub_admin',function() {  
    Controller::renderview('sub_admin');
});

Routes::set ("admin_views",function() {
    ControllerView::renderview($_POST["view"]);
});

Routes::set ("start_packing",function() {

    //ControllerView::renderview($_POST["view"]);
    Product::getpreviousproduct($_POST["room"]);
    
});

Routes::set('login',function() {  
    
    $user = $_POST["user"];
    $pass = $_POST ["pass"];

    Login_admin::login($user, $pass);
    
});

Routes::set('register_product', function() {
    
    $type = $_POST["type"];
    $p_name = $_POST["p_name"];
    $q_box = $_POST["q_box"];
    
    Product::registerproduct($type, $p_name, $q_box);

});

?>