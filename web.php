<?php

Model::set([

    "db"=>"mysql",
    "host"=> "localhost",
    "db_name"=>"JM",
    "user"=>"",
    "pass"=>""

]);

Routes::set('index',function() {  
    Controller::renderview('index');
});


Routes::set('sub_admin',function() {  
    Controller::renderview('sub_admin');
});

Routes::set ("admin_views",function(){
    ControllerView::renderview($_POST["view"]);
});


Routes::set('login',function() {  
    Controller::renderview('admin_panel');
});

Routes::set('register_product', function() {
    
});

?>