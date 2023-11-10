<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-AllowHeaders, Authorization, X-Requested-With");
include_once '../../config/database.php';
include_once '../../models/skill.php';
$database = new Database();
$db = $database->getConnection();
$item = new Skill($db);
$data = json_decode(file_get_contents("php://input"));
$item->id_user = $data->id_user;
$item->skill = $data->skill;
$item->lembaga = $data->lembaga;
$item->nilai = $data->nilai;
if ($item->createSkill()) {
    echo 'User created successfully.';
} else {
    echo 'User could not be created.';
}
