    <?php include_once('base.php') ?>
            
    <div class="page_content">
        <div class="page_title">
            <h1>Home</h1>
        </div>

        <div class="inner-sm">
            <div class="card_group">

            <?php 
                $con = connect();
                $qry = "SELECT * FROM bus_info";
                $res = getData($qry);

                if($res){       
            ?>
                <div class="card mb-3" style="min-width: 13rem;">
                    <div class="card-body h_card_body">
                        <div class="c_card_logo">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <p class="card-text c_card_text">10</p>
                    </div>
                    <div class="card-footer c_card_footer bg-transparent">Customers</div>
                </div>
                <div class="card mb-3" style="min-width: 13rem;">
                    <div class="card-body h_card_body">
                        <div class="b_card_logo">
                        <i class="fa-solid fa-money-check-dollar"></i>
                        </div>
                        <p class="card-text b_card_text">30</p>
                    </div>
                    <div class="card-footer b_card_footer bg-transparent">Booking</div>
                </div>

                <div class="card mb-3" style="min-width: 13rem;">
                    <div class="card-body st_card_body">
                        <div class="st_card_logo">
                        <i class="fa-sharp fa-regular fa-network-wired"></i>
                        </div>
                        <p class="card-text st_card_text">10</p>
                    </div>
                    <div class="card-footer st_card_footer bg-transparent">Seats</div>
                </div>

                <?php 
                    
                    $con = connect();
                    $rq = "SELECT DISTINCT bus_route FROM bus_info";
                    $br = getData($rq);

                    if($br){ 

                ?>

                <div class="card mb-3" style="min-width: 13rem;">
                    <div class="card-body r_card_body">
                        <div class="r_card_logo">
                        <i class="fa-solid fa-signs-post"></i>
                        </div>
                        <p class="card-text r_card_text"><?php echo count($br); ?></p>
                    </div>
                    <div class="card-footer r_card_footer bg-transparent">Routes</div>
                </div>

                <?php 
                
                    }
                ?>
                <div class="card mb-3" style="min-width: 13rem;">
                    <div class="card-body bs_card_body">
                        <div class="bs_card_logo">
                        <i class="fa-solid fa-bus"></i>
                        </div>
                        <p class="card-text bs_card_text"><?php echo count($res); ?></p>
                    </div>
                    <div class="card-footer bs_card_footer bg-transparent">Buses</div>
                </div>

                <div class="card mb-3">
                    <div class="card-body d_card_body">
                        <div class="d_card_logo">
                            <i class="fa-regular fa-calendar-days"></i>
                        </div>
                        <p class="card-text d_card_text">
                        <?php 

                            date_default_timezone_set("Asia/Rangoon");
                            echo date("d/M/Y");
                        
                        
                        ?>
                        </p>
                    </div>
                    <div class="card-footer d_card_footer bg-transparent">Dates</div>
                </div>

                <div class="card mb-3">
                    <div class="card-body d_card_body">
                        <div class="a_card_logo">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <p class="card-text a_card_text">Admin</p>
                    </div>
                    <div class="card-footer a_card_footer bg-transparent">Account</div>
                </div>


            <?php 


            }else {

            ?>
            <div class="card mb-3" style="min-width: 13rem;">
                    <div class="card-body h_card_body">
                        <div class="c_card_logo">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <p class="card-text c_card_text">0</p>
                    </div>
                    <div class="card-footer c_card_footer bg-transparent">Customers</div>
                </div>
                <div class="card mb-3" style="min-width: 13rem;">
                    <div class="card-body h_card_body">
                        <div class="b_card_logo">
                        <i class="fa-solid fa-money-check-dollar"></i>
                        </div>
                        <p class="card-text b_card_text">0</p>
                    </div>
                    <div class="card-footer b_card_footer bg-transparent">Booking</div>
                </div>

                <div class="card mb-3" style="min-width: 13rem;">
                    <div class="card-body st_card_body">
                        <div class="st_card_logo">
                        <i class="fa-sharp fa-regular fa-network-wired"></i>
                        </div>
                        <p class="card-text st_card_text">0</p>
                    </div>
                    <div class="card-footer st_card_footer bg-transparent">Seats</div>
                </div>

                <div class="card mb-3" style="min-width: 13rem;">
                    <div class="card-body r_card_body">
                        <div class="r_card_logo">
                        <i class="fa-solid fa-signs-post"></i>
                        </div>
                        <p class="card-text r_card_text">0</p>
                    </div>
                    <div class="card-footer r_card_footer bg-transparent">Routes</div>
                </div>

                <div class="card mb-3" style="min-width: 13rem;">
                    <div class="card-body bs_card_body">
                        <div class="bs_card_logo">
                        <i class="fa-solid fa-bus"></i>
                        </div>
                        <p class="card-text bs_card_text">0</p>
                    </div>
                    <div class="card-footer bs_card_footer bg-transparent">Buses</div>
                </div>

                <div class="card mb-3">
                    <div class="card-body d_card_body">
                        <div class="d_card_logo">
                            <i class="fa-regular fa-calendar-days"></i>
                        </div>
                        <p class="card-text d_card_text">0</p>
                    </div>
                    <div class="card-footer d_card_footer bg-transparent">Dates</div>
                </div>

            <?php 
            
            }
            ?>
            </div>

        </div>
    </div>





    <?php include_once('footer.php') ?>