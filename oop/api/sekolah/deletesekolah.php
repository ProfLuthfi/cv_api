<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-AllowHeaders, Authorization, X-Requested-With");
include_once '../../config/database.php';
include_once '../../models/sekolah.php';
$database = new Database();
$db = $database->getConnection();
$item = new sekolah($db);
$data = json_decode(file_get_contents("php://input"));
$item->id_user = $data->id_user;
if ($item->deletesekolah()) {
    echo json_encode("User school deleted.");
} else {
    echo json_encode("Data could not be deleted");
}
