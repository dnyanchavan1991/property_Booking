<?php
//print_r($propertyDetails);
//echo $propertyDetails->propertyName;
//print_r($propertyInfoDetails);
//echo $propertyInfoDetails->meals;
?>
<!DOCTYPE HTML>
<html>

<!--head-->
<?php include('includes/head.php'); ?>

<body>

<!-- Top header -->
<?php include('includes/header.php'); ?>
<div class="container mt50">
    <div class="row">
        <!-- Slider -->
        <section class="standard-slider room-slider">
            <div class="col-sm-12 col-md-8">
                <div id="owl-standard" class="owl-carousel">
                    <div class="item"> <a href="<?php echo $propertyDetails->imagePath ?>" data-rel="prettyPhoto[gallery1]"><img src="<?php echo base_url() ?>assets/img/holidays_img/4.jpg" alt="Image 2" class="img-responsive"></a> </div>
                    <div class="item"> <a href="<?php echo base_url() ?>assets/img/holidays_img/3.jpg" data-rel="prettyPhoto[gallery1]"><img src="<?php echo base_url() ?>assets/img/holidays_img/3.jpg" alt="Image 2" class="img-responsive"></a> </div>
                </div>
            </div>
        </section>

        <!-- Reservation form -->
        <section id="reservation-form" class="mt50 clearfix">
            <div class="col-sm-12 col-md-4">
                <form class="reservation-vertical clearfix" role="form" method="post" action="php/reservation.php" name="reservationform" id="reservationform">
                    <h2 class="lined-heading"><span>Reservation</span></h2>
                    <div class="price">
                        <h4>Double Room</h4>
                        &euro; 99,-<span> a night</span></div>
                    <div id="message"></div>
                    <!-- Error message display -->
                    <div class="form-group">
                        <label for="email" accesskey="E">E-mail</label>
                        <input name="email" type="text" id="email" value="" class="form-control" placeholder="Please enter your E-mail"/>
                    </div>
                    <div class="form-group">
                        <select class="hidden" name="room" id="room" disabled="disabled">
                            <option selected="selected">Double Room</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="checkin">Check-in</label>
                        <div class="popover-icon" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Check-In is from 11:00"> <i class="fa fa-info-circle fa-lg"> </i> </div>
                        <i class="fa fa-calendar infield"></i>
                        <input name="checkin" type="text" id="checkin" value="" class="form-control" placeholder="Check-in"/>
                    </div>
                    <div class="form-group">
                        <label for="checkout">Check-out</label>
                        <div class="popover-icon" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Check-out is from 12:00"> <i class="fa fa-info-circle fa-lg"> </i> </div>
                        <i class="fa fa-calendar infield"></i>
                        <input name="checkout" type="text" id="checkout" value="" class="form-control" placeholder="Check-out"/>
                    </div>
                    <div class="form-group">
                        <div class="guests-select">
                            <label>Guests</label>
                            <i class="fa fa-user infield"></i>
                            <div class="total form-control" id="test">1</div>
                            <div class="guests">
                                <div class="form-group adults">
                                    <label for="adults">Adults</label>
                                    <div class="popover-icon" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="+18 years"> <i class="fa fa-info-circle fa-lg"> </i> </div>
                                    <select name="adults" id="adults" class="form-control">
                                        <option value="1">1 adult</option>
                                        <option value="2">2 adults</option>
                                        <option value="3">3 adults</option>
                                    </select>
                                </div>
                                <div class="form-group children">
                                    <label for="children">Children</label>
                                    <div class="popover-icon" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="0 till 18 years"> <i class="fa fa-info-circle fa-lg"> </i> </div>
                                    <select name="children" id="children" class="form-control">
                                        <option value="0">0 children</option>
                                        <option value="1">1 child</option>
                                        <option value="2">2 children</option>
                                        <option value="3">3 children</option>
                                    </select>
                                </div>
                                <button type="button" class="btn btn-default button-save btn-block">Save</button>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Book Now</button>
                </form>
            </div>
        </section>

        <!-- Room Content -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-7 mt50">
                        <h2 class="lined-heading"><span>Room Details</span></h2>
                        <h3 class="mt50">Table overview</h3>
                        <table class="table table-striped mt30">
                            <tbody>
                            <tr>
                                <td><i class="fa fa-check-circle"></i> No. of Rooms - <?php echo $propertyInfoDetails->bedrooms; ?></td>
                                <td><i class="fa fa-check-circle"></i> No. of Bathrooms - <?php echo $propertyInfoDetails->bathrooms; ?></td>
                                <td><i class="fa fa-check-circle"></i> Internet Access - <?php echo $propertyInfoDetails->internet_access; ?></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-check-circle"></i>Meal - <?php echo $propertyInfoDetails->meals; ?></td>
                                <td><i class="fa fa-check-circle"></i>Television - <?php echo $propertyInfoDetails->television; ?></td>
                                <td><i class="fa fa-check-circle"></i>Pet Friendly - <?php echo $propertyInfoDetails->pet_friendly; ?></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-check-circle"></i>Air Condition - <?php echo $propertyInfoDetails->air_condition; ?></td>
                                <td><i class="fa fa-check-circle"></i>In house kitchen - <?php echo $propertyInfoDetails->in_house_kitchen; ?></td>
                                <td><i class="fa fa-check-circle"></i>Accommodates - <?php echo $propertyInfoDetails->accommodates; ?></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-check-circle"></i> Private Balcony</td>
                                <td><i class="fa fa-check-circle"></i> Flat Screen TV</td>
                                <td><i class="fa fa-check-circle"></i> Jacuzzi</td>
                            </tr>
                            </tbody>
                        </table>
                        <p class="mt50">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ligula nibh, cursus id euismod non, scelerisque nec nibh. Nam semper, ligula a rhoncus fermentum, libero lacus vulputate felis, id auctor mauris urna quis diam.</p>
                    </div>
                    <div class="col-sm-5 mt50">
                        <h2 class="lined-heading"><span>Location</span></h2>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
                            <li><a href="#facilities" data-toggle="tab">Address</a></li>
                            <li><a href="#extra" data-toggle="tab">Direction</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="overview">
                               <p><h3><?php echo $propertyDetails->propertyName ?></h3></p>
                                <p><?php echo $propertyDetails->description ?></p>
                            </div>
                            <div class="tab-pane fade" id="facilities"><?php echo $propertyDetails->propertyAddress ?></div>
                            <div class="tab-pane fade" id="extra"><?php echo $propertyDetails->Direction ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- Footer -->
<?php include('includes/footer.php'); ?>

<!-- Go-top Button -->
<div id="go-top"><i class="fa fa-angle-up fa-2x"></i></div>
</body>
</html>