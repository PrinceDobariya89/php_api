<?php

    include('../config/config.php');

    class Bookings
    {
        public $config;

        public function __construct()
        {
            $this->config = new Config();

            $this->config->connect();
        }

        public function addBooking($user_id,$parking_space_id,$vehicle_id,$start_time,$end_time) {

            $quary = "INSERT INTO `bookings` (`user_id`,`parking_space_id`,`vehicle_id`,`start_time`,`end_time`) VALUES ('$user_id', '$parking_space_id','$vehicle_id','$start_time','$end_time')";

            $result = mysqli_query($this->config->res,$quary);

            return $result;
        }

        public function getAllBooking() {

            $quary = "SELECT * FROM bookings";

            $result = mysqli_query($this->config->res,$quary);

            $fetchedData = [];

            while($record = mysqli_fetch_assoc($result)) {

                array_push($fetchedData,$record);

            }
            return $fetchedData;
        }

        public function getSingleBooking($id) {

            $quary = "SELECT * FROM bookings WHERE id=$id";

            $result = mysqli_query($this->config->res,$quary);

            $fetchedData = mysqli_fetch_assoc($result);
            
            return $fetchedData;
        }

        public function deleteBooking($id) {
            $quary = "DELETE FROM bookings WHERE id=$id";

            $result = mysqli_query($this->config->res,$quary);

            return $result;
        }

        public function updateBooking($user_id,$parking_space_id,$vehicle_id,$start_time,$end_time,$id) {

            $quary = "UPDATE `bookings` SET `user_id`='$user_id',`parking_space_id` = '$parking_space_id',`vehicle_id`='$vehicle_id',`start_time`='$start_time',`end_time`=$end_time WHERE id = $id";

            $result = mysqli_query($this->config->res,$quary);

            return $result;
        }
        
    }

?>