<!DOCTYPE HTML>
<html>

<!--head-->
<?php include('includes/head.php'); ?>

<body>

<!-- Top header -->
<?php include('includes/header.php'); ?>
<section id="reservation-form">
    <div id="sticky-anchor"></div>
    <div class="container hidden-xs" id="sticky" style="width:100%;padding:0">
        <div class="row">
            <div class="col-md-12 stick-main">
                <div class="form-inline reservation-horizontal clearfix" role="form"   name="reservationform" id="reservationform" style="padding:20px;">
                    <div id="message"></div><!-- Error message display -->
                    <div class="row tp">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="email" accesskey="E">Location</label>
                                <input name="email" type="text" id="location" value="" class="form-control location" placeholder="Please enter your Location"/>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="room">Property Type</label>

                                <select class="form-control" name="room" id="room">
                                    <option selected="selected" disabled="disabled">Property types</option>
                                    <option value="Single">Villa</option>
                                    <option value="Double">Dormatory</option>
                                    <option value="Deluxe">Apartment</option>
                                    <option value="Deluxe">Bunglow</option>
                                    <option value="Deluxe">Row House</option>
                                    <option value="Deluxe">Cottage</option>
                                    <option value="Deluxe">Hut</option>
                                    <option value="Deluxe">House Boat</option>
                                    <option value="Deluxe">Tree House</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="checkin">Check-in</label>
                                <div class="popover-icon" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Check-In is from 11:00"> <i class="fa fa-info-circle fa-lg"> </i> </div>
                                <i class="fa fa-calendar infield"></i>
                                <input name="checkin" type="text" id="checkin" value="" class="form-control" placeholder="Check-in"/>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="checkout">Check-out</label>
                                <div class="popover-icon" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Check-out is from 12:00"> <i class="fa fa-info-circle fa-lg"> </i> </div>
                                <i class="fa fa-calendar infield"></i>
                                <input name="checkout" type="text" id="checkout" value="" class="form-control" placeholder="Check-out"/>
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
                                        <select class="form-control" name="room" id="room">
                                            <option selected="selected" disabled="disabled">Property types</option>
                                            <option value="Single">Bedrooms : Low to High</option>
                                            <option value="Double">Bedrooms : High to Low</option>
                                            <option value="Deluxe">Accommodates : Low to High</option>
                                            <option value="Deluxe">Accommodates : High to Low</option>
                                            <option value="Deluxe">Property Name : A to Z</option>
                                            <option value="Deluxe">Property Name : Z to A</option>
                                        </select>
                                    </div>
                                </div>
                                <div class=" col-sm-8">
                                    <div class="form-group">
                                        <button  class="btn btn-primary more-filters-btn">More Filters <span class="caret"></span></button>
                                        <button type="submit" class="btn btn-primary ">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="more-filter" style="min-height:260px;height:auto;display:none;background-color:#f2f2f2;margin-top:10px;">
                        <div class="col-xs-3 col-md-2 star" style="min-height:200px;:100px;">
                            <h4>Ratings</h4>
                            <div class="checkbox">
                                <input type="checkbox" value="">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <br>
                            <br>
                            <div class="checkbox" style="padding-bottom:5px;">
                                <input type="checkbox" value="">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <br>
                            <br>
                            <div class="checkbox" style="padding-bottom:5px;">
                               <input type="checkbox" value="">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <br>
                            <br>
                            <div class="checkbox" style="padding-bottom:5px;">
                                <input type="checkbox" value="">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <br><br>
                            <div class="checkbox" style="padding-bottom:5px;">
                                <input type="checkbox" value=""><i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                        </div>
                    <div class="col-xs-2 col-md-2 star" style="min-height:200px;:">
                        <h4>Bathrooms</h4>
                        <div class="checkbox">
                            <input type="checkbox" value="">1 Bathroom
                        </div>
                        <br>
                        <br>
                        <div class="checkbox" style="padding-bottom:5px;">
                            <input type="checkbox" value="">2 Bathrooms
                        </div>
                        <br>
                        <br>
                        <div class="checkbox" style="padding-bottom:5px;">
                            <input type="checkbox" value="">3 Bathrooms
                        </div>
                        <br>
                        <br>
                        <div class="checkbox" style="padding-bottom:5px;">
                            <input type="checkbox" value="">4 Bathrooms
                        </div>
                        <br><br>
                        <div class="checkbox" style="padding-bottom:5px;">
                            <input type="checkbox" value="">5+ Bathrooms
                        </div>
                    </div>
                        <div class="col-xs-2 col-md-2" style="min-height:200px;">
                            <h4>Features</h4>
                            <div class="checkbox">
                                <input type="checkbox" value="">Swimming Pool
                            </div>
                            <br>
                            <br>
                            <div class="checkbox" style="padding-bottom:5px;">
                                <input type="checkbox" value="">Television
                            </div>
                            <br>
                            <br>
                            <div class="checkbox" style="padding-bottom:5px;">
                                <input type="checkbox" value="">Free WIFI
                            </div>
                            <br>
                            <br>
                            <div class="checkbox" style="padding-bottom:5px;">
                                <input type="checkbox" value="">Air Conditioner
                            </div>
                        </div>
                        <div class="col-xs-3 col-md-2" style="min-height:200px;">
                            <h4>Facilities</h4>
                            <div class="checkbox">
                               <input type="checkbox" value="">Free Breakfast
                            </div>
                            <br>
                            <br>
                            <div class="checkbox" style="padding-bottom:5px;">
                                <input type="checkbox" value="">Free Parking
                            </div>
                            <br>
                            <br>
                            <div class="checkbox" style="padding-bottom:5px;">
                                <input type="checkbox" value="">In House Kitchen
                            </div>
                            <br>
                            <br>
                            <div class="checkbox" style="padding-bottom:5px;">
                                <input type="checkbox" value="">Smoking Allowed
                            </div>
                            <br><br>
                            <div class="checkbox" style="padding-bottom:5px;">
                                <input type="checkbox" value="">Pet Friendly
                            </div>
                        </div>
                        <div class="col-xs-2 col-md-3" style="min-height:200px;">
                            <div class="col-sm-12">
                                <h4>Bedroooms</h4>

                                    <select class="form-control" name="room" id="room">
                                        <option selected="selected" disabled="disabled">All</option>
                                        <option value="Single">1 Bedroom</option>
                                        <option value="Double">2 Bedrooms</option>
                                        <option value="Deluxe">3 Bedrooms</option>
                                        <option value="Deluxe">4 Bedrooms</option>
                                        <option value="Deluxe">5+ Bedrooms</option>
                                    </select>

                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="rooms mt100">
    <div class="container">
        <div class="row room-list fadeIn appear">
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
                                <h5><?php echo $result->property_name ?></h5>
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
</section>


<!-- Footer -->
<?php include('includes/footer.php'); ?>
<!-- Go-top Button -->
<div id="go-top"><i class="fa fa-angle-up fa-2x"></i></div>

</body>
</html>