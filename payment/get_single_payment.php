<?php

    header('Access-Control-Allow-Methods: POST');
    header('Content-Type: application/json');

    include('payments.php');

    if($_SERVER['REQUEST_METHOD'] == 'GET') {

        $payment = new Payments();

        parse_str(file_get_contents('php://input'),$getSingleBooking);

        $id = $getSingleBooking['id'];
        
        $responce = $payment->getSinglePayment($id);

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