<?php

    header('Access-Control-Allow-Methods: POST');
    header('Content-Type: application/json');

    include('users.php');

    if($_SERVER['REQUEST_METHOD'] == 'DELETE') {

        $user = new User();

        parse_str(file_get_contents('php://input'),$_DELETE);

        $id = $_DELETE['id'];
        
        $responce = $user->deleteUser($id);

        if($responce==1) {
            $responce_array['msg'] = "Record Delete Successfully...";
        }
        else {
            $responce_array['data'] = "Record Delete failed...";
        }

        echo json_encode($responce_array);
    }
    else {
        $responce_array['msg'] = "Only DELETE method are allowed...";

        echo json_encode($responce_array);
    }
?>