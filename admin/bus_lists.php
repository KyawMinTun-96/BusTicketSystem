<?php include_once("base.php") ?>

            
<div class="page_content">

    <div class="inner-md">
        <div class="page_title">
            <h1>Bus Lists</h1>
        </div>

        <div class="form_box bus_list">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Bus Name</th>
                        <th scope="col">Bus No</th>
                        <th scope="col">Bus Route</th>
                        <th scope="col">Bus Type</th>
                        <th scope="col">Dep Time</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead> 
                <tbody>
                <?php 
                    $con = connect();

                    if($con) {
                        $qry = "SELECT *, i.id as id, b.bus_type FROM bus_info as i LEFT JOIN bus_brand as b ON i.brand_id=b.id";
                        $res = getData($qry);

                        foreach($res as $val) 
                        {
                ?>
                    <tr>
                        <td scope="row"><?php echo $val->id ?></td>
                        <td><?php echo $val->bus_name ?></td>
                        <td><?php echo $val->bus_no ?></td>
                        <td>
                            <?php
                                $route = getRoute($val->bus_route);
                                echo $route;
                            ?>
                        </td>
                        <td><?php echo $val->bus_type?></td>
                        <td><?php echo $val->departure_time ?></td>
                        <td>
                            <button type="button" class="btn" title="Details"><i class="fa-sharp fa-solid fa-eye"></i></button>
                            <button type="button" class="btn" title="Edit"><i class="fa-regular fa-pen-to-square"></i></button>
                            <button type="button" class="btn" title="Delete"><i class="fa-solid fa-trash"></i></button>

                        </td>
                    </tr>


                    <?php 
                        
                          }

                
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php include_once("footer.php") ?>