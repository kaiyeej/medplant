<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../core_mobile/config.php';
// $plantScanId = clean($_REQUEST['plantScanId']);
$plantName = clean($_REQUEST['plantName']);
$curableDiseases = clean($_REQUEST['curableDiseases']);
$date = getCurrentDate();
$response_array['array_data'] = array();

$sql = $mysqli_connect->query("UPDATE `tbl_plants` SET `plant_name`='$plantName', `curable_diseases`='$curableDiseases' WHERE `plant_name`='$plantName'");
if ($sql) {
    $response["res"] =  1;
} else {
    $response["res"] = 0;
}

array_push($response_array['array_data'], $response);
echo json_encode($response_array);
