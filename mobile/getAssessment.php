<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../core_mobile/config.php';


$response_array['array_data'] = array();
$fetch = $mysqli_connect->query("SELECT * FROM tbl_health_assessment");
while ($row = $fetch->fetch_array()) {
    $response = array();

    $response["assessment_id"] = $row['assessment_id'];
    $response["assessment_name"] = $row['assessment_name'];
    $response["entity_id"] = $row['entity_id'];
    $response["assessment_common_name"] = $row['assessment_common_name'];
    $response["assessment_img"] = $row['assessment_img'];
    $response["date_added"] = date('F j, Y', strtotime($row['date_added']));


    array_push($response_array['array_data'], $response);
}


echo json_encode($response_array);
