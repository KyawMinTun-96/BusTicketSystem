<?php include_once("base.php") ?>


<?php 
    $con = connect();
    
    if($con) {
        if(isset($_POST['submit'])) {
            $bus_name = $_POST['name'];
            $bus_no = $_POST['bus_no'];
            $from = $_POST['from_loc'];
            $to = $_POST['to_loc'];
            $bus_route = setRoute($from, $to);
            $company = $_POST['company'];
            $bus_type = $_POST['bus_type'];
            $d_times = date('g: i a', strtotime($_POST['d_time']));
            $bus_image = $_FILES['image'];
            $img = mt_rand(time(), time()) * mt_rand(time(), time()) . "_" . $bus_image["name"];
            $created_date = getTime();

            $qry = "INSERT INTO bus_info(bus_name, bus_no, bus_route, company, brand_id, departure_time, bus_image, created_date) VALUES ('$bus_name', '$bus_no', '$bus_route', '$company', $bus_type, '$d_times', '$img', '$created_date')";
            $res = insert($qry);
            move_uploaded_file($bus_image['tmp_name'],"upload/" . $img );            
        }
    }

?>
            
<div class="page_content">
    <div class="inner-lg">
        <form action="<?php $_PHP_SELF ?>" method="post" class="form_box" enctype="multipart/form-data">
            <h1>Bus Information</h1>
            <div class="mb-3">
                <label for="name" class="form-label">Bus Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="mb-3">
                <label for="bus_no" class="form-label">Bus No</label>
                <input type="text" class="form-control" name="bus_no" id="bus_no">
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
            <div class="mb-3">
                <label for="company" class="form-label">Company</label>
                <input type="text" class="form-control" name="company" id="company">
            </div>
            <div class="mb-3">
                <label for="bus_type" class="form-label">Bus Type</label>
                <i class="fa-regular fa-plus"></i>
                <select name="bus_type" class="form-select" id="bus_type">
                    <option selected>Select the Bus Type</option>
                    <?php 
                                        
                            $qry = "SELECT * FROM bus_brand";
                            $res = getData($qry);

                            foreach($res as $val)
                            {
                                echo "<Option value='".  $val->id."'>" . $val->bus_type ."</Option>";
                            }
                                         
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="d_time" class="form-label">Departure Time</label>
                <input type="time" class="form-control" name="d_time" id="d_time">
            </div>
            <div class="mb-3">
                <label for="bus_image" style="display:block; margin-bottom:5px">Select Image</label>
                <input type="file" name="image" id="bus_image">
            </div>
            <div class="mt-5 d-md-flex justify-content-md-end">
                <button type="submit" name="submit" class="btn btn_add">Add</button>
            </div>
        </form>
    </div>
</div>



<?php include_once("footer.php") ?>