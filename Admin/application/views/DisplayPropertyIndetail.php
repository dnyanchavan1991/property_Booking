<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin | Display Property</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/sb-admin.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body ng-app="propertyIndetail" >

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../Admin">Property Booking Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="../Logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="../Admin"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Property <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="../AddProperty">Add</a>
                            </li>
                            <li>
                                <a href="../DisplayProperty">Display</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid" ng-controller="displayDetails">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Property Details
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../Admin">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-wrench"></i> Property Details
                            </li>
							<li class="active">
                                <i class="fa fa-edit"></i> <a href="../UpdateProperty/index/{{list.property_id}}">Edit</a>
                            </li>
                        </ol>
                    </div>
                </div>
				
                <div class="row">
					<div class="col-lg-12">
						<div class="col-md-6 image-container" id="mainImgContainer">
							<img id="mainImg" ng-src="../{{list.main_img_path}}" class="img-responsive img-rounded" 
							title="main image">
						</div>
						<div class="col-md-6" id="mainRight">
							<h3 class="page-header">
								{{list.property_name}}
							</h3>
							<center class="breadcrumb"><strong>--- Property Info ---</strong></center>
							<div class="row">
								<div class="col-xs-7">
									<label class="control-label" for="PropertyName">Property Type</label>
								</div>
								<div class="col-xs-5">
									{{list.property_type}}
								</div>
							</div>
							
							<div class="row">
								<label class="control-label col-md-3" for="PropertyName">Street</label>
								<div class="col-md-9">
									{{list.street}}
								</div>
							</div>
							
							<div class="row">
								<label class="control-label col-md-3" for="PropertyName">City</label>
								<div class="col-md-9">
									{{list.city}}
								</div>
							</div>
							<div class="row">
								<label class="control-label col-md-3" for="PropertyName">State</label>
								<div class="col-md-9">
									{{list.state}}
								</div>
							</div>
							<div class="row">
								<label class="control-label col-md-3" for="PropertyName">PIN Code</label>
								<div class="col-md-9">
									{{list.postal_code}}
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<br>
				<div class="example1">
							
					<div class="panel panel-default">
						<div class="panel-heading" data-acc-link="demo1"><i class="glyphicon glyphicon-list"></i> Features & Facilities</div>
						<div class="panel-body acc-open" data-acc-content="demo1">
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Star Rate</label>
										<div class="col-md-9">
											{{list.star_rate}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Map Location</label>
										<div class="col-md-9">
											<div class="col-md-9" id="map_canvas" style="width:100%;height:270px;"></div>
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Description</label>
										<div class="col-md-9" ng-bind-html="list.description">
											
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">How To Reach</label>
										<div class="col-md-9" ng-bind-html="list.how_to_reach">
											
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Bedrooms</label>
										<div class="col-md-9">
											{{list.bedrooms}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Beds</label>
										<div class="col-md-9">
											{{list.beds}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Bathrooms</label>
										<div class="col-md-9">
											{{list.bathrooms}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Accommodates</label>
										<div class="col-md-9">
											{{list.accommodates}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Pool</label>
										<div class="col-md-9">
											{{list.pool}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Internet / WIFI</label>
										<div class="col-md-9">
											{{list.internet_access}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Smoking Allowed</label>
										<div class="col-md-9">
											{{list.smoking_allowd}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Cable TV</label>
										<div class="col-md-9">
											{{list.television_access}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Pet friendly</label>
										<div class="col-md-9">
											{{list.pet_friendly}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Air Conditioning</label>
										<div class="col-md-9">
											{{list.air_condition}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Payment Facility</label>
										<div class="col-md-9">
											{{list.payment_facility}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">In House Kitchen</label>
										<div class="col-md-9">
											{{list.in_house_kitchen}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Restaurant</label>
										<div class="col-md-9">
											{{list.restaurant}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Free Parking</label>
										<div class="col-md-9">
											{{list.free_parking}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">First Aid Available</label>
										<div class="col-md-9">
											{{list.first_aid_available}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Meals</label>
										<div class="col-md-9">
											{{list.meals}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Entertainment</label>
										<div class="col-md-9">
											{{list.entertainment}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Other Amenities</label>
										<div class="col-md-9">
											{{list.other_amenities}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Theme</label>
										<div class="col-md-9">
											{{list.theme}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Attractions</label>
										<div class="col-md-9">
											{{list.attractions}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Leisure Activities</label>
										<div class="col-md-9">
											{{list.leisureActivities}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">General</label>
										<div class="col-md-9">
											{{list.general}}
										</div>&nbsp;
								</div>
							</div>
							
						</div>
					</div>
				
					<div class="panel panel-default">
						<div class="panel-heading" data-acc-link="demo2">
							<h3 class="panel-title"><i class="glyphicon glyphicon-camera"></i> Uploaded Images</h3>
						</div>
						<div class="panel-body" data-acc-content="demo2">
							<div class="col-xs-6" ng-repeat="x in list.images">
								<img id="subImg" ng-src="../{{x}}" class="img-responsive img-rounded" 
								title="sub image" >&nbsp;
							</div>
						</div>
					</div>
                    
					<div class="panel panel-default">
						<div class="panel-heading" data-acc-link="demo3">
							<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i> Property Owner Info</h3>
						</div>
						<div class="panel-body" data-acc-content="demo3">	
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Name</label>
										<div class="col-md-9">
											{{list.owner_name}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Email ID</label>
										<div class="col-md-9">
											{{list.email}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Address</label>
										<div class="col-md-9" ng-bind-html="list.address">
											
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Registration Date</label>
										<div class="col-md-9">
											{{list.registred_date}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Tel/Mobile No.</label>
										<div class="col-md-9">
											{{list.phone}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Alternative Tel/Mobile No.</label>
										<div class="col-md-9">
											{{list.alternative_phone}}
										</div>&nbsp;
								</div>
							</div>
						</div>
					</div>
				
				
				<!--<div class="page-header" style="border:1px solid black;height:300px;margin-top:10%;">
					jhyj
				</div>-->
				</div>
            <!-- /.container-fluid -->

			</div>
        <!-- /#page-wrapper -->

		</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/angular.min.js"></script>
    <script src="../assets/js/angular-sanitize.min.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script type="text/javascript" src="../assets/js/jquery.accordion.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	var app = angular.module('propertyIndetail', ['ngSanitize']);
	//'Authentication','Modal','ngRoute','ngSanitize'
	app.controller('displayDetails', function($scope, $http){
	 	$http({
			method: 'GET',
			url:'singleProperty'
		}).success(function (response){
			$scope.list = response;
			/* - map - */
			var map;
			var myLatlng = new google.maps.LatLng($scope.list.latitude,$scope.list.longitude);
			var myOptions = {
								zoom: 15,
								center: myLatlng,
								mapTypeId: google.maps.MapTypeId.ROADMAP
							};
			map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); 
			var marker = new google.maps.Marker({
				draggable: true,
				position: myLatlng,
				map: map,
				title: "Property location"
			});
			/* - map end - */
		});
	});
	
	$(function() {
		$('.example1').accordion({ 
			multiOpen: false
		});
	});
	</script>
</body>

</html>
