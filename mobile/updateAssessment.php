<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../core_mobile/config.php';
$assessmentScanId = clean($_REQUEST['assessmentScanId']);
$assessmentName = clean($_REQUEST['assessmentName']);
$assessmentCommonName = clean($_REQUEST['assessmentCommonName']);
$assessmentDesc = clean($_REQUEST['assessmentDesc']);
$assessmentBiological = clean($_REQUEST['assessmentBiological']);
$assessmentPrevention = clean($_REQUEST['assessmentPrevention']);
$curableDiseases = clean($_REQUEST['curableDiseases']);
$date = getCurrentDate();
$response_array['array_data'] = array();

$response = array();
$sql = $mysqli_connect->query("UPDATE `tbl_health_assessment` SET `assessment_name`='$assessmentName', `is_healthy`='1', `assessment_common_name`='$assessmentCommonName', `assessment_description`='$assessmentDesc', `assessment_biological`='$assessmentBiological', `assessment_prevention`='$assessmentPrevention', `curable_diseases`='$curableDiseases' WHERE  `entity_id`='$assessmentScanId'");
if ($sql) {
    $response["res"] =  1;
} else {
    $response["res"] = 0;
}

array_push($response_array['array_data'], $response);
echo json_encode($response_array);
