<?php
//print_r($propertyDetails);
//echo $propertyDetails->propertyName;
//print_r($propertyInfoDetails);
//echo $propertyInfoDetails->meals;
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Starhotel - SHARED ON THEMELOCK.COM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/prettyPhoto.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/smoothness/jquery-ui-1.10.4.custom.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/theme.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/colors/turquoise.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/responsive.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600,700">

    <!-- Javascripts -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.nicescroll.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui-1.10.4.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.jigowatt.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/waypoints.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.gmap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.sticky.js"></script>
    <!--	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>-->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/custom.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgN3bxU8ANT6CpiuyCu__jyuWZ3sXcrF4&libraries=places"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

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
            <div class="col-xs-6">
                <div class="th-text pull-right">
                    <div class="th-item">
                        <div class="social-icons"> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-google-plus"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-youtube-play"></i></a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Header -->
<header>
    <!-- Navigation -->
    <div class="navbar yamm navbar-default" id="sticky">
        <div class="container">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a href="<?php echo base_url() ?>" class="navbar-brand">
                    <!-- Logo -->
                    <div id="logo"> <img id="default-logo" src="<?php echo base_url() ?>assets/images/logo.png" alt="Starhotel" style="height:44px;"> <img id="retina-logo" src="images/logo-retina.png" alt="Starhotel" style="height:44px;"> </div>
                </a> </div>
            <div id="navbar-collapse-grid" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown active"> <a href="<?php echo base_url() ?>">Home</a>
                    </li>
                    <li> <a href="#">Featured</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Quick Search
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Maharashtra</a></li>
                            <li><a href="#">Goa</a></li>
                        </ul>
                    </li>
                    <li> <a href="#">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
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
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <h4>About Us</h4>
                <p>Suspendisse erat mi, tincidunt sit amet massa quis, commodo fermentum diam. Sed nec dui nec nunc tempor interdum.<br>
                    <br>
                    Ut vulputate augue urna, ut porta dolor imperdiet a. Vestibulum nec leo eu magna aliquam ornare.</p>
            </div>

            <div class="col-md-3 col-sm-3">
                <h4>FACILITIES</h4>
                <p> Quick Property Search</p>
                <p>Online Payment</p>
                <p>Reviews</p>
                <p> Google Map</p>
            </div>
            <div class="col-md-3 col-sm-3">
                <h4>Address</h4>
                <address>
                    <strong></strong><br>
                    <br>
                    <br>
                    <abbr title="Phone">Phone:</abbr> <a href="#"></a><br>
                    <abbr title="Email">Email:</abbr> <a href="#"></a><br>
                    <abbr title="Website">Web:</abbr> <a href="http://www.trueholidays.co.in" target="_blank">www.trueholidays.co.in</a><br>
                </address>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">  Design and Developed By <a href="http://www.operandtechnologies.com" target="_blank">Operand Technologies</a> & IT Solutions LLP. </div>
                <div class="col-xs-6 text-right">
                    <ul>
                        <li>
                            <a href="http://facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/login" target="_blank"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="https://accounts.google.com/Login" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Go-top Button -->
<div id="go-top"><i class="fa fa-angle-up fa-2x"></i></div>
</body>
</html>