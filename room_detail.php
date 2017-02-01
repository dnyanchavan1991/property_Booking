<?php
 /*include("db.php");*/
 $con=mysqli_connect("localhost","root","","agileso1_propertybook");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>True Holidays</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="shortcut icon" href="favicon.ico">

<!-- Stylesheets -->
<link rel="stylesheet" href="css/css/css/animate.css">
<link rel="stylesheet" href="css/css/css/bootstrap.css">
<link rel="stylesheet" href="css/css/css/font-awesome.min.css">
<link rel="stylesheet" href="css/css/css/owl.carousel.css">
<link rel="stylesheet" href="css/css/css/owl.theme.css">
<link rel="stylesheet" href="css/css/css/prettyPhoto.css">
<link rel="stylesheet" href="css/css/css/smoothness/jquery-ui-1.10.4.custom.min.css">
<link rel="stylesheet" href="css/css/rs-plugin/css/settings.css">
<link rel="stylesheet" href="css/css/css/theme.css">
<link rel="stylesheet" href="css/css/css/colors/turquoise.css">
<link rel="stylesheet" href="css/css/css/responsive.css">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600,700">

<!-- Javascripts --> 
<script type="text/javascript" src="css/css/js/jquery-1.11.0.min.js"></script> 
<script type="text/javascript" src="css/css/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="css/css/js/bootstrap-hover-dropdown.min.js"></script> 
<script type="text/javascript" src="css/css/js/owl.carousel.min.js"></script> 
<script type="text/javascript" src="css/css/js/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="css/css/js/jquery.nicescroll.js"></script>  
<script type="text/javascript" src="css/css/js/jquery.prettyPhoto.js"></script> 
<script type="text/javascript" src="css/css/js/jquery-ui-1.10.4.custom.min.js"></script> 
<script type="text/javascript" src="css/css/js/jquery.jigowatt.js"></script> 
<script type="text/javascript" src="css/css/js/jquery.sticky.js"></script> 
<script type="text/javascript" src="css/css/js/waypoints.min.js"></script> 
<script type="text/javascript" src="css/css/js/jquery.isotope.min.js"></script> 
<script type="text/javascript" src="css/css/js/jquery.gmap.min.js"></script> 
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="css/css/rs-plugin/js/jquery.themepunch.plugins.min.js"></script> 
<script type="text/javascript" src="css/css/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<script type="text/javascript" src="css/css/js/custom.js"></script> 
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
      function testScroll(ev)
      {
    if(window.pageYOffset>640)
    {
      $("#hidelocation").css( "color", "white" );
      $("#hideproperty").css( "color", "white" );
      $("#hidecheckin").css( "color", "white" );
     
      $("#hidecheckout").css( "color", "white" );
     
      $("#hideguest").css( "color", "white" );
      $("#Search").css( "color", "white" );
    }
    else
    {
        $("#hidelocation").css( "color", "black" );
      $("#hideproperty").css( "color", "black" );
      $("#hidecheckin").css( "color", "black" );
      $("#hidech").css( "color", "black" );
      $("#hidech1").css( "color", "black" );
      $("#hidecheckout").css( "color", "black" );
      $("#hideout").css( "color", "black" );
      $("#hideout1").css( "color", "black" );
      $("#hideguest").css( "color", "black" );
      $("#Search").css( "color", "black" );
    }
}
window.onscroll=testScroll
    </script>
</head>
<style type="text/css">
	#email:hover,#room:hover,#checkin:hover,#checkout:hover
	{
		/*border: 2px solid;*/
		box-shadow: 0px 0px 5px 1px #000;
		color: #000;
	}
  /*.fix
  {
    position: fixed; top: 20px; left: 20px;
  }*/
  /*body{
     flex-grow: 1;
    overflow: auto;
  }*/
</style>
<body>

<!-- Top header -->
<div id="top-header">
  <div class="container">
    <div class="row">
      <div class="col-xs-6">
        <div class="th-text pull-left">
          <div class="th-item"> <a href="#"><i class="fa fa-phone"></i> </a> </div>
          <div class="th-item"> <a href="#"><i class="fa fa-envelope"></i>  </a></div>
        </div>
      </div>
      <div class="col-xs-6">
        <div class="th-text pull-right">
          <div class="th-item">
            <div class="social-icons"> <a href="http://facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
             <a href="https://twitter.com/login" target="_blank"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-youtube-play"></i></a> <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></div>
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
        <a href="index.html" class="navbar-brand">         
        <!-- Logo -->
        <div id="logo"> Logo</div>
        </a> </div>
      <div id="navbar-collapse-grid" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="dropdown active"> <a href="index.php">Home</a>
          </li>
          <li> <a href="gallery.html">Featured</a></li>
          <li> <a href="gallery.html">Quick Search</a></li>
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
          <div class="item"> <a href="css/css/images\holidays_img\4.jpg" data-rel="prettyPhoto[gallery1]"><img src="css/css/images\holidays_img\4.jpg" alt="Image 2" class="img-responsive"></a> </div>
          <div class="item"> <a href="css/css/images\holidays_img\3.jpg" data-rel="prettyPhoto[gallery1]"><img src="css/css/images\holidays_img\3.jpg" alt="Image 2" class="img-responsive"></a> </div>
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
                  <td><i class="fa fa-check-circle"></i> Double Bed</td>
                  <td><i class="fa fa-check-circle"></i> Free Internet</td>
                  <td><i class="fa fa-check-circle"></i> Free Newspaper</td>
                </tr>
                <tr>
                  <td><i class="fa fa-check-circle"></i> 60 square meter</td>
                  <td><i class="fa fa-check-circle"></i> Beach view</td>
                  <td><i class="fa fa-check-circle"></i> 2 persons</td>
                </tr>
                <tr>
                  <td><i class="fa fa-check-circle"></i> Double Bed</td>
                  <td><i class="fa fa-check-circle"></i> Free Internet</td>
                  <td><i class="fa fa-check-circle"></i> Breakfast included</td>
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
              <li><a href="#facilities" data-toggle="tab">Facilities</a></li>
              <li><a href="#extra" data-toggle="tab">Extra</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane fade in active" id="overview">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse interdum eleifend augue, quis rhoncus purus fermentum. In hendrerit risus arcu, in eleifend metus dapibus varius. Nulla dolor sapien, laoreet vel tincidunt non, egestas non justo. Phasellus et mattis lectus, et gravida urna.</p>
                <p><img src="images/tab/197x147.gif" alt="food" class="pull-right"> Donec pretium sem non tincidunt iaculis. Nunc at pharetra eros, a varius leo. Mauris id hendrerit justo. Mauris egestas magna vitae nisi ultricies semper. Nam vitae suscipit magna. Nam et felis nulla. Ut nec magna tortor. Nulla dolor sapien, laoreet vel tincidunt non, egestas non justo. </p>
              </div>
              <div class="tab-pane fade" id="facilities">Phasellus sodales justo felis, a vestibulum risus mattis vitae. Aliquam vitae varius elit, non facilisis massa. Vestibulum luctus diam mollis gravida bibendum. Aliquam mattis velit dolor, sit amet semper erat auctor vel. Integer auctor in dui ac vehicula. Integer fermentum nunc ut arcu feugiat, nec placerat nunc tincidunt. Pellentesque in massa eu augue placerat cursus sed quis magna.</div>
              <div class="tab-pane fade" id="extra">Aa vestibulum risus mattis vitae. Aliquam vitae varius elit, non facilisis massa. Vestibulum luctus diam mollis gravida bibendum. Aliquam mattis velit dolor, sit amet semper erat auctor vel. Integer auctor in dui ac vehicula. Integer fermentum nunc ut arcu feugiat, nec placerat nunc tincidunt. Pellentesque in massa eu augue placerat cursus sed quis magna.</div>
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