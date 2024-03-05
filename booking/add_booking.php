<?php

    header('Access-Control-Allow-Methods: POST');
    header('Content-Type: application/json');

    include('bookings.php');

    $responce_array = [];

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $user_id = $_POST['user_id'];
        $parking_space_id = $_POST['parking_space_id'];
        $vehicle_id = $_POST['vehicle_id'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];

        $booking = new Bookings();
        
        $responce = $vehicles->addVehicle($user_id,$parking_space_id,$vehicle_id,$start_time,$end_time);

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