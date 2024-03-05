<?php

    header('Access-Control-Allow-Methods: POST');
    header('Content-Type: application/json');

    include('vehicles.php');

    $responce_array = [];

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $user_id = $_POST['user_id'];
        $plate_number = $_POST['plate_number'];
        $vehicle_type = $_POST['vehicle_type'];

        $vehicles = new Vehicles();
        
        $responce = $vehicles->addVehicle($user_id,$plate_number,$vehicle_type);

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