<?php 

    function connect() {
        try {

            $servername = "localhost";
            $username = "root";
            $password = "";

            $connection = new PDO("mysql:host=$servername;dbname=busticket", $username, $password); 
            return $connection;

            
            $connection = null; 
    
        }catch (PDOException $e) {
            echo "Connection failed : " . $e->getMessage();
        }
    }


    include_once("generate.php");

?>