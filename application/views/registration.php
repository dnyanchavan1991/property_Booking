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
            <form class="form-inline reservation-horizontal clearfix" role="form" method="post" action="<?php echo base_url()?>/index.php/RoomAvailability/checkRoomAvailabilty" name="reservationform" id="reservationform">
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
                    <li> <a href="#">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
        <div style="padding:10px">
        <div class="row">
            <div class="col-md-6 col-md-push-3" style="text-align: center">
                <h2 class="tittle-one">REGISTRATION</h2>
                <?php if($this->session->flashdata('registration_check')){ ?>
                    <div class="alert alert-danger text-center" ng-show="has_error">
                        <h5><?php echo $this->session->flashdata('registration_check'); ?></h5>
                    </div>
                <?php } ?>
                    <form method="post" action="<?php echo  base_url()?>index.php/Index1/RegistrationAction">
                        <div class="form-group" >
                            <input type="text" class="form-control" ng-model="formModel.username"ng-pattern="/^[A-Za-z0-9_]{1,32}$/"
                                   ng-minlength="5"  id="username" name="username" placeholder="User Name" required="required" >
                        </div >
                        <div class="form-group" >

                            <input type="password" class="form-control"   ng-model="formModel.password"  id="password" placeholder="Password"
                                   required="required" name="password" ng-minlength="5">
                        </div >
                        <div class="form-group" >
                            <input type="text" class="form-control" ng-model="formModel.fname"  name="fname" id="name" placeholder="First Name"  required="required" >
                        </div >
                        <div class="form-group" >

                            <input type="text"  class="form-control" ng-model="formModel.lname" name="lname" id="lname" placeholder="Last Name"  required="required" >
                        </div >
                        <div class="form-group" >
                            <select name="gender" class="form-control">
                                <option value="1">Male</option>
                                <option value="0">Female</option>
                            </select>
                        </div >
                        <div class="form-group">
                            <input name="dob" type="text" id="dob" value="" class="form-control" placeholder="DOB"/>
                        </div >
                        <div class="form-group">
                        <input type="text"
                                   class="form-control"
                                   ng-model="formModel.phone"
                                   id="phone" name="phone" placeholder="Mobile Number"
                                   required="required" >
                        </div >
                        <div class="form-group">

                            <input type="email"
                                   class="form-control"
                                   ng-model="formModel.email"
                                   id="email" name="email" placeholder="Email"
                                   required="required" >
                        </div >

                        <div class="form-group">

									<textarea type="text"
                                              class="form-control"
                                              ng-model="formModel.address"
                                              id="address" name="address" placeholder="Address.."
                                              required="required" ></textarea>
                        </div >



                        <div class="form-group">
                            <button class="btn btn-primary"
                                    type="submit" style="width:60% ">
                                <span ng-show="!submitting">Register</span>
                            </button>
                        </div>
                        <div class="row">
                            <a href="<?php echo  base_url()?>index.php/Index1/Login">Already have an account? Login!</a>
                        </div>
                    </form >

                </div>

            <div class="clearfix"></div>
        </div>

</div>
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