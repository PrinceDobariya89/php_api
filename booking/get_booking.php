<?php

    header('Access-Control-Allow-Methods: POST');
    header('Content-Type: application/json');

    include('bookings.php');

    if($_SERVER['REQUEST_METHOD'] == 'GET') {

        $booking = new Bookings();
        
        $responce = $booking->getAllBooking();

        if($responce==null) {
            $responce_array['msg'] = "No data found...";
        }
        else {
            $responce_array['data'] = $responce;
        }

        echo json_encode($responce_array);
    }
    else {
        $responce_array['msg'] = "Only GET method are allowed...";

        echo json_encode($responce_array);
    }
?>