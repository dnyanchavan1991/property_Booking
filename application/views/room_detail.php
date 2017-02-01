<?php
 /*include("db.php");*/
// $con=mysqli_connect("localhost","root","","agileso1_propertybook");
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
          <li class="dropdown active"> <a href="index.html">Home</a>
          </li>
          <li> <a href="gallery.html">Featured</a></li>
          <li> <a href="gallery.html">Quick Search</a></li>
          <li> <a href="#">Login</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>

<!-- Revolution Slider -->
<section class="revolution-slider">
  <div class="bannercontainer">
    <div class="banner">
      <ul>
        <!-- Slide 1 -->
        <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" > 
          <!-- Main Image --> 
          <img src="css/css/images/slides/3.jpg" style="opacity:0;" alt="image not found"  data-bgfit="cover" data-bgposition="left bottom" data-bgrepeat="no-repeat"> 
          <!-- Layers -->           
          <!-- Layer 1 -->
          <div class="caption sft revolution-starhotel bigtext"  
          				data-x="505" 
                        data-y="30" 
                        data-speed="700" 
                        data-start="1700" 
                        data-easing="easeOutBack"> 
						<span><i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i></span> A Five Star Hotel <span><i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i></span></div>
          <!-- Layer 2 -->
          <div class="caption sft revolution-starhotel smalltext"  
          				data-x="605" 
                        data-y="105" 
                        data-speed="800" 
                        data-start="1700" 
                        data-easing="easeOutBack">
						<span>And we like to keep it that way!</span></div>
        <!-- Layer 3 -->
                  <!-- <div class="caption sft"  
          				data-x="775" 
                        data-y="175" 
                        data-speed="1000" 
                        data-start="1900" 
                        data-easing="easeOutBack">
						<a href="room-list.html" class="button btn btn-purple btn-lg">See rooms</a> 
                  </div> -->
        </li>
		<!-- Slide 2 -->
        <li data-transition="boxfade" data-slotamount="7" data-masterspeed="1000" > 
          <!-- Main Image --> 
          <img src="css/css/images/slides/2.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat"> 
          <!-- Layers -->           
          <!-- Layer 1 -->
          <div class="caption sft revolution-starhotel bigtext"  
          				data-x="585" 
                        data-y="30" 
                        data-speed="700" 
                        data-start="1700" 
                        data-easing="easeOutBack"> 
						<span><i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i></span> Double room <span><i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i></span></div>
          <!-- Layer 2 -->
          <div class="caption sft revolution-starhotel smalltext"  
          				data-x="682" 
                        data-y="105" 
                        data-speed="800" 
                        data-start="1700" 
                        data-easing="easeOutBack">
						<span>a night this summer</span></div>
        <!-- Layer 3 -->
                  <div class="caption sft"  
          				data-x="785" 
                        data-y="175" 
                        data-speed="1000" 
                        data-start="1900" 
                        data-easing="easeOutBack">
						<a href="room-detail.html" class="button btn btn-purple btn-lg">Book this room</a> 
                  </div>
        </li>
      </ul>
    </div>
  </div>
</section>
<!-- Reservation form -->
<br><br><br>
<div class="container-fluid" >
<header>

 <div class="navbar yamm navbar-default container-fluid" id="sticky"  style="box-shadow: 0px 2px 10px 1px ;">
 <div class="container">
      <div class="navbar-header"><br>
       <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid1" class="navbar-toggle"> 
       <span class="fa fa-search"></span></button>
     
<section id="navbar-collapse-grid1"   class="navbar-collapse collapse">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12" >           
        <form class="form-inline reservation-horizontal clearfix" role="form" method="post" action="php/reservation.php" name="reservationform" id="reservationform" >
        <div id="message"></div><!-- Error message display -->
          <div class="row" >
            <div class="col-sm-2">
              <div class="form-group" >
                <label for="email" accesskey="E" id="hidelocation">Location</label>
                <input name="location" type="text" id="email" value="" class="form-control" placeholder="Enter Your Location"/>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="room" id="hideproperty">Property Type</label>
                  <?php 
                 echo"<select class='form-control' name='room' id='room'>
                  <option selected='selected'>Property types</option>";

                 echo $query="select * from property_type";
                  $res=mysqli_query($con,$query); 
                  while($row=mysqli_fetch_row($res))
                  {
                    
                    echo"<option value=".$row[0].">".$row[1]."</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="checkin" id="hidecheckin" style="color:white">Check-in</label>
                <div class="popover-icon" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Check-In is from 11:00"> </div>
                <input name="checkin" type="text" id="checkin" value="" class="form-control" placeholder="Check-in"/>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="checkout" id="hidecheckout">Check-out</label>
                <div class="popover-icon" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Check-out is from 12:00">  </div>
                <input name="checkout" type="text" id="checkout" value="" class="form-control" placeholder="Check-out"/>
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <div class="guests-select">
                  <label id="hideguest">Guests</label>
                 
                 
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
             <label style="color:white;" id="Search">Guests</label>
              <button type="submit" class="btn btn-primary btn-block" >Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<br>
</div>
</div>
</div>
</header>
</div>
<!-- Gallery -->




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