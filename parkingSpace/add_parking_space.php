<?php

    header('Access-Control-Allow-Methods: POST');
    header('Content-Type: application/json');

    include('parking_spaces.php');

    $responce_array = [];

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $parking_lot_id = $_POST['parking_lot_id'];
        $space_number = $_POST['space_number'];
        $status = $_POST['status'];

        $parking = new ParkingSpaces();
        
        $responce = $parking->addParkingSpace($parking_lot_id,$space_number,$status);

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