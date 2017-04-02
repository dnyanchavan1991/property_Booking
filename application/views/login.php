<!DOCTYPE HTML>
<html>
<head>
    <?php include('includes/head.php') ?>
<body>

<!-- Top header -->
<div id="top-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <div class="th-text pull-left">
                    <div class="th-item"> <a href="#"><i class="fa fa-phone"></i> 05-460789986</a> </div>
                    <div class="th-item"> <a href="#"><i class="fa fa-envelope"></i> MAIL@STARHOTEL.COM </a></div>
                </div>
            </div>
            <!--<div class="col-xs-6">
                <div class="th-text pull-right">
                    <div class="th-item">
                        <div class="social-icons"> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-google-plus"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-youtube-play"></i></a> </div>
                    </div>
                </div>
            </div>-->
            <div class="col-xs-6 visible-xs">
                <div class="" style="float:right;font-size:20px">
                    <div class="social-icons"> <a href="#" class="do"><i class="fa fa-search" style="font-size:28px;padding-right:10px;padding-bottom:10px"></i></a> </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="search-popup" style="display:none;padding:10px;">
    <div class="row" style="z-index:2000">
        <div class="col-md-12">
            <form class="form-inline reservation-horizontal clearfix" role="form" method="post" action="<?php echo base_url()?>index.php/RoomAvailability/checkRoomAvailabilty" name="reservationform" id="reservationform">
                <div id="message"></div><!-- Error message display -->
                <div class="row tp">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="email" accesskey="E">Location</label>
                            <input name="location" type="text" id="location-mobile" value="" class="form-control location-mobile" placeholder="Please enter your Location"/>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="room">Property Type</label>

                            <select class="form-control" name="propertyType" id="room">
                                <option selected="selected" disabled="disabled">Property types</option>
                                <?php
                                foreach($propertyTypes as $propertyType){
                                    echo'<option value='.$propertyType->property_type_id.'>'.$propertyType->property_type_name.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="checkin">Check-in</label>
                            <div class="popover-icon" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Check-In is from 11:00"> <i class="fa fa-info-circle fa-lg"> </i> </div>
                            <i class="fa fa-calendar infield"></i>
                            <input name="checkIn" type="text" <!--id="checkin"--> value="" class="form-control" placeholder="Check-in"/>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="checkout">Check-out</label>
                            <div class="popover-icon" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Check-out is from 12:00"> <i class="fa fa-info-circle fa-lg"> </i> </div>
                            <i class="fa fa-calendar infield"></i>
                            <input name="checkOut" type="text" <!--id="checkout"--> value="" class="form-control" placeholder="Check-out"/>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <div class="guests-select">
                                <label>Guests</label>


                                <select class="form-control" name="guestCount" id="room">
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
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Header -->
<header>
    <!-- Navigation -->
    <div class="navbar yamm navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a href="<?php echo base_url() ?>" class="navbar-brand">
                    <!-- Logo -->
                    <div id="logo"> <img id="default-logo" src="<?php echo base_url() ?>assets/images/F3.jpg" alt="Starhotel" style="height:44px;"> <img id="retina-logo" src="images/logo-retina.png" alt="Starhotel" style="height:44px;"> </div>
                </a> </div>
            <div id="navbar-collapse-grid" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown active"> <a href="<?php echo base_url() ?>">Home</a>
                    </li>
                    <li> <a href="<?php echo base_url()?>index.php/Search/FeaturedSearch">Featured</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Quick Search
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url()?>index.php/Search/QuickSearch/Maharashtra">Maharashtra</a></li>
                            <li><a href="<?php echo  base_url()?>index.php/Search/QuickSearch/Pradesh">Goa</a></li>
                        </ul>
                    </li>
                    <li>
                    <?php if($offer_count){ ?>
                        <div  class="col-sm-hidden" style="background-color: red;width:25px;height:25px;position:absolute;left:55px;top:12px;border-radius: 50%">
                            <p style="padding-top:4px;text-align:center;color:#fff"><?php echo $offer_count;?></p>
                        </div>
                    <?php } ?>
                    <a href="<?php echo base_url()?>index.php/Offers/offerMenuLink">Offers</a></li>
                    <li> <a href="<?php echo  base_url()?>index.php/Index1/Login">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- Revolution Slider -->

<!-- USP's -->
<!--<section class="usp mt100">-->
<!--    <div class="container">-->
<!--        <div class="row" style="border:1px solid red">-->
<!---->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4 col-md-push-4">
                <div class="form-wrap">
                    <h1>Login</h1>
                    <form role="form" method="post" action="<?php echo  base_url()?>index.php/Index1/LoginCheck" id="login-form" autocomplete="off">
                        <?php if($this->session->flashdata('login_check')){ ?>
                            <div class="alert alert-danger text-center" ng-show="has_error">
                                <h5><?php echo $this->session->flashdata('login_check'); ?></h5>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password" required>
                        </div>

                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in" style="background-color:#75c5cf;border-color:#35929e ">
                    </form>
                    <div style="text-align: center"><a href="<?php echo  base_url()?>index.php/Index1/Registration" >Don't have an account? Sign Up!</a></div>
                    <hr>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
<!-- Parallax Effect -->

<!-- Gallery -->


<!-- Footer -->
<?php include('includes/footer.php'); ?>

<!-- Go-top Button -->
<div id="go-top"><i class="fa fa-angle-up fa-2x"></i></div>
<script>

</script>
</body>
</html>