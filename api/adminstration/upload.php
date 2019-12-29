<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
$target_path = "uploads/";

$target_path = $target_path . basename( $_FILES['file']['name']);
$data = json_decode(file_get_contents("php://input"));
var_dump($data);
if(move_uploaded_file($_FILES['File']['tmp_name'], $target_path)) {
    header('Content-type: application/json');
    $data = ['success' => true, 'message' => 'Upload and move success'];
    echo json_encode( $data );
} else{
    header('Content-type: application/json');
    $data = ['success' => false, 'message' => 'There was an error uploading the file, please try again!'];
    echo json_encode( $data );
}

?>