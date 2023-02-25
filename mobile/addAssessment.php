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
$assessmentPhoto = $_REQUEST['assessmentPhoto'];
$assessmentBiological = clean($_REQUEST['assessmentBiological']);
$assessmentPrevention = clean($_REQUEST['assessmentPrevention']);
$curableDiseases = clean($_REQUEST['curableDiseases']);
$date = getCurrentDate();
$response_array['array_data'] = array();
$image = $assessmentPhoto;
$DIR = "../vendors/assessment/";
$file_chunks = explode(";base64,", $image);
$fileType = explode("image/", $file_chunks[0]);
$image_type = $fileType[1];

$img_file = uniqid() . "." . $image_type;
$file = $DIR . $img_file;


$response = array();
$fetch_assessment = $mysqli_connect->query("SELECT * FROM tbl_health_assessment WHERE entity_id='$assessmentScanId'");
if ($fetch_assessment->num_rows ==  0) {
    if (file_put_contents($file, $base64Img)) {
        $sql = $mysqli_connect->query("INSERT INTO `tbl_health_assessment` (`assessment_name`, `entity_id`, `is_healthy`, `assessment_common_name`, `assessment_description`, `assessment_biological`, `assessment_prevention`, `assessment_img`,`curable_diseases`, `date_added`) VALUES ('$assessmentName', '$assessmentScanId', 1, '$assessmentCommonName', '$assessmentDesc', '$assessmentBiological', '$assessmentPrevention', '$img_file','$curableDiseases', '$date')");
        if ($sql) {
            $response["res"] =  1;
        } else {
            $response["res"] = 0;
        }
    }
} else {
    $response["res"] = 2;
}

// $response["res"] = $img_file;
array_push($response_array['array_data'], $response);
echo json_encode($response_array);
