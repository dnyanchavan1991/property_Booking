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
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body ng-app="propertyIndetail">

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
                <a class="navbar-brand" href="<?php echo base_url() ?>Admin">Property Booking Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?php echo base_url() ?>Admin"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <!--<li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                    </li>
                    <li class="active">
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                    </li>-->
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Property <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="<?php echo base_url() ?>AddProperty">Add</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>DisplayProperty">Display</a>
                            </li>
                        </ul>
                    </li>
                    <!--<li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li>-->
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
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>Admin">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-wrench"></i> Property Details
                            </li>
                        </ol>
                    </div>
                </div>
				
                <div class="row">
					<div class="col-lg-12">
						<div class="col-md-6 image-container" id="mainImgContainer">
							<img id="mainImg" ng-src="<?php echo base_url() ?>{{list.main_img_path}}" class="img-responsive img-rounded" 
							title="main image">
						</div>
						<div class="col-md-6" id="mainRight">
							<h3 class="page-header">
								{{list.property_name}}
							</h3>
							<center class="breadcrumb"><strong>--- Property Info ---</strong></center>
							<div class="row">
								<label class="control-label col-md-3" for="PropertyName">Property Type</label>
								<div class="col-md-9">
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
							<!--<div class="row">
								<label class="control-label col-md-3" for="PropertyName">Tel/Mobile No.</label>
								<div class="col-md-9">
									{{list.Phone}}
								</div>
							</div>-->
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
											{{list.location_map}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Description</label>
										<div class="col-md-9">
											{{list.description}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">How To Reach</label>
										<div class="col-md-9">
											{{list.how_to_reach}}
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
									<label class="control-label col-md-3" for="PropertyName">Bathrooms</label>
										<div class="col-md-9">
											{{list.bathrooms}}
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
									<label class="control-label col-md-3" for="PropertyName">Meals</label>
										<div class="col-md-9">
											{{list.meals}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">EntertainMent</label>
										<div class="col-md-9">
											{{list.entertainment}}
										</div>&nbsp;
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">OtherAmenities</label>
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
							
							<div class="row">
								<div class="col-lg-12">
									<label class="control-label col-md-3" for="PropertyName">Payment Facility</label>
										<div class="col-md-9">
											{{list.payment_facility}}
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
							<div class="col-md-6" ng-repeat="x in list.images">
								<img id="subImg" ng-src="<?php echo base_url() ?>{{x}}" class="img-responsive img-rounded" 
								title="sub image" height="150" width="250">&nbsp;
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
										<div class="col-md-9">
											{{list.address}}
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
    <script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url() ?>assets/js/angular.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.accordion.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	var app = angular.module('propertyIndetail', []);
	
	app.controller('displayDetails', function($scope, $http){
	 	$http({
			method: 'GET',
			url:'singleProperty'
		}).success(function (response){
			$scope.list = response;
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
