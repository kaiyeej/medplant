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
$plantPhoto = clean($_REQUEST['plantPhoto']);
$taxonomyClass = clean($_REQUEST['taxonomyClass']);
$taxonomyFamily = clean($_REQUEST['taxonomyFamily']);
$taxonomyGenus = clean($_REQUEST['taxonomyGenus']);
$taxonomyKingdom = clean($_REQUEST['taxonomyKingdom']);
$taxonomyOrder = clean($_REQUEST['taxonomyOrder']);
$taxonomyPhylum = clean($_REQUEST['taxonomyPhylum']);
$date = getCurrentDate();
$response_array['array_data'] = array();
$image = $plantPhoto;
$DIR = "../vendors/file/";
$file_chunks = explode(";base64,", $image);
$fileType = explode("image/", $file_chunks[0]);
$image_type = $fileType[1];

$img_file = uniqid() . "." . $image_type;
$file = $DIR . $img_file;

$response = array();

$fetch_plant = $mysqli_connect->query("SELECT * FROM tbl_plants WHERE plantid='$plantScanId'");
if ($fetch_plant->num_rows ==  0) {
    $sql = $mysqli_connect->query("INSERT INTO `tbl_plants` (`plantid`, `plant_name`, `plant_name_authority`, `plant_synonyms`, `plant_taxonomy_class`, `plant_taxonomy_family`, `plant_taxonomy_genus`, `plant_taxonomy_kingdom`, `plant_taxonomy_order`, `plant_taxonomy_phylum`, `plant_description`, `plant_img`, `date_added`) VALUES ('$plantScanId', '$plantName', '$plantAuthority', '$plantSynonyms', '$taxonomyClass', '$taxonomyFamily', '$taxonomyGenus','$taxonomyKingdom', '$taxonomyOrder', '$taxonomyPhylum', '$plantDesc', '$img_file', '$date')");
    if ($sql) {
        $base64Img = base64_decode($file_chunks[1]);
        file_put_contents($file, $base64Img);
        $response["res"] =  1;
    } else {
        $response["res"] = 0;
    }
} else {
    $response["res"] = 2;
}

// $response["res"] = $image;
array_push($response_array['array_data'], $response);
echo json_encode($response_array);
