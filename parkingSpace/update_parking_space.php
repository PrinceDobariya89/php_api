<?php

    header('Access-Control-Allow-Methods: POST');
    header('Content-Type: application/json');

    include('parking_spaces.php');

    if($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCH') {

        $parking = new ParkingSpaces();

        parse_str(file_get_contents('php://input'),$_PATCH);

        $parking_lot_id = $_PATCH['parking_lot_id'];
        $space_number = $_PATCH['space_number'];
        $status = $_PATCH['status'];
        $id = $_PATCH['id'];
        
        $responce = $parking->updateParkingSpace($parking_lot_id,$space_number,$status,$id);

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