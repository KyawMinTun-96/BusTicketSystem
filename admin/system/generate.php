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

<?php 
              
              
    if(isset($_GET["bid"])){
        $bid = $_GET["bid"];

        $qry = "SELECT b.seats as bseat FROM bus_info as i LEFT JOIN bus_brand as b ON i.brand_id=b.id 
        WHERE i.id=$bid";
        $res = getData($qry);

        if($res) {

            echo  '<tr>';

            foreach($res as $val) {
                $seats = $val->bseat;
                $brk = 4;
                $space = 2;
                $last = 4;

                    for($i = 1; $i <= $seats; $i++) {

                        if($i != ($seats - $last)) {

                            echo  '<td><button type="button">'. $i .'</button></td>';

                            if($i == $space){
                                echo '<td class="lane"></td>';
                                $space +=4;
                            }

                            if($i == $brk) {
                                
                                echo "</tr>";
                                echo "<tr>";
                                $brk += 4;
                            }


                        }else{

                            echo  '<td><button type="button">'. $i .'</button></td>';
                            $last -=1;
                        }
                    }

            }





           
        }

    }

?>



