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
								<input name="location" type="text" id="location-mobile" value="" class="form-control location-mobile" placeholder="Where are you going?"/>
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
								<i class="fa fa-calendar infield"></i>
								<input name="checkIn" type="text"  value="" class="form-control" placeholder="Check-in"/>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<label for="checkout">Check-out</label>
								<i class="fa fa-calendar infield"></i>
								<input name="checkOut" type="text" value="" class="form-control" placeholder="Check-out"/>
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
							<button type="submit" class="btn btn-primary btn-block">Search</button>
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
					<div id="logo"> <img id="default-logo" src="images/F3.jpg" alt="Starhotel" style="height:44px;"> <img id="retina-logo" src="images/logo-retina.png" alt="Starhotel" style="height:44px;"> </div>
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
						<a href="<?php echo base_url()?>index.php/Offers/offerMenuLink">Offers</a>
					</li>
                    <?php if(isset($this->session->userdata()['user_id'])){ ?>
                        <li> <a href="<?php echo  base_url()?>index.php/Index1/Logout">Logout</a></li>
				    <?php }else{?>
                        <li> <a href="<?php echo  base_url()?>index.php/Index1/Login">Login</a></li>
                    <?php }?>
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
				<?php

                foreach($sliderImages as $sliderImage) {
					$img = str_replace(' ', '%20', $sliderImage->image_path);
						?>
<!--						--><?php //echo base_url().'images/slides'.$img.'mainImage.jpg' ?>
						<li data-transition="fade" data-slotamount="7" data-masterspeed="1500">
							<!-- Main Image -->
							<img src="<?php echo base_url().'Trueholidays/'.$img.'mainImage.jpg' ?>" style="" alt="image not found" data-bgfit="cover"
<!--								 data-bgposition="left bottom" data-bgrepeat="no-repeat">-->
							<!-- Layers -->
							<!-- Layer 1 -->
							<div class="caption sft revolution-starhotel bigtext"
								 data-x="505"
								 data-y="30"
								 data-speed="700"
								 data-start="1700"
								 data-easing="easeOutBack">
								<span><i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i
										class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i
										class="fa fa-star-o"></i> </span> <?php echo $sliderImage->property_name ?> <span> <i
										class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i
										class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i
										class="fa fa-star-o"></i></span></div>
							<!-- Layer 2 -->
							<div class="caption sft revolution-starhotel smalltext"
								 data-x="605"
								 data-y="105"
								 data-speed="800"
								 data-start="1700"
								 data-easing="easeOutBack">
								<span>And we like to keep it that way!</span></div>
							<!-- Layer 3 -->
							<div class="caption sft"
								 data-x="775"
								 data-y="175"
								 data-speed="1000"
								 data-start="1900"
								 data-easing="easeOutBack">
								<a href="<?php echo base_url('/index.php/Index1/PropertyDetails/'.$sliderImage->property_id.'') ?>" class="button btn btn-purple btn-lg">
									See rooms
								</a>
							</div>
						</li>
						<?php
					}
				?>

			</ul>
		</div>
	</div>
</section>

<!-- Reservation form -->
<section id="reservation-form">
<div id="sticky-anchor"></div>
	<div class="container hidden-xs" id="sticky">
		<div class="row">
			<div class="col-md-12">
				<form class="form-inline reservation-horizontal clearfix" role="form" method="post" action="<?php echo base_url()?>index.php/RoomAvailability/checkRoomAvailabilty" name="reservationform" id="reservationform">
					<div id="message"></div><!-- Error message display -->
					<div class="row tp">
						<div class="col-sm-3">
							<div class="form-group">
								<label for="email" accesskey="E">Location</label>
								<input name="location" type="text" id="location" value="" class="form-control location" placeholder="Please enter your Location" required="required"/>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<label for="room">Property Type</label>

								<select class="form-control" name="propertyType" id="room">
									<option selected="selected" disabled="disabled" value ="0">Property types</option>
									<?php
										foreach($propertyListTypes as $propertyListType){
										echo'<option value='.$propertyListType->propertyTypeId.'>'.$propertyListType->propertyTypeName.'</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<label for="checkin">Check-in</label>
								<i class="fa fa-calendar infield"></i>
								<input name="checkIn" type="text" id="checkin" value="" class="form-control" placeholder="Check-in" required="required" />
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<label for="checkout">Check-out</label>
								<i class="fa fa-calendar infield"></i>
								<input name="checkOut" type="text" id="checkout" value="" class="form-control" placeholder="Check-out" required="required"/>
							</div>
						</div>
						<div class="col-sm-1">
							<div class="form-group">
								<div class="guests-select">
									<label>Guests</label>


									<select class="form-control" name="room" id="room">
										<option selected="selected" value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="14">14</option>
										<option value="15">15+</option>

									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<button type="submit" class="btn btn-primary btn-block">Search</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<!-- Rooms -->
<div class="container">
	<section class="gallery-slider mt100">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="lined-heading"><span>Featured Properties</span></h2>
				</div>
			</div>
		</div>
		<div id="owl-gallery" class="owl-carousel index-gallery" style="box-shadow: 0px 0px 3px 2px #494949;">
			<?php
				foreach($propertyType as $propertyTypes){
			?>
			<div class="item">
				<div class="col-sm-12 col-md-12 col-lg-6 feature-main">
					<div class="room-thumb"><img src="<?php echo base_url().'Trueholidays/'.$propertyTypes->image_path.'mainImage.jpg' ?>" alt="room 3"
												 class="img-responsive" data-rel="prettyPhoto[gallery2]"/>
						<div class="mask">
							<div class="main" style="background: #494949;">
								<h5 style="color:#fff;"><?php echo $propertyTypes->property_name ?></h5>
								<!--<div class="price">&euro; 120<span>a night</span></div>-->
							</div>
							<div class="content">
								<p><span><?php substr($propertyTypes->description, 0, 150) ?></p>
								<div class="row">
									<div class="col-sm-12 col-md-6 col-lg-6">
										<ul class="list-unstyled">
											<li><i class="fa fa-check-circle"></i>Bedrooms - <?php echo $propertyTypes->bedrooms ?></li>
											<li><i class="fa fa-check-circle"></i>Free Wi-Fi - <?php echo $propertyTypes->internet_access ?></li>
											<li><i class="fa fa-check-circle"></i> AC - <?php echo $propertyTypes->air_condition ?> </li>
										</ul>
									</div>
									<div class=" col-sm-12 col-md-6 col-lg-6">
										<ul class="list-unstyled">
											<li><i class="fa fa-check-circle"></i>Pool - <?php echo $propertyTypes->pool ?></li>
											<li><i class="fa fa-check-circle"></i>Bathroom - <?php echo $propertyTypes->bathrooms ?></li>
										</ul>
									</div>
								</div>
								<a href="<?php echo base_url('/index.php/Index1/PropertyDetails/'.$propertyTypes->property_id.'') ?>" class="btn btn-primary btn-sm btn-block">Read
									More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
				}
			?>
		</div>
	</section>
</div>
<!-- USP's -->
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

<!-- Gallery -->


<!-- Footer -->
<?php include('includes/footer.php'); ?>

<!-- Go-top Button -->
<div id="go-top"><i class="fa fa-angle-up fa-2x"></i></div>
<script>

</script>
</body>
</html>