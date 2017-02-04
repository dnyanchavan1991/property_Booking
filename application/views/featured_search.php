<?php
//var_dump($data);
//echo $this->pagination->create_links();
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
                            <li><a href="<?php echo base_url()?>index.php/Index1/QuickSearch">Maharashtra</a></li>
                            <li><a href="<?php echo  base_url()?>index.php/Index1/QuickSearch">Goa</a></li>
                        </ul>
                    </li>
                    <li> <a href="#">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<section class="rooms mt100">
    <div class="container">
        <div class="row room-list fadeIn appear">
            <div class="row" style="width:100%">
                <div class="col-sm-12" style="border-bottom:2px solid lightgrey;margin-bottom:20px;width:100%">
                    <h3>Best Deals found : <?php echo $count ?> rentals</h3>
                </div>
                <?php if(empty($data)){
                    echo "<div class='col-sm-12'><h3>No Result Found</h3></div>";
                }
                ?>
                <!-- Room -->
                <?php foreach($data as $result){ ?>
                    <div class="col-sm-4">
                        <div class="room-thumb"> <img src="<?php echo base_url() ?>assets/images/holidays_img/5.jpg" alt="room 1" class="img-responsive" />
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