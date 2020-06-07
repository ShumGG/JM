<?php

Model::set([

    "db"=>"mysql",
    "host"=> "localhost",
    "db_name"=>"jm",
    "user"=>"root",
    "pass"=>""

]);

/*


ROUTES TO RENDER VIEWS

*/

Routes::set("index",function() {  
    Controller::renderview('index');
});

Routes::set ("new_product",function() {
    ControllerView::renderview("new_product");
});

Routes::set ("package_new_product",function() {
    ControllerView::renderview("start_packing");
});

Routes::set ("see_actual_products",function() {
    ControllerView::renderview("see_actual_products");
});

Routes::set ("finished_products",function() {
    ControllerView::renderview($_GET["url"]);
});

Routes::set ("waiting_products",function() {
    ControllerView::renderview("waiting_products");
});

/*



ROUTES USING AXIOS 



*/

Routes::set ("get_busyroom",function() {    //USED IN PACKING_SECTION.JS IN LINE 21
    $data = json_decode(file_get_contents('php://input'),true); 
    Room::get_busyroom($data);
});

Routes::set ("get_previous_products",function() { // USED IN PACKING_SECTION.JS IN LINE 35
    $data = json_decode(file_get_contents('php://input'),true); 
    Product::getpreviousproduct($data);
});

Routes::set ("start_packing",function() {       //USED IN PACKING_SECTION.JS IN LINE 69
    $data = json_decode(file_get_contents('php://input'),true); 
    Room::setroom($data);
});

Routes::set ("get_current_products",function() { //USED IN SEE_ACTUAL_PRODUCTS.JS 
    Room::getcurrentproducts();
});

Routes::set("add_pallet",function() {
    $data = json_decode(file_get_contents('php://input'),true); 
    Room::addpallet($data);
});

Routes::set("finish_package",function() {
    $data = json_decode(file_get_contents('php://input'),true); 
    Room::finishpackage($data);
});

Routes::set("get_finished_products",function(){
    Product::getfinishedproducts("");
});

Routes::set("login",function() { 
    
    Login_admin::login();
    
    //$data = json_decode(file_get_contents('php://input'),true);
});

Routes::set("logout",function() { 
    Login_admin::logout();
    //$data = json_decode(file_get_contents('php://input'),true);
});


Routes::set("register_product", function() {
    $data = json_decode(file_get_contents('php://input'),true);
    Product::registerproduct($data);
});

Routes::set("get_products",function() {
    $data = json_decode(file_get_contents('php://input'),true);
    Product::getproducts($data);
});


?>