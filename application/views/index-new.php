<?php
 include("db.php");
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
</head>
<style type="text/css">
	#email:hover,#room:hover,#checkin:hover,#checkout:hover
	{
		/*border: 2px solid;*/
		box-shadow: 0px 0px 5px 1px #DCDCDC;
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
                <label for="email" accesskey="E">Location</label>
                <input name="location" type="text" id="email" value="" class="form-control" placeholder="Enter Your Location"/>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="room">Property Type</label>
              

               
                  <?php 
                  $con=@mysql_connect("localhost","root","")or die("Server Not Found");
                  mysql_select_db("agileso1_propertybook",$con)or die("Database Not Found");

                 echo"<select class='form-control' name='room' id='room'>
                  <option selected='selected'>Property types</option>";

                 echo $query="select * from property_type";
                  $res=mysql_query($query); 
                  while($row=mysql_fetch_row($res))
                  {
                    
                    echo"<option value=".$row[0].">".$row[1]."</option>";
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
<div class="container">
<section class="gallery-slider mt100">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="lined-heading"><span>Featured Property</span></h2>
      </div>
    </div>
  </div>
  <div id="owl-gallery" class="owl-carousel" style="box-shadow: 0px 0px 3px 2px #494949;"> 
  <?php 
 $con=@mysql_connect("localhost","root","")or die("Server Not Found");
                  mysql_select_db("agileso1_propertybook",$con)or die("Database Not Found");
  $query1="SELECT property.property_id, property.image_path, property.property_name, property.description FROM property INNER JOIN property_Info ON property.property_id=property_Info.property_id where property.activation_flag='YES' AND 
  property_Info.Featured='yes' and property_info.Featured_startDate <= 2017-1-28 AND property_info.Featured_endDate >= 2017-01-28 order by property_info.Featured_startDate Desc";
  $res1=mysql_query($query1);
  while($row1=mysql_fetch_row($res1))
  {

      echo'
      <div class="item" >
      <div class="col-sm-12 col-md-12 col-lg-6 " >
        <div class="room-thumb"> <img src="Admin/'.$row1[1].'mainImage.jpg" alt="room 3" class="img-responsive" data-rel="prettyPhoto[gallery2]"/>
            <div class="mask">
              <div class="main" style="background: #494949;">
                <h5 style="color:#fff;">'.$row1[2].'</h5>
                <!--<div class="price">&euro; 120<span>a night</span></div>-->
              </div>
              <div class="content">
                <p><span>'.$row1[3].'</p>
                <div class="row">
                  <div class="col-sm-12 col-md-6 col-lg-6">
                    <ul class="list-unstyled">
                      <li><i class="fa fa-check-circle"></i> Incl. breakfast</li>
                      <li><i class="fa fa-check-circle"></i> Private balcony</li>
                      <li><i class="fa fa-check-circle"></i> Sea view</li>
                    </ul>
                  </div>
                  <div class=" col-sm-12 col-md-6 col-lg-6">
                    <ul class="list-unstyled">
                      <li><i class="fa fa-check-circle"></i> Free Wi-Fi</li>
                      <li><i class="fa fa-check-circle"></i> Incl. breakfast</li>
                      <li><i class="fa fa-check-circle"></i> Bathroom</li>
                    </ul>
                  </div>
                </div>
                <a href="room-detail.html" class="btn btn-primary btn-sm btn-block">Read More</a>
              </div>
            </div>
          </div>
        </div>
    </div>';
  }

?>
  </div>
</section>
</div>

<!-- USPs -->
<section class="usp mt100">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="lined-heading"><span>Our Services</span></h2>
      </div>
      <div class="col-sm-3 bounceIn appear" data-start="0">
      <div class="box-icon">
        <div class="circle"><i class="fa fa-glass fa-lg"></i></div>
        <h3>Quick Property Search</h3>
        <p>Provide your travel destination, tentative travel dates and total travelers...sit back.... and choose from our best deals for you. </p>
         </div>
        </div>
      <div class="col-sm-3 bounceIn appear" data-start="400">
      <div class="box-icon">
        <div class="circle"><i class="fa fa-credit-card fa-lg"></i></div>
        <h3>Notification</h3>
        <p>On every property enquiry and booking, we keep both Customer and Property owner informed with real time SMS feature. An Email is always accompanied by the SMS </p>
        </div>
        </div>
      <div class="col-sm-3 bounceIn appear" data-start="800">
      <div class="box-icon">      
        <div class="circle"><i class="fa fa-cutlery fa-lg"></i></div>
            <h3>Secured Payment</h3>
            <p>We are 100% secure when it is related to payment. We have tied up with the best payment gateway, payUMoney.com </p>
         </div>
        </div>
      <div class="col-sm-3 bounceIn appear" data-start="1200">
      <div class="box-icon">
        <div class="circle"><i class="fa fa-tint fa-lg"></i></div>
        <h3>Reviews</h3>
        <p>We trust on "Self Experience is the Best Experience".. 
Visit properties and provide your reviews to help future travelers book their properties conveniently.</p>
         </div>
    </div>
    </div>
  </div>
</section>

<!-- Parallax Effect -->



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