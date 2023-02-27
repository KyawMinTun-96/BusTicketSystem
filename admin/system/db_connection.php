<?php 

    function connect() {
        try {

            $servername = "localhost";
            $username = "root";
            $password = "";

            $connection = new PDO("mysql:host=$servername;dbname=busticket", $username, $password); 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;

            
            $connection = null; 
    
        }catch (PDOException $e) {
            echo "Connection failed : " . $e->getMessage();
        }
    }


    include_once("generate.php");

?>