<?php include_once("base.php") ?>


<?php 

    if(isset($_POST['submit'])) {

        $date = $_POST['date'];
        $from = $_POST['from_loc'];
        $to = $_POST['to_loc'];
        $route = setRoute($from, $to);


        $qry = "SELECT * FROM bus_info where bus_route='" . $route . "'";
        $res = getData($qry);

        // echo "<pre>";
        // echo print_r($res, true);

    }



?>
            
            
<div class="page_content">
    <div class="inner-lg">
        <form action="bus_show.php" method="post" class="form_box">
            <h1>Booking</h1>
            <div class="mb-3">
                <label for="date" class="form-label">Departure Date</label>
                <input type="date" class="form-control" name="date" id="date">
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col">
                        <label for="from" class="form-label">From </label>
                        <select name="from_loc" class="form-select" id="from">
                            <option selected>Select Location</option>
                            <?php 

                                $qry = "SELECT * FROM bus_location";
                                $res = getData($qry);

                                foreach($res as $val) 
                                {

                            ?>
                                    <option value="<?php echo $val->id ?>"><?php echo $val->township ?></option>

                            <?php 

                                }
                            
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="to" class="form-label">To</label>
                        <select name="to_loc" id="to" class="form-select">
                            <option selected>Select Location</option>
                            <?php 

                                $qry = "SELECT * FROM bus_location";
                                $res = getData($qry);

                                foreach($res as $val) 
                                {

                            ?>
                                    <option value="<?php echo $val->id ?>"><?php echo $val->township ?></option>

                            <?php 

                                }
                            
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mt-5 d-md-flex justify-content-md-end">
                <button type="submit" name="submit" class="btn btn_add">Search</button>
            </div>
        </form>
    </div>
</div>



<?php include_once("footer.php") ?>