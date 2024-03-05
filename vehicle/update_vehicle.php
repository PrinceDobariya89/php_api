<?php

    header('Access-Control-Allow-Methods: POST');
    header('Content-Type: application/json');

    include('bookings.php');

    if($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCH') {

        $vehicles = new Vehicles();

        parse_str(file_get_contents('php://input'),$_PATCH);

        $user_id = $_POST['user_id'];
        $plate_number = $_POST['plate_number'];
        $vehicle_type = $_POST['vehicle_type'];
        $id = $_PATCH['id'];
        
        $responce = $vehicles->updateVehicle($user_id,$plate_number,$vehicle_type,$id);

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