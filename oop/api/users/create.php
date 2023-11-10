<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-AllowHeaders, Authorization, X-Requested-With");
include_once '../../config/database.php';
include_once '../../models/user.php';
$database = new Database();
$db = $database->getConnection();
$item = new User($db);
$data = json_decode(file_get_contents("php://input"));
$item->fullname = $data->fullname;
$item->email = $data->email;
$item->job = $data->job;
$item->no_telepon = $data->no_telepon;
if($item->createUser()){
    echo 'User created successfully.';
} else{
    echo 'User could not be created.';
}