<?php 

    include_once("db_connection.php");

    function getTime() {
        date_default_timezone_set("Asia/Rangoon");
        return date("Y-m-d H:m:s", time());
    }


    function insert($query) {
        try {

            $con = connect();
            $res = $con->exec($query);
            
            return $res;

        }catch (PDOException $e) {

            return "Error: " . $e->getMessage();

        }
    }










?>