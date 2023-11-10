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
if (isset($_GET['id'])) {
    $item = new sekolah($db);
    $item->id_user = isset($_GET['id']) ? $_GET['id'] : die();
    $item->getUserId();
    if ($item->sekolah != null) {
        // create array
        $usr_arr = array(
            "id_user" => $item->id_user,
            "id_sekolah" => $item->id_sekolah,
            "sekolah" => $item->sekolah,
            "tahun" => $item->tahun,
            "jurusan" => $item->jurusan
        );
        http_response_code(200);
        echo json_encode($usr_arr);
    } else {
        http_response_code(404);
        echo json_encode("Employee not found.");
    }
} else {
    $items = new sekolah($db);
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
                "id_sekolah" => $id_sekolah,
                "sekolah" => $sekolah,
                "tahun" => $tahun,
                "jurusan" => $jurusan
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
