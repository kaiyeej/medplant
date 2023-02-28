<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../core_mobile/config.php';

$plant_id = $_REQUEST['plant_id'];
$response_array['array_data'] = array();
$fetch = $mysqli_connect->query("SELECT * FROM tbl_plants WHERE plant_id='$plant_id'");
while ($row = $fetch->fetch_array()) {
    $response = array();

    $response["plant_id"] = $row['plant_id'];
    $response["plant_name"] = $row['plant_name'];
    $response["plant_name_authority"] = $row['plant_name_authority'];
    $response["plant_synonyms"] = $row['plant_synonyms'];
    $response["plant_taxonomy_class"] = $row['plant_taxonomy_class'];
    $response["plant_taxonomy_family"] = $row['plant_taxonomy_family'];
    $response["plant_taxonomy_genus"] = $row['plant_taxonomy_genus'];
    $response["plant_taxonomy_kingdom"] = $row['plant_taxonomy_kingdom'];
    $response["plant_taxonomy_order"] = $row['plant_taxonomy_order'];
    $response["plant_taxonomy_phylum"] = $row['plant_taxonomy_phylum'];
    $response["plant_description"] = $row['plant_description'];
    $response["curable_diseases"] = $row['curable_diseases'];
    $response["plant_img"] = $row['plant_img'];
    $response["date_added"] = date('F j, Y', strtotime($row['date_added']));


    array_push($response_array['array_data'], $response);
}


echo json_encode($response_array);
