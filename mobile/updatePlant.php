<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../core_mobile/config.php';
$plantScanId = clean($_REQUEST['plantScanId']);
$plantName = clean($_REQUEST['plantName']);
$plantSynonyms = clean($_REQUEST['plantSynonyms']);
$plantAuthority = clean($_REQUEST['plantAuthority']);
$plantDesc = clean($_REQUEST['plantDesc']);
$taxonomyClass = clean($_REQUEST['taxonomyClass']);
$taxonomyFamily = clean($_REQUEST['taxonomyFamily']);
$taxonomyGenus = clean($_REQUEST['taxonomyGenus']);
$taxonomyKingdom = clean($_REQUEST['taxonomyKingdom']);
$taxonomyOrder = clean($_REQUEST['taxonomyOrder']);
$taxonomyPhylum = clean($_REQUEST['taxonomyPhylum']);
$date = getCurrentDate();
$response_array['array_data'] = array();

$sql = $mysqli_connect->query("UPDATE `tbl_plants` SET `plant_name`='$plantName', `plant_name_authority`='$plantAuthority', `plant_synonyms`='$plantSynonyms', `plant_taxonomy_class`='$taxonomyClass', `plant_taxonomy_family`='$taxonomyFamily', `plant_taxonomy_genus`='$taxonomyGenus', `plant_taxonomy_kingdom`='$taxonomyKingdom', `plant_taxonomy_order`='$taxonomyOrder', `plant_taxonomy_phylum`='$taxonomyPhylum', `plant_description`='$plantDesc' WHERE  `plantid`='$plantScanId'");
if ($sql) {
    $response["res"] =  1;
} else {
    $response["res"] = 0;
}

array_push($response_array['array_data'], $response);
echo json_encode($response_array);
