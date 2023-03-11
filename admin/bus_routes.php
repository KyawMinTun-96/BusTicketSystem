<?php include_once("base.php") ?>
<style>
    body {
        overflow-y: scroll;
    }
</style>

<?php 

    $con = connect();

    if($con) {
        $qry = "SELECT DISTINCT bus_route FROM bus_info";
        $res = getData($qry);

?>
            
<div class="page_content">
    <div class="page_title">
        <h1>Bus Routes</h1>
    </div>

    <?php 

        if($res){
    
    
    ?>

    <div class="inner-sm">
        <div class="route_group">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <?php 



                $i = 0;
                foreach($res as $val) {

                    $route = getRoute($val->bus_route);
                ?>



                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading<?php echo $i; ?>">

                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $i; ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                            <i class="fa-regular fa-route route_icon"></i>
                            <?php 
                            
                                echo $route;
                            
                            ?>
                        </button>
                    </h2>
                    <div id="flush-collapse<?php echo $i; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $i; ?>" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body route_list">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Bus Name</th>
                                        <th scope="col">Driver Name</th>
                                        <th scope="col">Bus No</th>
                                        <th scope="col">Bus Type</th>
                                        <th scope="col">Dep Time</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                <?php 

                                    if($con) {
                                        $qry = "SELECT *, i.id as id, b.bus_type FROM bus_info as i LEFT JOIN bus_brand as b ON i.brand_id=b.id WHERE i.bus_route='" . $val->bus_route ."'";
                                        $res = getData($qry);
                                        $j = 1;

                                        foreach($res as $info) 
                                        {

                                ?>
                                    <tr>
                                        <td scope="row"><?php echo $j; ?></td>
                                        <td><?php echo $info->bus_name ?></td>
                                        <td>Ko Kyaw Kyaw</td>
                                        <td><?php echo $info->bus_no ?></td>
                                        <td><?php echo $info->bus_type?></td>
                                        <td><?php echo $info->departure_time ?></td>
                                        <td>Travel</td>
                                    </tr>


                                    <?php 
                                        $j++;
                                        }

                                
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>




                <?php 
                        $i++;
                    }

                ?>
            </div>
        </div>
    </div>

    <?php 
    
        }else{
    
    ?>

        <div class="error_box">
            <p>There is no bus today!</p>
        </div>

    <?php 
    
        }
    
    ?>
</div>

<?php 
        
    }

?>

<?php include_once("footer.php") ?>