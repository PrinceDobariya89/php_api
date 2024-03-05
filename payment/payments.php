<?php

    include('../config/config.php');

    class Payments
    {
        public $config;

        public function __construct()
        {
            $this->config = new Config();

            $this->config->connect();
        }

        public function addPayment($booking_id,$amount,$payment_time) {

            $quary = "INSERT INTO `payments` (`booking_id`, `amount`, `payment_time`) VALUES ('$booking_id', '$amount','$payment_time')";

            $result = mysqli_query($this->config->res,$quary);

            return $result;
        }

        public function getAllPayment() {

            $quary = "SELECT * FROM payments";

            $result = mysqli_query($this->config->res,$quary);

            $fetchedData = [];

            while($record = mysqli_fetch_assoc($result)) {

                array_push($fetchedData,$record);

            }
            return $fetchedData;
        }

        public function getSinglePayment($id) {

            $quary = "SELECT * FROM payments WHERE id=$id";

            $result = mysqli_query($this->config->res,$quary);

            $fetchedData = mysqli_fetch_assoc($result);
            
            return $fetchedData;
        }

        public function deletePayment($id) {
            $quary = "DELETE FROM payments WHERE id=$id";

            $result = mysqli_query($this->config->res,$quary);

            return $result;
        }

        public function updatePayment($booking_id,$amount,$payment_time,$id) {

            $quary = "UPDATE `payments` SET `booking_id`='$booking_id',`amount` = '$amount',`payment_time`='$payment_time' WHERE id = $id";

            $result = mysqli_query($this->config->res,$quary);

            return $result;
        }
        
    }

?>