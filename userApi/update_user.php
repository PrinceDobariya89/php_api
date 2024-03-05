<?php

    header('Access-Control-Allow-Methods: POST');
    header('Content-Type: application/json');

    include('users.php');

    if($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCH') {

        $user = new User();

        parse_str(file_get_contents('php://input'),$_PATCH);

        $usrname = $_PATCH['username'];
        $email = $_PATCH['email'];
        $password = $_PATCH['password'];
        $id = $_PATCH['id'];
        
        $responce = $user->updateUSer($usrname,$email,$password,$id);

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