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


    function getData($query) {
        try 
        {
            $con = connect();
            $stmt = $con->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);

        }catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    function setRoute($from, $to) {

        return $from .'-' . $to;
        
    }



    function getRoute($route) {

        $str = explode('-', $route);
        $from_to = "";

        foreach($str as $lid) {

            $qry = "SELECT * FROM bus_location WHERE id=$lid";
            $loc = getData($qry);

            foreach($loc as $tsp) {

                $from_to .= $tsp->township . " - ";

            }
            
            
        }
        return preg_replace("/-[^-]*$/", '', $from_to);
    }










?>