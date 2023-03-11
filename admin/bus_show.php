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
            <div class="card_box" onclick="busSeats(this)"data-seatno="<?php echo $data->seats; ?>" data-price="20000" data-id="<?php echo $data->id ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4 card_image">
                            <img src="./upload/<?php echo $data->bus_image ?>" class="img-fluid rounded-start" alt="">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body box_body">
                                <h5 class="card-title"><?php echo $data->bus_name?></h5>
                                <p class="card-text">
                                    <i class="fa-sharp fa-solid fa-bus"></i>
                                    <?php echo $data->bus_type?>
                                </p>
                                <p class="card-text">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <?php echo getRoute($data->bus_route) ?>
                                </p>
                                <p class="card-text">
                                    <i class="fa-sharp fa-solid fa-clock"></i>
                                    <small class="text-muted"><?php echo $data->departure_time; ?></small>
                                </p>
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

        <div class="error_box">
            <p>There is no bus today!</p>
        </div>
        <?php 
        
            }
        }
        ?>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Book Your Seats Now!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6 seat_design">
                        <table class="inner-lg">
                            <tbody class="seat_row">

                                <!-- <tr>
                                    <td><button type="button">1</button></td>
                                    <td><button type="button">2</button></td>
                                    <td class="lane"></td>
                                    <td><button type="button">3</button></td>
                                    <td><button type="button">4</button></td>                                  
                                </tr>
                                <tr>
                                    <td><button type="button">5</button></td>
                                    <td><button type="button">6</button></td>
                                    <td class="lane"></td>
                                    <td><button type="button">7</button></td>
                                    <td><button type="button">8</button></td>    
                                </tr>
                                <tr>
                                    <td><button type="button">9</button></td>
                                    <td><button type="button">10</button></td>
                                    <td class="lane"></td>
                                    <td><button type="button">11</button></td>
                                    <td><button type="button">12</button></td>                                   
                                </tr>
                                <tr>
                                    <td><button type="button">13</button></td>
                                    <td><button type="button">14</button></td>
                                    <td class="lane"></td>
                                    <td><button type="button">15</button></td>
                                    <td><button type="button">16</button></td>    
                                </tr>
                                <tr>
                                    <td><button type="button">17</button></td>
                                    <td><button type="button">18</button></td>
                                    <td class="lane"></td>
                                    <td><button type="button">19</button></td>
                                    <td><button type="button">20</button></td>    
                                </tr>
                                <tr>
                                    <td><button type="button">21</button></td>
                                    <td><button type="button">22</button></td>
                                    <td class="lane"></td>
                                    <td><button type="button">23</button></td>
                                    <td><button type="button">24</button></td>                                   
                                </tr>
                                <tr>
                                    <td><button type="button">25</button></td>
                                    <td><button type="button">26</button></td>
                                    <td class="lane"></td>
                                    <td><button type="button">27</button></td>
                                    <td><button type="button">28</button></td>   
                                </tr>
                                <tr>
                                    <td><button type="button">29</button></td>
                                    <td><button type="button">30</button></td>
                                    <td class="lane"></td>
                                    <td><button type="button">31</button></td>
                                    <td><button type="button">32</button></td>   
                                </tr>
                                <tr>
                                    <td><button type="button">33</button></td>
                                    <td><button type="button">34</button></td>
                                    <td><button type="button">35</button></td>
                                    <td><button type="button">36</button></td>  
                                    <td><button type="button">37</button></td>    
                                </tr> -->
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <div class="inner-lg">
                            <div class="seat_group">
                                <div class="seat_label">
                                    <div class="seat_color1"></div>
                                    <span>Booking Seats</span>
                                </div>
                                <div class="seat_label">
                                    <div class="seat_color2"></div>
                                    <span>Available Seats</span>
                                </div>
                                <div class="seat_amount">
                                    <p>Selected Seats: (<span class="seat_no">0</span>)</p>
                                    <p>Total: (<span class="seat_price">0</span>)Ks</p>
                                </div>
                                <div class="buy_ticket d-md-flex justify-content-md-end">
                                    <button type="button" class="btn btn_add">Buy Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
</div>


<script>

    function busSeats(id){

        var bus_id = id.getAttribute("data-id");
        var price = id.getAttribute("data-price");
        var seat_total = id.getAttribute("data-seatno");
        var seat_row = document.querySelector(".seat_row");

        if(bus_id.length == 0) {

            alert("Failed!");
            return;

        }else {

            xmlhttp = new XMLHttpRequest();

            xmlhttp.onload = function() {

                if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    seat_row.innerHTML = this.responseText;

                }

            };
            xmlhttp.open("GET", "system/generate.php?bid=" + parseInt(bus_id), true);
            xmlhttp.send();
        }




        // if(seat_total > 0) {

        //     // console.log(seat_total);

        //     for(var i =1; i <= parseInt(seat_total); i++) {


        //     //     console.log(parseInt(seat_total));


        //     //     seat_row.innerHTML = "<td><button type='button'>"+ i +"</button></td>" +
        //     //                             "<td class='lane'></td>";

        //     }

        // }

        var seat = document.querySelectorAll(".seat_design table tbody tr td button");
        var seat_no = document.querySelector(".seat_no");
        var seat_price = document.querySelector(".seat_price");
        var btn_close = document.querySelector('.btn-close');
        const selected_seat = [];

        for(var i= 0; i < seat.length; i++) {

            seat[i].addEventListener('click', function() {

                if(this.classList.toggle("set_bg")){

                    const set_bg = document.querySelectorAll('.set_bg');

                    selected_seat.push(this.innerHTML);

                    for (var j = 0; j < selected_seat.length; j++) {
                        seat_price.innerHTML = (selected_seat.length * parseInt(price)).toLocaleString();
                        seat_no.innerHTML = selected_seat.join(", ");
                    }
                }else{
                    selected_seat.length = 0;
                    
                    const set_bg = document.querySelectorAll('.set_bg');

                    if(set_bg.length == 0) {
                        seat_no.innerHTML = 0;
                        seat_price.innerHTML = 0
                    }

                    for(var j= 0; j < set_bg.length; j++) {

                        selected_seat.push(set_bg[j].innerHTML);
                        seat_price.innerHTML = (selected_seat.length * parseInt(price)).toLocaleString();
                        seat_no.innerHTML = selected_seat.join(", ");

                    }

                }

            });

        }


        btn_close.addEventListener('click', function() {
            selected_seat.length = 0;
            seat_no.innerHTML = 0;
            seat_price.innerHTML = 0
            seat.forEach(bg => {
                bg.classList.remove("set_bg");
            });
        });


    }

</script>

<?php include_once("footer.php") ?>