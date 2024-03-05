<?php

    header('Access-Control-Allow-Methods: POST');
    header('Content-Type: application/json');

    include('parking_lots.php');

    $responce_array = [];

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = $_POST['name'];
        $location = $_POST['location'];

        $parking = new ParkingLots();
        
        $responce = $parking->addParking($name,$location);

        http_response_code(201);

        if($responce) {
            $responce_array['msg'] = "Record inserted successfully...";
        }
        else {
            $responce_array['msg'] = "Record insertion failed...";
        }

        echo json_encode($responce_array);
    }
    else {
        $responce_array['msg'] = "Only POST method are allowed...";

        echo json_encode($responce_array);
    }
?>