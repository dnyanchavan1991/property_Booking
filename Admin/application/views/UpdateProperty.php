<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin | Update Property</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../assets/css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
	<link href="../../assets/css/bootstrapValidator.css" type="text/css" rel="stylesheet"/>
    <!-- Custom CSS -->
    <link href="../../assets/css/sb-admin.css" type="text/css" rel="stylesheet"/>
    <link href="../../assets/css/style.css" type="text/css" rel="stylesheet"/>
	<link rel="stylesheet" href="../../assets/css/jquery-ui.min.css" />
	<link rel="stylesheet" href="../../assets/css/jquery-ui.theme.min.css" />
	<!--<link href="assets/css/accordian-style.css" type="text/css" rel="stylesheet"/>-->
    <!-- Custom Fonts -->
    <link href="../../assets/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body >

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
                <a class="navbar-brand" href="../../Admin">Property Booking Admin</a>
				 <a class="navbar-brand" href="../../../">View Site</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        <li>
                            <a href="../../Logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="../../Admin"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Property <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="../../AddProperty">Add</a>
                            </li>
                            <li>
                                <a href="../../DisplayProperty">Display</a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Update Property
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../../Admin">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Update Property
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				
                <div class="row" ng-app="add_property">
                    <div class="col-lg-6">
						<div class="row">
							<div class="col-lg-12">
								<center class="breadcrumb"><strong>--- Property Info ---</strong></center>
							</div>
						</div>
						<div ng-controller="add_property_ctrl">
                        <form data-toggle="validator" role="form" id="form_id" class="form-horizontal"
							method="post" action="../getUpdateData" 
							enctype="multipart/form-data" 
							data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
							data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
							data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                            <?php extract($data); ?>
							<div class="panel panel-default">
								<div class="panel-heading" ><i class="glyphicon glyphicon-ok-circle"></i> Mandatory</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-md-3" for="PropertyName">Type</label>
										<div class="col-md-7">
											<select name="property_type" id="property_type_id" class="form-control" required data-bv-notempty-message="Please select the property type">
												<option value=""> Select Property Type </option>
												<option ng-selected="{{p_type.property_type_id == <?php echo $property_type_id;?>}}" ng-repeat="p_type in typeList" value="{{p_type.property_type_id}}">
													{{p_type.property_type_name}}
												</option>
												
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3" for="PropertyName">Name</label>
										<div class="col-md-7">
											<input class="form-control" type="text" id="PropertyName_id" name="PropertyName" placeholder="Enter property name" 
											value="<?php echo $property_name;?>" pattern="^\S[A-Za-z ]{1,50}" data-bv-regexp-message="Characters and white space allowed only"
											data-bv-notempty="true" data-bv-notempty-message="The property name is required">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3" for="Street">Street</label>
										<div class="col-md-7">
											<input class="form-control" placeholder="Enter street" id="Street_id" type="text" name="Street" value="<?php echo $street;?>"
											required data-bv-notempty-message="The street name is required">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3" for="City">City</label>
										<div class="col-md-7">
											<input class="form-control" placeholder="Enter city" type="text" id="City_id" name="City" value="<?php echo $city;?>"
											required data-bv-notempty-message="The city name is required">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3" for="State">State</label>
										<div class="col-md-7">
											<select name="State" id="State_id" class="form-control" required data-bv-notempty-message="Please select the state">
												<option value=""> Select State </option>
												<option <?php if($state=="Andaman and Nicobar Islands"){echo "selected";}?> value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
												<option <?php if($state=="Andhra Pradesh"){echo "selected";}?> value="Andhra Pradesh">Andhra Pradesh</option>
												<option <?php if($state=="Arunachal Pradesh"){echo "selected";}?> value="Arunachal Pradesh">Arunachal Pradesh</option>
												<option <?php if($state=="Assam"){echo "selected";}?> value="Assam">Assam</option>
												<option <?php if($state=="Bihar"){echo "selected";}?> value="Bihar">Bihar</option>
												<option <?php if($state=="Chandigarh"){echo "selected";}?> value="Chandigarh">Chandigarh</option>
												<option <?php if($state=="Chhattisgarh"){echo "selected";}?> value="Chhattisgarh">Chhattisgarh</option>
												<option <?php if($state=="Dadra and Nagar Haveli"){echo "selected";}?> value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
												<option <?php if($state=="Daman and Diu"){echo "selected";}?> value="Daman and Diu">Daman and Diu</option>
												<option <?php if($state=="Delhi"){echo "selected";}?> value="Delhi">Delhi</option>
												<option <?php if($state=="Goa"){echo "selected";}?> value="Goa">Goa</option>
												<option <?php if($state=="Gujarat"){echo "selected";}?> value="Gujarat">Gujarat</option>
												<option <?php if($state=="Haryana"){echo "selected";}?> value="Haryana">Haryana</option>
												<option <?php if($state=="Himachal Pradesh"){echo "selected";}?> value="Himachal Pradesh">Himachal Pradesh</option>
												<option <?php if($state=="Jammu and Kashmir"){echo "selected";}?> value="Jammu and Kashmir">Jammu and Kashmir</option>
												<option <?php if($state=="Jharkhand"){echo "selected";}?> value="Jharkhand">Jharkhand</option>
												<option <?php if($state=="Karnataka"){echo "selected";}?> value="Karnataka">Karnataka</option>
												<option <?php if($state=="Kerala"){echo "selected";}?> value="Kerala">Kerala</option>
												<option <?php if($state=="Lakshadweep"){echo "selected";}?> value="Lakshadweep">Lakshadweep</option>
												<option <?php if($state=="Madhya Pradesh"){echo "selected";}?> value="Madhya Pradesh">Madhya Pradesh</option>
												<option <?php if($state=="Maharashtra"){echo "selected";}?> value="Maharashtra">Maharashtra</option>
												<option <?php if($state=="Manipur"){echo "selected";}?> value="Manipur">Manipur</option>
												<option <?php if($state=="Meghalaya"){echo "selected";}?> value="Meghalaya">Meghalaya</option>
												<option <?php if($state=="Mizoram"){echo "selected";}?> value="Mizoram">Mizoram</option>
												<option <?php if($state=="Nagaland"){echo "selected";}?> value="Nagaland">Nagaland</option>
												<option <?php if($state=="Orissa"){echo "selected";}?> value="Orissa">Orissa</option>
												<option <?php if($state=="Pondicherry"){echo "selected";}?> value="Pondicherry">Pondicherry</option>
												<option <?php if($state=="Punjab"){echo "selected";}?> value="Punjab">Punjab</option>
												<option <?php if($state=="Rajasthan"){echo "selected";}?> value="Rajasthan">Rajasthan</option>
												<option <?php if($state=="Sikkim"){echo "selected";}?> value="Sikkim">Sikkim</option>
												<option <?php if($state=="Tamil Nadu"){echo "selected";}?> value="Tamil Nadu">Tamil Nadu</option>
												<option <?php if($state=="Telangana"){echo "selected";}?> value="Telangana">Telangana</option>
												<option <?php if($state=="Tripura"){echo "selected";}?> value="Tripura">Tripura</option>
												<option <?php if($state=="Uttaranchal"){echo "selected";}?> value="Uttaranchal">Uttaranchal</option>
												<option <?php if($state=="Uttar Pradesh"){echo "selected";}?> value="Uttar Pradesh">Uttar Pradesh</option>
												<option <?php if($state=="West Bengal"){echo "selected";}?> value="West Bengal">West Bengal</option>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-3" for="State">PIN Code</label>
										<div class="col-md-7">
											<input class="form-control" placeholder="Enter PIN" type="text" name="PostalCode" id="PostalCode_id" 
											pattern="^\d{6}$" data-bv-trigger="blur" data-bv-regexp-message="The PIN code is not valid" value="<?php echo $postal_code;?>"
											data-bv-notempty="true" data-bv-notempty-message="The PIN code is required">
										</div>
									</div>

								   <div class="form-group">
										 <label class="control-label col-md-3" for="StarRate">Star Rate</label>
											<div class="col-md-7">
												<input id="switcher" class="form-control" placeholder="Enter star rate" type="range" name="StarRate" min="1" max="5" step="1" value="<?php echo $star_rate;?>">
												<output for="StarRate" id="rating"></output>
											</div>
									 </div>
									
									<div class="form-group">
										<label class="control-label col-md-3" for="description">Description</label>
										<div class="col-md-7">
											<textarea class="form-control" id="description_id" name="description" placeholder="Enter property description (This will appear on website)"
											required data-bv-notempty-message="Please enter description about property" rows="6" ><?php echo $description;?></textarea>
										</div>
									</div>
								</div>
							</div>
						
							<div class="example1">
								<div class="panel panel-default">
									<div class="panel-heading" data-acc-link="demo1"><i class="glyphicon glyphicon-list"></i> Features and Facilities (<i>Optional</i>)</div>
									<div class="panel-body " data-acc-content="demo1">
										<div class="form-group">
											<label class="control-label col-md-3" for="location_map">Map Location</label>
											<?php if($latitude){?>
											<div class="col-md-7">
												<div class="col-lg-7" id="map_canvas" style="width:auto;height:270px;"></div>
												<input class="form-control" type="hidden" name="latitude" id="latbox" value="<?php echo $latitude;?>">
												<input class="form-control" type="hidden" name="longitude" id="lngbox" value="<?php echo $longitude;?>">
												<p class="help-block">Drag & drop the marker near your location</p>
											<script src="http://maps.googleapis.com/maps/api/js"></script>
											<script type="text/javascript">
											/* - map - */
											var map;
											
												var latitude = parseFloat(<?php echo $latitude;?>);
												var longitude = parseFloat(<?php echo $longitude;?>);
												//alert(latitude);
												//alert(longitude);
												var myLatlng = new google.maps.LatLng(latitude,longitude);
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

												
												google.maps.event.addListener(marker, 'dragend', function (event) {
													document.getElementById("latbox").value = this.getPosition().lat();
													document.getElementById("lngbox").value = this.getPosition().lng();
												});
											
											/* - map end - */
											</script>
												<!--<textarea class="form-control" name="location_map" placeholder="Enter location string for Google map" rows="6"></textarea>-->
												
											</div>
											<?php }?>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3" for="description">How To Reach</label>
											<div class="col-md-7">
												<textarea class="form-control" name="how_to_reach" placeholder="Enter info how to reach" rows="6"><?php echo $how_to_reach;?></textarea>
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3" for="Bedrooms">Bedrooms</label>
											<div class="col-md-7">
												<select name="Bedrooms" class="form-control">
													<option value=""> Select number of bedrooms </option>
													<option <?php if($bedrooms==1){echo "selected";}?> value="1">1</option>
													<option <?php if($bedrooms==2){echo "selected";}?> value="2">2</option>
													<option <?php if($bedrooms==3){echo "selected";}?> value="3">3</option>
													<option <?php if($bedrooms==4){echo "selected";}?> value="4">4</option>
													<option <?php if($bedrooms==5){echo "selected";}?> value="5">5</option>
													<option <?php if($bedrooms==6){echo "selected";}?> value="6">6</option>
													<option <?php if($bedrooms==7){echo "selected";}?> value="7">7</option>
													<option <?php if($bedrooms==8){echo "selected";}?> value="8">8</option>
													<option <?php if($bedrooms==9){echo "selected";}?> value="9">9</option>
													<option <?php if($bedrooms==10){echo "selected";}?> value="10">10</option>
												</select>	
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3" for="Bedrooms">Beds</label>
											<div class="col-md-7">
												<select name="beds" class="form-control">
													<option value=""> Select number of beds </option>
													<option <?php if($beds==1){echo "selected";}?> value="1">1</option>
													<option <?php if($beds==2){echo "selected";}?> value="2">2</option>
													<option <?php if($beds==3){echo "selected";}?> value="3">3</option>
													<option <?php if($beds==4){echo "selected";}?> value="4">4</option>
													<option <?php if($beds==5){echo "selected";}?> value="5">5</option>
													<option <?php if($beds==6){echo "selected";}?> value="6">6</option>
													<option <?php if($beds==7){echo "selected";}?> value="7">7</option>
													<option <?php if($beds==8){echo "selected";}?> value="8">8</option>
													<option <?php if($beds==9){echo "selected";}?> value="9">9</option>
													<option <?php if($beds==10){echo "selected";}?> value="10">10</option>
													<option <?php if($beds==11){echo "selected";}?> value="11">11</option>
													<option <?php if($beds==12){echo "selected";}?> value="12">12</option>
													<option <?php if($beds==13){echo "selected";}?> value="13">13</option>
													<option <?php if($beds==14){echo "selected";}?> value="14">14</option>
													<option <?php if($beds==15){echo "selected";}?> value="15">15</option>
												</select>	
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3" for="Bathrooms">Bathrooms</label>
											<div class="col-md-7">
												<select name="Bathrooms" class="form-control">
													<option value=""> Select number of bathrooms </option>
													<option <?php if($bathrooms==1){echo "selected";}?> value="1">1</option>
													<option <?php if($bathrooms){echo "selected";}?> value="2">2</option>
													<option <?php if($bathrooms==3){echo "selected";}?> value="3">3</option>
													<option <?php if($bathrooms==4){echo "selected";}?> value="4">4</option>
													<option <?php if($bathrooms==5){echo "selected";}?> value="5">5</option>
													<option <?php if($bathrooms==6){echo "selected";}?> value="6">6</option>
													<option <?php if($bathrooms==7){echo "selected";}?> value="7">7</option>
													<option <?php if($bathrooms==8){echo "selected";}?> value="8">8</option>
													<option <?php if($bathrooms==9){echo "selected";}?> value="9">9</option>
													<option <?php if($bathrooms==10){echo "selected";}?> value="10">10</option>
												</select>
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3" for="Bedrooms">Accommodates</label>
											<div class="col-md-7">
												<select name="accommodates" class="form-control">
													<option value=""> Select accommodates </option>
													<option <?php if($accommodates==1){echo "selected";}?> value="1">1</option>
													<option <?php if($accommodates==2){echo "selected";}?> value="2">2</option>
													<option <?php if($accommodates==3){echo "selected";}?> value="3">3</option>
													<option <?php if($accommodates==4){echo "selected";}?> value="4">4</option>
													<option <?php if($accommodates==4){echo "selected";}?> value="5">5</option>
													<option <?php if($accommodates==6){echo "selected";}?> value="6">6</option>
													<option <?php if($accommodates==7){echo "selected";}?> value="7">7</option>
													<option <?php if($accommodates==8){echo "selected";}?> value="8">8</option>
													<option <?php if($accommodates==9){echo "selected";}?> value="9">9</option>
													<option <?php if($accommodates==10){echo "selected";}?> value="10">10</option>
													<option <?php if($accommodates==11){echo "selected";}?> value="11">11</option>
													<option <?php if($accommodates==12){echo "selected";}?> value="12">12</option>
													<option <?php if($accommodates==13){echo "selected";}?> value="13">13</option>
													<option <?php if($accommodates==14){echo "selected";}?> value="14">14</option>
													<option <?php if($accommodates==15){echo "selected";}?> value="15">15</option>
													<option <?php if($accommodates==16){echo "selected";}?> value="16">16</option>
													<option <?php if($accommodates==17){echo "selected";}?> value="17">17</option>
													<option <?php if($accommodates==18){echo "selected";}?> value="18">18</option>
													<option <?php if($accommodates==19){echo "selected";}?> value="19">19</option>
													<option <?php if($accommodates==20){echo "selected";}?> value="20">20</option>
													<option <?php if($accommodates==21){echo "selected";}?> value="21">21</option>
													<option <?php if($accommodates==22){echo "selected";}?> value="22">22</option>
													<option <?php if($accommodates==23){echo "selected";}?> value="23">23</option>
													<option <?php if($accommodates==24){echo "selected";}?> value="24">24</option>
													<option <?php if($accommodates==25){echo "selected";}?> value="25">25</option>
												</select>	
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3" for="Meals">Meals</label>
											<div class="col-md-7">
												<input class="form-control" placeholder="Enter Meals" type="text" name="Meals" value="<?php echo $meals;?>">
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3" for="Pool"></label>
											<div class="col-md-7">
												<label class="checkbox-inline">
													<input type="checkbox" name="Pool" id="optionsRadios1" <?php if($pool=="Yes"){echo "checked";}?> value="Yes">Pool
												</label>
												<label class="checkbox-inline">
													<input type="checkbox" name="internet_access" id="optionsRadios1" <?php if($internet_access=="Yes"){echo "checked";}?> value="Yes">Internet / WIFI
												</label>
												<label class="checkbox-inline">
													<input type="checkbox" name="smoking_allowd" id="optionsRadios1" <?php if($smoking_allowd=="Yes"){echo "checked";}?> value="Yes">Smoking Allowed
												</label>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3" for="Pool"></label>
											<div class="col-md-7">
												<label class="checkbox-inline">
													<input type="checkbox" name="television_access" id="optionsRadios1" <?php if($television_access=="Yes"){echo "checked";}?> value="Yes">Cable TV
												</label>
												<label class="checkbox-inline">
													<input type="checkbox" name="pet_friendly" id="optionsRadios1" <?php if($pet_friendly=="Yes"){echo "checked";}?> value="Yes">Pet friendly
												</label>
												<label class="checkbox-inline">
													<input type="checkbox" name="air_condition" id="optionsRadios1" <?php if($air_condition=="Yes"){echo "checked";}?> value="Yes">Air Conditioning
												</label>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3" for="Pool"></label>
											<div class="col-md-7">
												<label class="checkbox-inline">
													<input type="checkbox" name="payment_facility" id="optionsRadios1" <?php if($payment_facility=="Yes"){echo "checked";}?> value="Yes">Payment Facility
												</label>
												<label class="checkbox-inline">
													<input type="checkbox" name="in_house_kitchen" id="optionsRadios1" <?php if($in_house_kitchen=="Yes"){echo "checked";}?> value="Yes">In House Kitchen
												</label>
												<label class="checkbox-inline">
													<input type="checkbox" name="restaurant" id="optionsRadios1" <?php if($restaurant=="Yes"){echo "checked";}?> value="Yes">Restaurant
												</label>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3" for="Pool"></label>
											<div class="col-md-7">
												<label class="checkbox-inline">
													<input type="checkbox" name="free_parking" id="optionsRadios1" <?php if($free_parking=="Yes"){echo "checked";}?> value="Yes">Free Parking
												</label>
												<label class="checkbox-inline">
													<input type="checkbox" name="first_aid_available" id="optionsRadios1" <?php if($first_aid_available=="Yes"){echo "checked";}?> value="Yes">First Aid Available
												</label>
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3" for="EntertainMent">Entertainment</label>
											<div class="col-md-7">
												<input class="form-control" placeholder="Enter Entertainment" type="text" name="EntertainMent" value="<?php echo $entertainment;?>">
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3" for="OtherAmenities">Other Amenities</label>
											<div class="col-md-7">
												<input class="form-control" placeholder="Enter other amenities" type="text" name="OtherAmenities" value="<?php echo $other_amenities;?>">
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3" for="Theme">Theme</label>
											<div class="col-md-7">
												<input class="form-control" placeholder="Enter theme" type="text" name="Theme" value="<?php echo $theme;?>">
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3" for="Attractions">Attractions</label>
											<div class="col-md-7">
												<input class="form-control" placeholder="Enter attractions" type="text" name="Attractions" value="<?php echo $attractions;?>">
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3" for="LeisureActivities">Leisure Activities</label>
											<div class="col-md-7">
												<input class="form-control" placeholder="Enter leisure activities" type="text" name="LeisureActivities" value="<?php echo $leisureActivities;?>">
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3" for="General">General</label>
											<div class="col-md-7">
												<input class="form-control" placeholder="Enter general info" type="text" name="General" value="<?php echo $general;?>">
											</div>
										</div>
										
										<input class="form-control"type="hidden" name="old_path" value="<?php echo $image_path;?>">
									
									</div>
								</div>
								
								<div class="panel panel-default">
									<div class="panel-heading" data-acc-link="demo2"><i class="glyphicon glyphicon-camera"></i> Update Main Image (<i>Optional</i>)</div>
									<div class="panel-body" data-acc-content="demo2">
										<?php
											$img_array = array();
											$directory_path = './'.$image_path;
											$map = directory_map($directory_path);
											foreach ($map as $result)
											{
												$get_result = $image_path.$result;
												array_push($img_array,$get_result);
											}
											/*- main image path -*/
											$matches = preg_grep("/mainImage/", $img_array);
											$matches = implode($matches);
											$main_img_path = $matches;
										?>
										<div class="col-sm-6">
											<div class="form-group">
												<p>Upload new main image</p>
												<input class="form-control" type="file" name="mainImage" id="mainImage_id" >
											</div>
										</div>
										<div class="col-sm-6 img-wrap main_image">
											<?php if($main_img_path){?>
												<span class="close">&times;</span>
											<?php }?>
											<img id="subImg" src="../../<?php echo $main_img_path;?>" class="img-responsive img-rounded" 
											title="main image" >&nbsp;
										</div>
									</div>
								</div>
								
								<div class="panel panel-default">
									<div class="panel-heading" data-acc-link="demo3"><i class="glyphicon glyphicon-camera"></i> Update Gallery (<i>Optional</i>)</div>
									<div class="panel-body" data-acc-content="demo3">
										<div class="col-sm-6">
											<div class="form-group">
												<p>Upload new images</p>
												<input class="form-control" type="file" name="propertyImages[]" id="mainImage_id" >
											</div>
										</div>
										<?php
										foreach($img_array as $value)
										{
										?>
										<div id="<?php echo str_replace(str_split('/ .'),'_',$value);?>" class="col-sm-6 img-wrap-sub">
											<?php if($value){?>
												<span class="close-sub">&times;</span>
											<?php }?>
											<img id="subImg" src="../../<?php echo $value;?>" class="img-responsive img-rounded" 
											title="sub image" >&nbsp;
										</div>
										<?php }?>
										
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" data-acc-link="demo4"><i class="glyphicon glyphicon-list"></i> Update Property Owner Info (<i>Optional</i>)</div>
									<div class="panel-body " data-acc-content="demo4">
									
										<div class="form-group">
											<label class="control-label col-md-3" for="name">Name</label>
											<div class="col-md-9">
												<input class="form-control" type="text" name="name" placeholder="Enter name" value="<?php echo $owner_name;?>"
												pattern="^\S[A-Za-z ]{1,50}" data-bv-regexp-message="Characters and white space allowed only"
												id="name_id" required data-bv-notempty-message="The owner name is required">
												
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-md-3" for="email">Email</label>
											<div class="col-md-9">
												<input class="form-control" placeholder="Enter email" type="email" name="email" value="<?php echo $email;?>"
												required data-bv-notempty-message="The email address is required" id="email_id">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-md-3" for="address">Address</label>
											<div class="col-md-9">
												<textarea class="form-control" placeholder="Enter address" name="address" rows="4"
												required data-bv-notempty-message="The address is required" ><?php echo $address;?></textarea>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-md-3" for="registred_date">Registration Date</label>
											<div class="col-md-9">
												<input class="form-control" id="Dateid" placeholder="Enter registration date" type="text" name="registred_date" 
												 data-bv-notempty="true" data-bv-notempty-message="Registration date is required" value="<?php echo $registred_date;?>">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-md-3" for="phone">Tel/Mobile No.</label>
											<div class="col-md-9">
												<input class="form-control" placeholder="Enter Tel/Mobile No." type="text" name="phone" value="<?php echo $phone;?>"
												pattern="^\d{10}$" data-bv-trigger="blur" data-bv-regexp-message="The phone number is not valid" 
												 value="" data-bv-notempty="true" data-bv-notempty-message="The phone number is required">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-md-3" for="phone">Alternative Tel/Mobile No.</label>
											<div class="col-md-9">
												<input class="form-control" placeholder="Enter Tel/Mobile No." type="text" name="alternative_phone" value="<?php echo $alternative_phone;?>"
												pattern="^\d{10}$" data-bv-trigger="blur" data-bv-regexp-message="The phone number is not valid" 
												 value="">
											</div>
										</div>
									
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12 col-md-offset-3">
									<button type="submit" class="btn btn-success" >Update</button>
								</div>
							</div>
						</form>
						</div>
					</div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
	<!-- /#wrapper -->

    <!-- jQuery -->
	
	<script type="text/javascript" src="../../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../../assets/js/angular.min.js"></script>
	<script type="text/javascript" src="../../assets/js/bootstrapValidator.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery.accordion.js"></script>
	
    <!-- Bootstrap Core JavaScript -->
    <script src="../../assets/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	var app = angular.module('add_property', []);
	//'Authentication','Modal','ngRoute','ngSanitize'
	app.controller('add_property_ctrl', function($scope, $http){
		$http({
			method: 'GET',
			url:'../../Propertytype/getPropertyType'
		}).success(function (response){
			//alert(response));
			$scope.typeList = response;
		});
	});
	
	/*---*/
	$(document).ready(function() {
		$('#form_id').bootstrapValidator();
		
		/*-- datepicker --*/
		$('#Dateid').datepicker
		({
			dateFormat: 'dd/mm/yy',
			changeMonth: true,
			changeYear: true,
			yearRange: '1900:2150',
			maxDate: new Date(),
			inline: true
		});
    });
	$("#switcher").on("input", function() {
		document.getElementById('rating').value = $("#switcher").val();
	});
	
	
	//validation of name
	/*function name_validate()
	{ 
		 
		var name = document.getElementById('PropertyName_id').value;
		var letters = /^\S[a-zA-Z ]{1,50}$/;
		if(!letters.test(name))
		{
			alert("Please enter alphabets and white space only");
			document.getElementById('PropertyName_id').value = "";
			$("#PropertyName_id").focus();
		// return false;
		}
		else 
		{
		
		// return true;
		}
	}*/
	/*-- validation function--*/
	/*function validation()
	{
		if(document.getElementById('property_type_id').value=="")
		{
			alert("Please select property type");
			return false;
		}
		else if(document.getElementById('PropertyName_id').value=="")
		{
			alert("Please enter property name");
			return false;
		}
		else if(document.getElementById('Street_id').value=="")
		{
			alert("Please enter street info");
			return false;
		}
		else if(document.getElementById('City_id').value=="")
		{
			alert("Please enter city name");
			return false;
		}
		else if(document.getElementById('State_id').value=="")
		{
			alert("Please enter state name");
			return false;
		}
		else if(document.getElementById('PostalCode_id').value=="")
		{
			alert("Please enter postal code");
			return false;
		}
		else if(document.getElementById('mainImage_id').value=="")
		{
			alert("Please select the main image");
			return false;
		}
		else if(document.getElementById('propertyImages_id').value=="")
		{
			alert("Please select gallery images");
			return false;
		}
		else if(document.getElementById('description_id').value=="")
		{
			alert("Please enter the description");
			return false;
		}
		else
		{
			return true; 
		}
	}*/
	
	$(function() {
		$('.example1').accordion({ 
			multiOpen: false
		});
	});
	
	$('.img-wrap .close').on('click', function() {
		var img_src = $(this).closest('.img-wrap').find('img').attr('src');
		$.ajax({
			type: "GET",
			url: "../unlinkImg",
			data:{val: img_src},
			success: function(d){
				$('.main_image').hide();
			}
		});
	});
	$('.img-wrap-sub .close-sub').on('click', function() {
		var img_src = $(this).closest('.img-wrap-sub').find('img').attr('src');
		var img_id = $(this).closest('.img-wrap-sub').attr('id');
		$.ajax({
			type: "GET",
			url: "../unlinkImg",
			data:{val: img_src},
			success: function(d){
				$('#'+img_id).hide();
			}
		});
	});
	</script>
</body>

</html>
