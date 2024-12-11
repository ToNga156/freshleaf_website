<?php
    class Database {
        public $connection;
        public $servername = "localhost";
        public $username = "root";
        public $password = "";
        public $dbname = "freshleaf_website";

        function __construct() {
            $this->connection = mysqli_connect($this->servername, $this->username, $this->password);
            mysqli_select_db($this->connection, $this->dbname);
            mysqli_query($this->connection, "SET NAMES 'utf8'");
        }
    }
?>