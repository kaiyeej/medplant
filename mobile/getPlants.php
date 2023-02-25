<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../core_mobile/config.php';


$response_array['array_data'] = array();
$fetch = $mysqli_connect->query("SELECT * FROM tbl_plants");
while ($row = $fetch->fetch_array()) {
    $response = array();

    $response["plant_id"] = $row['plant_id'];
    $response["plant_name"] = $row['plant_name'];
    $response["plant_name_authority"] = $row['plant_name_authority'];
    $response["plant_img"] = $row['plant_img'];
    $response["date_added"] = date('F j, Y', strtotime($row['date_added']));


    array_push($response_array['array_data'], $response);
}


echo json_encode($response_array);
