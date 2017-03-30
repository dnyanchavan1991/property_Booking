<!DOCTYPE HTML>
<html>
<?php
//if(isset($filterData)){
//    var_dump($filterData);
////    foreach($filterData['selectedBathroomList'] as $aa ){
////        var_dump($aa);
////    }
//}
////?>
<!--head-->
<?php include('includes/head.php'); ?>

<body>

<!-- Top header -->
<?php include('includes/header.php'); ?>
<section id="reservation-form">
    <div id="sticky-anchor"></div>
    <div class="container hidden-xs" id="sticky" style="width:100%;padding:0">
        <div class="row">
            <form method="post" action="<?php echo base_url()?>index.php/RoomAvailability/checkRoomAvailabilty" id="roomAvailable">
            <div class="col-md-12 stick-main">
                <div class="form-inline reservation-horizontal clearfix" role="form"   name="reservationform" id="reservationform" style="padding:20px;">
                    <div id="message"></div><!-- Error message display -->
                    <div class="row tp">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="email" accesskey="E">Location</label>
                                <input name="location" required="required" type="text" id="location" value="<?php  echo $formData ? $formData['destination']:'' ?>" class="form-control location" placeholder="Please enter your Location"/>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="room">Property Type</label>

                                <select class="form-control" name="room" id="room">
                                    <option selected="selected" disabled="disabled" value="0">Property types</option>
                                    <?php
                                    foreach($propertyTypes as $propertyType){
                                        echo'<option value='.$propertyType->propertyTypeId.'>'.$propertyType->propertyTypeName.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="checkin">Check-in</label>
                                <i class="fa fa-calendar infield"></i>
                                <input name="checkIn"  required="required" type="text" id="checkin" value="<?php  echo $formData ? $formData['checkIn']:'' ?>" class="form-control" placeholder="Check-in"/>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="checkout">Check-out</label>
                                <i class="fa fa-calendar infield"></i>
                                <input name="checkOut" type="text"   required="required" id="checkout" value="<?php  echo $formData ? $formData['checkOut']:'' ?>" class="form-control" placeholder="Check-out"/>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <div class="guests-select">
                                    <label>Guests</label>


                                    <select class="form-control" name="room" id="room">
                                        <option selected="selected" disabled="disabled">1</option>
                                        <option value="Single">2</option>
                                        <option value="Double">3</option>
                                        <option value="Deluxe">4</option>
                                        <option value="Deluxe">5</option>
                                        <option value="Deluxe">6</option>
                                        <option value="Deluxe">7</option>
                                        <option value="Deluxe">8</option>
                                        <option value="Deluxe">9</option>
                                        <option value="Deluxe">10</option>
                                        <option value="Deluxe">11</option>
                                        <option value="Deluxe">12</option>
                                        <option value="Deluxe">13</option>
                                        <option value="Deluxe">14</option>
                                        <option value="Deluxe">15+</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary btn-block">Book Now</button>
                        </div>
                        <div class="col-md-12" style="padding-top:10px;">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <select class="form-control applyChange" name="changeFilter" id="room" >
                                            <option selected="selected" value="0">Sorting types</option>
                                            <option value="bedLowToHigh">Bedrooms : Low to High</option>
                                            <option value="bedHighToLow">Bedrooms : High to Low</option>
                                            <option value="accLowToHigh">Accommodates : Low to High</option>
                                            <option value="accHighToLow">Accommodates : High to Low</option>
                                            <option value="propAToZ">Property Name : A to Z</option>
                                            <option value="propZToA">Property Name : Z to A</option>
                                        </select>
                                    </div>
                                </div>
                                <div class=" col-sm-8">
                                    <div class="form-group">
                                        <a href="#" class="btn btn-primary more-filters-btn">More Filters <span class="caret"></span></a>
                                        <a href="#" type="submit" class="btn btn-primary apply">Apply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="more-filter" style="min-height:260px;height:auto;display:none;background-color:#f2f2f2;margin-top:10px;">
                        <div class="col-xs-3 col-md-2 star" style="min-height:200px;:100px;">
                            <h4>Ratings</h4>

                            <div class="checkbox">
                                <input type="checkbox" value="5" name="rating[]" class="other-rating">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <br>
                            <br>
                            <div class="checkbox" style="padding-bottom:5px;">
                                <input type="checkbox" value="4" name="rating[]" class="other-rating">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <br>
                            <br>
                            <div class="checkbox" style="padding-bottom:5px;">
                               <input type="checkbox" value="3" name="rating[]" class="other-rating">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <br>
                            <br>
                            <div class="checkbox" style="padding-bottom:5px;">
                                <input type="checkbox" value="2" name="rating[]" class="other-rating">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <br><br>
                            <div class="checkbox" style="padding-bottom:5px;">
                                <input type="checkbox" value="1" name="rating[]" class="other-rating"><i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                        </div>
                    <div class="col-xs-2 col-md-2 star" style="min-height:200px;:">
                        <h4>Bathrooms</h4>
                        <div class="checkbox">
                            <input type="checkbox" value="1" name="bathrooms[]" class="other-rating">1 Bathroom
                        </div>
                        <br>
                        <br>
                        <div class="checkbox" style="padding-bottom:5px;">
                            <input type="checkbox" value="2" name="bathrooms[]" class="other-rating">2 Bathrooms
                        </div>
                        <br>
                        <br>
                        <div class="checkbox" style="padding-bottom:5px;">
                            <input type="checkbox" value="3" name="bathrooms[]" class="other-rating">3 Bathrooms
                        </div>
                        <br>
                        <br>
                        <div class="checkbox" style="padding-bottom:5px;">
                            <input type="checkbox" value="4" name="bathrooms[]" class="other-rating">4 Bathrooms
                        </div>
                        <br><br>
                        <div class="checkbox" style="padding-bottom:5px;">
                            <input type="checkbox" value="5" name="bathrooms[]" class="other-rating">5+ Bathrooms
                        </div>
                    </div>
                        <div class="col-xs-2 col-md-2" style="min-height:200px;">
                            <h4>Features</h4>
                            <div class="checkbox">
                                <input type="checkbox" value="pool" name="featured[]" class="other-rating">Swimming Pool
                            </div>
                            <br>
                            <br>
                            <div class="checkbox" style="padding-bottom:5px;">
                                <input type="checkbox" value="television_access" name="featured[]" class="other-rating">Television
                            </div>
                            <br>
                            <br>
                            <div class="checkbox" style="padding-bottom:5px;">
                                <input type="checkbox" value="internet_access" name="featured[]" class="other-rating" >Free WIFI
                            </div>
                            <br>
                            <br>
                            <div class="checkbox" style="padding-bottom:5px;">
                                <input type="checkbox" value="air_condition" name="featured[]" class="other-rating">Air Conditioner
                            </div>
                        </div>
                        <div class="col-xs-3 col-md-2" style="min-height:200px;">
                            <h4>Facilities</h4>
                            <div class="checkbox">
                               <input type="checkbox" value="free_breakfast" name="facility[]" class="other-rating">Free Breakfast
                            </div>
                            <br>
                            <br>
                            <div class="checkbox" style="padding-bottom:5px;">
                                <input type="checkbox" value="free_parking" name="facility[]" class="other-rating">Free Parking
                            </div>
                            <br>
                            <br>
                            <div class="checkbox" style="padding-bottom:5px;">
                                <input type="checkbox" value="in_house_kitchen" name="facility[]" class="other-rating">In House Kitchen
                            </div>
                            <br>
                            <br>
                            <div class="checkbox" style="padding-bottom:5px;">
                                <input type="checkbox" value="smoking_allowd" name="facility[]" class="other-rating">Smoking Allowed
                            </div>
                            <br><br>
                            <div class="checkbox" style="padding-bottom:5px;">
                                <input type="checkbox" value="pet_friendly" name="facility[]" class="other-rating">Pet Friendly
                            </div>
                        </div>
                        <div class="col-xs-2 col-md-3" style="min-height:200px;">
                            <div class="col-sm-12">
                                <h4>Bedroooms</h4>

                                    <select class="form-control changeFilters" name="bedrooms-filter">
                                        <option selected="selected"  value="All">All</option>
                                        <option value="1">1 Bedroom</option>
                                        <option value="2">2 Bedrooms</option>
                                        <option value="3">3 Bedrooms</option>
                                        <option value="4">4 Bedrooms</option>
                                        <option value="5">5+ Bedrooms</option>
                                    </select>

                            </div>
                        </div>
                </div>
              </form>
            </div>
        </div>
    </div>
</section>
<section class="rooms mt100">
    <div  id="load-result">
    <div class="container">
        <div class="row room-list fadeIn appear" >
        <div class="row" style="width:100%">
            <div class="col-sm-12" style="border-bottom:2px solid lightgrey;margin-bottom:20px;width:100%">
                <h3>Best Deals found : <?php echo $count ?> rentals</h3>
            </div>
            <?php 
                if(empty($data)){
                    echo "<div class='col-sm-12'><h3>No Result Found</h3></div>";
                }
             ?>
            <!-- Room -->
            <?php foreach($data as $result){ ?>
                <div class="col-sm-4">
                    <div class="room-thumb"> <img src="<?php echo base_url().'Admin/'.$result->image_path.'mainImage.jpg' ?>" alt="room 1" class="img-responsive" />
                        <div class="mask">
                            <div class="main">
                                <h5><?php echo $result->property_name ?></h5><!--,<h10><?php /*echo $result->propertyAddress*/?></h10> -->
                                <!-- <div class="price">&euro; 99<span>a night</span></div>-->
                            </div>
                            <div class="content">
                                <p><span><?php echo substr($result->description, 0,100) ?></p>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-check-circle"></i>No.of Rooms - <?php echo $result->bedrooms; ?></li>
                                            <li><i class="fa fa-check-circle"></i> No.of Bathrooms - <?php echo $result->bathrooms; ?></li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-6">
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-check-circle"></i>Pet Friendly - <?php echo $result->pet_friendly; ?></li>
                                            <li><i class="fa fa-check-circle"></i>Air Condition - <?php echo $result->air_condition; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="<?php echo base_url('/index.php/Index1/PropertyDetails/'.$result->property_id.'') ?>" class="btn btn-primary btn-block">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
    </div>
    <div class="col-md-12" style="text-align:center">
        <?php echo $this->pagination->create_links();?>
    </div>
        </div>
</section>


<!-- Footer -->
<?php include('includes/footer.php'); ?>
<!-- Go-top Button -->
<div id="go-top"><i class="fa fa-angle-up fa-2x"></i></div>

</body>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
<script>

    $(".apply").click(function(){
        $(".more-filter").hide();
    });
        $(document).on('change', '.applyChange', function () {
        $.ajax({
            url: '<?php echo base_url()?>index.php/RoomAvailability/checkRoomAvailabilty',
            type: 'POST',
            data: $('#roomAvailable').serialize(),
            success: function(data) {
                document.body.innerHTML=data;
                $(".container .appear").css("opacity","1");
            }
        });
    });
        $(document).on('change', '.changeFilters', function () {
            $.ajax({
                url: '<?php echo base_url()?>index.php/RoomAvailability/checkRoomAvailabilty',
                type: 'POST',
                data: $('#roomAvailable').serialize(),
                success: function(data) {
                    document.body.innerHTML=data;
                    $(".container .appear").css("opacity","1");
                }
            });
        });

        $(document).on('click', '.other-rating', function () {
           // alert("working");
            $.ajax({
                url: '<?php echo base_url()?>index.php/RoomAvailability/checkFilterRoomAvailabilty',
                type: 'POST',
                data: $('#roomAvailable').serialize(),
                success: function(data) {
//                    document.body.innerHTML=data;
                    $('#load-result').html(data);
                    $(".container .appear").css("opacity","1");
                }
            });
        });
</script
</html>