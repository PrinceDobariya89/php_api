<?php

    include('../config/config.php');

    class ParkingSpaces
    {
        public $config;

        public function __construct()
        {
            $this->config = new Config();

            $this->config->connect();
        }

        public function addParkingSpace($parking_lot_id,$space_number,$status) {

            $quary = "INSERT INTO `parking_spaces` (`parking_lot_id`,`space_number`, `status`) VALUES ('$parking_lot_id','$space_number', '$status')";

            $result = mysqli_query($this->config->res,$quary);

            return $result;
        }

        public function getAllParkingSpace() {

            $quary = "SELECT * FROM parking_spaces";

            $result = mysqli_query($this->config->res,$quary);

            $fetchedData = [];

            while($record = mysqli_fetch_assoc($result)) {

                array_push($fetchedData,$record);

            }
            return $fetchedData;
        }

        public function getSingleParkingSpace($id) {

            $quary = "SELECT * FROM parking_spaces WHERE id=$id";

            $result = mysqli_query($this->config->res,$quary);

            $fetchedData = mysqli_fetch_assoc($result);
            
            return $fetchedData;
        }

        public function deleteParkingSpace($id) {
            $quary = "DELETE FROM parking_spaces WHERE id=$id";

            $result = mysqli_query($this->config->res,$quary);

            return $result;
        }

        public function updateParkingSpace($parking_lot_id,$space_number,$status,$id) {

            $quary = "UPDATE `parking_spaces` SET `parking_lot_id`='$parking_lot_id',`space_number` = '$space_number',`status`='$status' WHERE id = $id";

            $result = mysqli_query($this->config->res,$quary);

            return $result;
        }
        
    }

?>