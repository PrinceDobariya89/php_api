<?php

    include('../config/config.php');

    class Vehicles
    {
        public $config;

        public function __construct()
        {
            $this->config = new Config();

            $this->config->connect();
        }

        public function addVehicle($name,$plate_number,$vehicle_type) {

            $quary = "INSERT INTO `vehicles` (`user_id`, `plate_number`,`vehicle_type`) VALUES ('$name', '$plate_number','$vehicle_type')";

            $result = mysqli_query($this->config->res,$quary);

            return $result;
        }

        public function getAllVehicle() {

            $quary = "SELECT * FROM vehicles";

            $result = mysqli_query($this->config->res,$quary);

            $fetchedData = [];

            while($record = mysqli_fetch_assoc($result)) {

                array_push($fetchedData,$record);

            }
            return $fetchedData;
        }

        public function getSingleVehicle($id) {

            $quary = "SELECT * FROM vehicles WHERE id=$id";

            $result = mysqli_query($this->config->res,$quary);

            $fetchedData = mysqli_fetch_assoc($result);
            
            return $fetchedData;
        }

        public function deleteVehicle($id) {
            $quary = "DELETE FROM vehicles WHERE id=$id";

            $result = mysqli_query($this->config->res,$quary);

            return $result;
        }

        public function updateVehicle($user_id,$plate_number,$vehicle_type,$id) {

            $quary = "UPDATE `vehicles` SET `user_id`='$user_id',`plate_number` = '$plate_number',`vehicle_type`='$vehicle_type' WHERE id = $id";

            $result = mysqli_query($this->config->res,$quary);

            return $result;
        }
        
    }

?>