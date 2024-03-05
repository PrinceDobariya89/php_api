<?php

    include('../config/config.php');

    class ParkingLots
    {
        public $config;

        public function __construct()
        {
            $this->config = new Config();

            $this->config->connect();
        }

        public function addParking($name,$location) {

            $quary = "INSERT INTO `parking_lots` (`name`, `location`) VALUES ('$name', '$location')";

            $result = mysqli_query($this->config->res,$quary);

            return $result;
        }

        public function getAllParking() {

            $quary = "SELECT * FROM parking_lots";

            $result = mysqli_query($this->config->res,$quary);

            $fetchedData = [];

            while($record = mysqli_fetch_assoc($result)) {

                array_push($fetchedData,$record);

            }
            return $fetchedData;
        }

        public function getSingleParking($id) {

            $quary = "SELECT * FROM parking_lots WHERE id=$id";

            $result = mysqli_query($this->config->res,$quary);

            $fetchedData = mysqli_fetch_assoc($result);
            
            return $fetchedData;
        }

        public function deleteParking($id) {
            $quary = "DELETE FROM parking_lots WHERE id=$id";

            $result = mysqli_query($this->config->res,$quary);

            return $result;
        }

        public function updateParking($name,$location,$id) {

            $quary = "UPDATE `parking_lots` SET `name`='$name',`location` = '$location' WHERE id = $id";

            $result = mysqli_query($this->config->res,$quary);

            return $result;
        }
        
    }

?>