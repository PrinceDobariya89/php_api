<?php

    header('Access-Control-Allow-Methods: POST');
    header('Content-Type: application/json');

    include('vehicles.php');

    if($_SERVER['REQUEST_METHOD'] == 'GET') {

        $vehicles = new Vehicles();

        parse_str(file_get_contents('php://input'),$getSingleParking);

        $id = $getSingleParking['id'];
        
        $responce = $vehicles->getSingleVehicle($id);

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