<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Adminstration.php';
// Instantiate DB & connect

$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$administration = new Adminstration($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));
var_dump($data);
$administration->nom = $data->nom;
$administration->region = $data->region;
$administration->departement = $data->departement;
$administration->commune = $data->commune;
$administration->localite = $data->localite;
$administration->nomservice = $data->nomservice;
$administration->latitude = $data->latitude;
$administration->longitude = $data->longitude;
$administration->telephone = $data->telephone;
$administration->email = $data->email;
$administration->heure = $data->heure;


// Create Category
if($administration->create()) {
    echo json_encode(
        array('message' => 'Category Created')
    );
} else {
    echo json_encode(
        array('message' => 'Category Not Created')
    );
}
