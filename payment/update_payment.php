<?php

    header('Access-Control-Allow-Methods: POST');
    header('Content-Type: application/json');

    include('payments.php');

    if($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCH') {

        $payment = new Payments();

        parse_str(file_get_contents('php://input'),$_PATCH);

        $booking_id = $_POST['booking_id'];
        $amount = $_POST['amount'];
        $payment_time = $_POST['payment_time'];
        $id = $_PATCH['id'];
        
        $responce = $payment->updatePayment($user_id,$amount,$payment_time,$id);

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