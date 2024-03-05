<?php

    header('Access-Control-Allow-Methods: POST');
    header('Content-Type: application/json');

    include('bookings.php');

    if($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCH') {

        $booking = new Bookings();

        parse_str(file_get_contents('php://input'),$_PATCH);

        $user_id = $_POST['user_id'];
        $parking_space_id = $_POST['parking_space_id'];
        $vehicle_id = $_POST['vehicle_id'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];
        $id = $_PATCH['id'];
        
        $responce = $booking->updateBooking($user_id,$parking_space_id,$vehicle_id,$start_time,$end_time,$id);

        if($responce) {
            $responce_array['msg'] = "Record Update Successfully...";
        }
        else {
            $responce_array['data'] = "Record Updation Failed...";
        }

        echo json_encode($responce_array);
    }
    else {
        $responce_array['msg'] = "Only PUT or PATCH methods are allowed...";

        echo json_encode($responce_array);
    }
?>