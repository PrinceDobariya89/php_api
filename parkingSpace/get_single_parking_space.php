<?php

    header('Access-Control-Allow-Methods: POST');
    header('Content-Type: application/json');

    include('parking_spaces.php');

    if($_SERVER['REQUEST_METHOD'] == 'GET') {

        $parking = new ParkingSpaces();

        parse_str(file_get_contents('php://input'),$getSingleParkingSpace);

        $id = $getSingleParkingSpace['id'];
        
        $responce = $parking->getSingleParkingSpace($id);

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