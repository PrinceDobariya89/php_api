<?php

    class Config{

        private $SERVERNAME = "localhost";
        private $USERNAME = "root";
        private $PASSWORD = "";
        private $DATABASE = "db_pms";
        public $res;

        public function connect() {
            $this->res = mysqli_connect($this->SERVERNAME,$this->USERNAME,$this->PASSWORD,$this->DATABASE);
        }

    }

?>