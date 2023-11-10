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
if (isset($_GET['id'])) {
    $item = new User($db);
    $item->id_user = isset($_GET['id']) ? $_GET['id'] : die();
    $item->getUserId();
    if ($item->fullname != null) {
        // create array
        $usr_arr = array(
            "id_user" => $item->id_user,
            "fullname" => $item->fullname,
            "email" => $item->email,
            "job" => $item->job,
            "no_telepon" => $item->no_telepon
        );
        http_response_code(200);
        echo json_encode($usr_arr);
    } else {
        http_response_code(404);
        echo json_encode("Employee not found.");
    }
} else {
    $items = new User($db);
    $stmt = $items->getUser();
    $itemCount = $stmt->rowCount();
    // echo json_encode($itemCount);
    if ($itemCount > 0) {
        $userArr = array();
        $userArr["data"] = array();
        $userArr["itemCount"] = $itemCount;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $e = array(
                "id_user" => $id_user,
                "fullname" => $fullname,
                "email" => $email,
                "job" => $job,
                "no_telepon" => $no_telepon
            );
            array_push($userArr["data"], $e);
        }
        echo json_encode($userArr);
    } else {
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
}
