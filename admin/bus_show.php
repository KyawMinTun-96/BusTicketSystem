<?php include_once("base.php") ?>

<div class="page_content">
    <div class="inner-md">

        <div class="page_title">
            <h1>Available Bus</h1>
        </div>


        <nav aria-label="breadcrumb" class="show_bcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="booking.php">Booking</a></li>
                <li class="breadcrumb-item active" aria-current="page">All</li>
            </ol>
        </nav>

        <?php 


        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $date = $_REQUEST['date'];
            $from = $_REQUEST['from_loc'];
            $to = $_REQUEST['to_loc'];
            $route = setRoute($from, $to);


            $qry = "SELECT *, i.id as id, b.bus_type FROM bus_info as i LEFT JOIN bus_brand as b ON i.brand_id=b.id WHERE bus_route='" . $route . "'";
            $res = getData($qry);

            if($res) {

        ?>


        <div class="show_body">
            <?php 
            
                foreach($res as $data){
            
            ?>
            <div class="card_box">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="./upload/<?php echo $data->bus_image ?>" class="img-fluid rounded-start" alt="">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $data->bus_name?></h5>
                                <p class="card-text"><?php echo $data->bus_type?></p>
                                <p class="card-text"><?php echo getRoute($data->bus_route) ?></p>
                                <p class="card-text"><small class="text-muted"><?php echo $data->departure_time; ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php 
            
                }
            
            ?>
        </div>
        <?php 
            
            }else{
        
        ?>

        <div>
            <p>There is no bus found today!</p>
        </div>
        <?php 
        
            }
        }
        ?>
    </div>
</div>
<?php include_once("footer.php") ?>