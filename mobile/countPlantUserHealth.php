<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../core_mobile/config.php';


$response_array['array_data'] = array();
$fetch = $mysqli_connect->query("SELECT * FROM tbl_plants GROUP BY plant_name");
$fetch_user = $mysqli_connect->query("SELECT * FROM tbl_users");
$fetch_assessmemt = $mysqli_connect->query("SELECT * FROM tbl_health_assessment GROUP BY assessment_name");

$response["count_plants"] = $fetch->num_rows;
$response["count_users"] = $fetch_user->num_rows;
$response["count_assessment"] = $fetch_assessmemt->num_rows;
array_push($response_array['array_data'], $response);



echo json_encode($response_array);
