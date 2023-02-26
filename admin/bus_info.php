<?php include_once("base.php") ?>


<?php 
    $con = connect();
    if($con) {
        if(isset($_POST['submit'])) {
            $bus_name = $_POST['name'];
            $bus_no = $_POST['bus_no'];
            $bus_route = $_POST['route'];
            $company = $_POST['company'];
            $bus_image = $_FILES['image'];
            $img = mt_rand(time(), time()) * mt_rand(time(), time()) . "_" . $bus_image["name"];
            $created_date = getTime();

            $qry = "INSERT INTO bus_info(bus_name, bus_no, bus_route, company, bus_image, created_date) VALUES ('$bus_name', '$bus_no', '$bus_route', '$company', '$img', '$created_date')";
            $res = insert($qry);

            move_uploaded_file($bus_image['tmp_name'],"upload/" . $img );
            echo "<script>alert('Insert data successfully!');</script>";
            
        }
    }

?>
            
<div class="page_content">
    <div class="inner-lg">
        <form action="<?php $_PHP_SELF ?>" method="post" class="form_box" enctype="multipart/form-data">
            <h1>Bus Information</h1>
            <div class="mb-3">
                <label for="name" class="form-label">Bus Name</label>
                <input required type="text" class="form-control" name="name" id="name">
            </div>
            <div class="mb-3">
                <label for="bus_no" class="form-label">Bus No</label>
                <input required type="text" class="form-control" name="bus_no" id="bus_no">
            </div>
            <div class="mb-3">
                <label for="bus_route" class="form-label">Bus Route</label>
                <input required type="text" class="form-control" name="route" id="bus_route">
            </div>
            <div class="mb-3">
                <label for="company" class="form-label">Company</label>
                <input required type="text" class="form-control" name="company" id="company">
            </div>
            <div class="mb-3">
                <label for="bus_image" style="display:block; margin-bottom:5px">Select Image</label>
                <input required type="file" name="image" id="bus_image">
            </div>
            <div class="mt-5 d-md-flex justify-content-md-end">
                <button type="submit" name="submit" class="btn btn_add">Add</button>
            </div>
        </form>
    </div>
</div>



<?php include_once("footer.php") ?>