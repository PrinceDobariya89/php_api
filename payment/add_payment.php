<?php

    header('Access-Control-Allow-Methods: POST');
    header('Content-Type: application/json');

    include('payments.php');

    $responce_array = [];

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $booking_id = $_POST['booking_id'];
        $amount = $_POST['amount'];
        $payment_time = $_POST['payment_time'];

        $payment = new Payments();
        
        $responce = $payment->addPayment($user_id,$amount,$payment_time);

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