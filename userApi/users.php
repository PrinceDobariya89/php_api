<?php

    include('../config/config.php');

    class User
    {
        public $config;

        public function __construct()
        {
            $this->config = new Config();

            $this->config->connect();
        }

        public function addUser($username,$email,$password) {

            $quary = "INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')";

            $result = mysqli_query($this->config->res,$quary);

            return $result;
        }

        public function getAllUsers() {

            $quary = "SELECT * FROM users";

            $result = mysqli_query($this->config->res,$quary);

            $fetchedData = [];

            while($record = mysqli_fetch_assoc($result)) {

                array_push($fetchedData,$record);

            }
            return $fetchedData;
        }

        public function getSingleUser($id) {

            $quary = "SELECT * FROM users WHERE id=$id";

            $result = mysqli_query($this->config->res,$quary);

            $fetchedData = mysqli_fetch_assoc($result);
            
            return $fetchedData;
        }

        public function deleteUser($id) {
            $quary = "DELETE FROM users WHERE id=$id";

            $result = mysqli_query($this->config->res,$quary);

            return $result;
        }

        public function updateUSer($username,$email,$password,$id) {

            $quary = "UPDATE `users` SET `username`='$username',`email` = '$email',`password`=$password WHERE id = $id";

            $result = mysqli_query($this->config->res,$quary);

            return $result;
        }
        
    }

?>