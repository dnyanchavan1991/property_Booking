<!DOCTYPE html>
<html>
<head>
<meta�name="keywords"�content="Holidays in Goa, Goa Holidays, Rantal Properties in Pune, Villas in Konkan",
"vacation rentals by owner, trueholidays,trueholiday, rent by owner, vacation by owner, vacation rentals, vacation homes for rent, vacation rental by owner, villas for rent, villa rentals, apartment rentals,  holiday rentals, hotels, family vacation, family travel, group travel, cheap rentals by owner, cheap vacation rental homes">

    <title>Property Booking</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Pinyon+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAw7GwLP6e0viGPXOtxAHtYCOVeRFkEbsw&libraries=places&sensor=false"></script>
    <link href="css/new-theme/bootstrap.css" rel='stylesheet' type='text/css'/>
    <link href="css/new-theme/style.css" rel="stylesheet" type="text/css" media="all"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="js/new-theme/jquery.min.js"></script>
    <script src="js/new-theme/bootstrap.js"></script>

    <!-- requried-jsfiles-for owl -->
    <link href="css/new-theme/owl.carousel.css" rel="stylesheet">
	   <script type="text/javascript" src="js/angular.min.js"></script>
    <script type="text/javascript" src="js/controller/checkRoomAvailabilityController.js"></script>

    <script type="text/javascript" src="js/global/global_url_variable.js"></script>
    <script type="text/javascript" src="js/global/global_functions.js"></script>




    <script type="text/javascript">
        $(function() {
         		  $("#datepicker").datepicker({
				numberOfMonths: 1,

				minDate: new Date(),
				onSelect: function (selected) {
					var dt = new Date(selected);
					dt.setDate(dt.getDate() + 1);
					$("#datepicker1").datepicker("option", "minDate", dt);
				}
			});
			$("#datepicker1").datepicker({
				numberOfMonths: 1,
				minDate : new Date(),
				onSelect: function (selected) {
					var dt = new Date(selected);
					dt.setDate(dt.getDate() - 1);
					$("#datepicker").datepicker("option", "maxDate", dt);
				}
			});

            $("#clearFilters").click(function(){
                location.reload();
            });
        });
		$(document).ready(function() {

		// Vish - trying to keep search bar fixed if vertical scroll happens
		var offset = $('.online_reservation').offset();
		$(window).on('scroll', function() {
			var st = $(this).scrollTop();
			event.stopPropagation();
			if (offset.top <= st){
				//$('#where_to_go').click();
				$('.reservation>ul').addClass("container-fluid-search");
				//$('.book_date_active input[type="text"]').parent().addClass("shrink");
			} else {
				$('.reservation>ul').removeClass("container-fluid-search");
				//$('.reservation').removeClass("container-fluid-moreFilters");
				//$('.book_date_active input[type="text"]').removeClass("shrink");
			}
		});

		});


    </script>

	<script type="text/javascript" src="js/dirPagination.js"></script>
    <!-- //requried-jsfiles-for owl -->
</head>
<body ng-app="checkRoomAvailabilityApp" ng-controller="checkRoomAvailabilityController" data-ng-init="getRoomAvailability()">
<!--header starts-->
<div class="header">
    <?php $this->load->view('common/header.php'); ?>
</div>

<!---strat-date-piker---->
<link rel="stylesheet" href="css/jquery-ui.css" />
<script src="js/jquery-ui.js"></script>
<script src="js/ngAutocomplete.js"></script>
<script>
    function allFieldsVisible(){

        var elm = $('#aaa');

        if (elm[0].style.display == "inline"){
            return true;
        } else {

            show();
        }
    }
	function validateForm(){
			var ret_flag = true;
				if($("#inpDestination").val() == "")
				{
					if(confirm("Would you like to visit all Destination Properties?")){
						ret_flag = true;
					} else {
						ret_flag = false;
					}
				}
				if($("#datepicker").val() == "Arrival Date" || $("#datepicker").val() == "")
				{
					alert("Please provide Tentative Travel Start Date");
					ret_flag = false;
				}
				if($("#datepicker1").val() == "Departure Date" || $("#datepicker1").val() == "")
				{
					alert("Please provide Tentative Travel End Date");
					ret_flag = false;
				}

				if (ret_flag === false)
					return false;
				else
					return true;
			}
    function showMoreFilters() {

			if ($('#moreFilters:contains("+")').length > 0){
				$('#moreFilters').html("More Filters -");
			} else {
				$('#moreFilters').html("More Filters +");
			}

			var offset = $('.online_reservation').offset();
			$('html, body').animate({
				scrollTop: $(".online_reservation").offset().top + 100
			}, 500);

        /*var target = $(this);
        $('#moreFilters').text('More Filters +');
        if($('#moreFiltersExpand').is(':hidden') == true) {
            $(this).slideDown('normal');
            $(this).text('More Filters -');
        }*/
        $("#moreFiltersExpand").toggle();
        $("#clearFilters").toggle();
        if($('#moreFiltersExpand').is(':hidden') == false) {
            $("#package").addClass('result-package');
            $("#package-expand").addClass('expand-package');
        }
        else {
            $("#package").removeClass('result-package');
            $("#package-expand").addClass('expand-package');
        }
    }
	function applyFilters () {
		$("#moreFiltersExpand").hide();
		$('#moreFilters').html("More Filters +");

	}

</script>
<!---/End-date-piker---->
<link type="text/css" rel="stylesheet" href="css/new-theme/JFGrid.css" />
<link type="text/css" rel="stylesheet" href="css/new-theme/JFFormStyle-1.css" />
<script type="text/javascript" src="js/new-theme/JFCore.js"></script>
<script type="text/javascript" src="js/new-theme/JFForms.js"></script>
<!-- Set here the key for your domain in order to hide the watermark on the web server -->
<script type="text/javascript">
    (function() {
        JC.init({
            domainKey: ''
        });
    })();
</script>
<form class = "room-availability" method="post" action="RoomAvailability"  >
    <div class="online_reservation">
        <div class="b_room b_room_active" id="b_room">
            <div class="booking_room booking_room_active" id="booking_room" style="top: 0em !important">
                <div class="reservation">
                    <ul>
                        <li  class="span1_of_click">
                            <!--<h5>Where to go?</h5>-->
                            <div class="book_date book_date_active">
                                <input   id="inpDestination" type="text" ng-autocomplete="result1" details="details1" options="options1"  name="inpDestination" ng-model="inputDestination" value=""   ng-click="expandFilterOptions()"   onfocus="this.value = '';"  >
								<input type="hidden" name="hdnDest" id="hdnDest" value = "<?php echo $inpDestination?>" />

								<div style="color:darkgray">result: {{result}}</div>
                            </div>
                        </li>
                        <li  class="span1_of_click">
                            <!--<h5>Arrival</h5>-->
                            <div class="book_date book_date_active">
                                <input class="date" id="datepicker" type="text" autocomplete="off" ng-model="checkInDate" name="checkIn" value="Arrival Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Arrival Date';}">
								<input type="hidden" name="hdnDate1" id="hdnDate1" value = "<?php echo $checkIn?>" />
                            </div>
                        </li>
                        <li  class="span1_of_click">
                            <!--<h5>Depature</h5>-->
                            <div class="book_date book_date_active">
                                <input class="date" id="datepicker1" type="text" autocomplete="off" ng-model="checkOutDate" name="checkOut" value="Departure Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Departure Date';}">
								<input type="hidden" name="hdnDate2" id="hdnDate2" value = "<?php echo $checkOut?>" />
                            </div>
                        </li>
                        <li class="span1_of_click" id="aaa">
                            <!--<h5>Accomodation type</h5>-->
                            <div>
                                <select class="frm-field required" ng-model="selectAccomodationType"  id="propertyType" name="propertyType" ng-init="selectAccomodationType=accomodationType[0]"
                                        ng-options="accomodation as accomodation.label for accomodation in accomodationType track by accomodation.value "
                                        ng-show = "inputDestination != 'Where you want to go?'" ></select>
										<input type="hidden" name="hdnProp" id="hdnProp" value = "<?php echo $propertyType?>" />
                            </div>
                        </li>
                        <li class="span1_of_click" id="bbb">
                            <!--<h5>No. of Guests</h5>-->
                            <div class="section_room">
                                <select class="frm-field required" ng-model="selectGuestHeadCount" id="guestCount" name="guestCount" ng-init="selectGuestHeadCount=guestHeadCount[0] " ng-options="option as option.label for option in guestHeadCount"></select>
								<input type="hidden" name="hdnGuest" id="hdnGuest" value = "<?php echo $guestCount?>" />
                            </div>
                        </li>
                        <li class="span1_of_3 left">

                            <div class="date_btn">
                                <input type="submit" name="submit" style="margin-top: 0.5em !important;width: 335px;" value="Search" onclick="return validateForm();" />
                            </div>
                        </li>
                        <div class="clearfix"></div>
                        <li class="span1_of_click" id="bbb">
                            <!--<h5>Sort By:</h5>-->
                            <div class="section_room">
                                <select class="frm-field required" ng-model="sortByFilter" ng-change="getRoomAvailability()" ng-init="sortByFilter = sortByFilter || 'propAToZ'"">
                                    <option value="bedLowToHigh" selected>Bedrooms : Low to High</option>
                                    <option value="bedHighToLow">Bedrooms : High to Low</option>
                                    <option value="accLowToHigh">Accommodates : Low to High</option>
                                    <option value="accHighToLow">Accommodates : High to Low</option>
                                    <option value="propAToZ">Property Name : A to Z</option>
                                    <option value="propZToA">Property Name : Z to A</option>
                                </select>
                            </div>
                        </li>
                        <li class="span1_of_3 left" style="margin-top: 1em;">
                            <div class="filter_btn" id="moreFilters" onclick="showMoreFilters()">More Filters +
                            </div>
                        </li>
						<li class="span1_of_3" style="margin-top: 1em;float: right;">
                            <div class="filter_btn" style="background:#244a96; color: #fff; width: 50% !important" id="moreFilters" onclick="applyFilters()">Apply Filters
                            </div>
                        </li>
                        <div class="clearfix"></div>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    </div>

<!---->
    <div class="clearfix"></div><br/>
    <div id="moreFiltersExpand" class="moreFilterExpand" style="display: none">
        <div id="package-expand" class="package text-center filter-package">
            <div class="container container-search">
                <div class="reservation">
                    <div class="banner-info text-left">
                        <form>
                            <div class="room-grids filter-options">
                                <div class="col-md-2 room-sec">
                                    <h5>Ratings</h5>
                                    <div class="items items-filter" ng-repeat="starRateLabel  in starRateList">
                                        <input type="checkbox" id={{starRateLabel.name}}
                                               ng-model="starRateLabel.selected"
                                               ng-change="isLabelChecked('starRate')">
                                        <img ng-src={{starRateLabel.star_image_url}} alt=""   ></img>
                                    </div>
                                </div>
                                <div class="col-md-2 room-sec">
                                    <h5>Bathrooms</h5>
                                    <div class="items items-filter" ng-repeat="bathroom in bathroomList">
                                        <input id={{bathroom.name}} type="checkbox"
                                            ng-model="bathroom.selected"
                                            ng-click="isLabelChecked('bathroom')"> {{bathroom.Label}}
                                    </div>
                                </div>
                                <div class="col-md-2 room-sec">
                                    <h5>Feature</h5>
                                    <div class="items items-filter" ng-repeat="featureListLabel in featureList">
                                        <input id={{featureListLabel.name}} type="checkbox"
                                            ng-model="featureListLabel.selected"
                                            ng-change="isLabelChecked('features')"> {{featureListLabel.featureLabel}}
                                    </div>
                                </div>
                                <div class="col-md-2 room-sec">
                                    <h5>Facilities</h5>
                                    <div class="items items-filter" ng-repeat="facilityListLabel in facilityList">
                                        <input id={{facilityListLabel.name}} type="checkbox"
                                            ng-model="facilityListLabel.selected"
                                            ng-change="isLabelChecked('facility')"> {{facilityListLabel.facilityLabel}}
                                    </div>
                                </div>
                                <div class="col-md-2 room-sec">
                                    <h5>Bedrooms</h5>
                                    <div class="items items-filter">
                                    <select ng-model="sortByBedrooms" ng-change="getRoomAvailability()" ng-init="sortByBedrooms = sortByBedrooms || 'All'">
                                        <option value="All">All</option>
                                        <option value="1">1 Bedroom</option>
                                        <option value="2">2 Bedrooms</option>
                                        <option value="3">3 Bedrooms</option>
                                        <option value="4">4 Bedrooms</option>
                                        <option value="5">5+ Bedrooms  </option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!---->
<!---->
<div id="package" class="package text-center filter-package" id="gallery" data-ng-init="galleryImgFetch()">
    <?php $this->load->view('common/featured-property.html'); ?>
</div>
<!---->
<!---->
<div class="rooms text-center"> <Strong style="text-align: left;float: left;padding-left: 1em;font-family: -webkit-pictograph;font-size: 32px;">
<!--<?php echo $inpDestination == ""  ? "All Destinations " : $inputDestination; ?>--> <span ng-bind="totalRecords" id="totalRecords"> </span> </Strong>

    <div class="container" >

        <div class="room-grids" >
            <div class="ang-dir-paginate">
                <dir-pagination-controls
                    max-size="10"
                    direction-links="true"
                    boundary-links="true"
                    auto-hide="true">
                </dir-pagination-controls>
            </div>

           <?php if ( $featured != "Featured" ) { ?>
            <div id="abc" class="col-md-3 room-sec single-room"   dir-paginate="rooms in propNames | itemsPerPage : 10"  data-ng-class="{'grey-background':rooms.Featured == 'Yes' }">

                <h4><a href="" ng-click="getPropertyDetails(rooms)"> {{rooms.propertyName}}<span class = "room-star" ng-repeat="r_cnt in strtoint(rooms.starRate)">★</span>
                </a></h4>
                <a href="" ng-click="getPropertyDetails(rooms)">
                    <img class = "single-room-image" ng-src="{{rooms.ImagePath}}" alt=""/>
                    <p id="text" style="overflow:hidden; white-space: nowrap;"><span class="map-marker"></span>{{rooms.propertyAddress}}</p>
                    <!--<div class="items">-->
                        <li ng-if=" rooms.free_breakfast == 'Yes' "><img class = "feature-images" src='images/breakfast.png' title="Free Breakfast"></li>
                        <li ng-if=" rooms.pool == 'Yes' "><img class = "feature-images" src='images/pool.png' title="Swimming Pool"></li>

                        <li ng-if=" rooms.free_parking == 'Yes' "><img class = "feature-images" src='images/parking.png' title="Free Parking"></li>
                        <li ng-if=" rooms.television_access == 'Yes' "><img class = "feature-images" src='images/television.png' title="Television Access"></li>
                        <li ng-if=" rooms.internet_access == 'Yes' "><img class = "feature-images" src='images/internet.png' title="Internet Access"></li>
                        <li ng-if=" rooms.smoking_allowd == 'Yes' "><img class = "feature-images" src='images/smoking.png' title="Smoking Allowed"></li>
                        <li ng-if=" rooms.pet_friendly == 'Yes' "><img class = "feature-images" src='images/pet.png' title="Pet Friendly"></li>
                    <!--</div>-->
                </a>
            </div>
            <?php } else { ?>

            <div id="abc" class="col-md-3 room-sec single-room"   dir-paginate="rooms in propNames | itemsPerPage : 10"  data-ng-class="{'grey-background':rooms.Featured == 'Yes', 'hide' : rooms.Featured == 'No'}">

                <h4><a href="" ng-click="getPropertyDetails(rooms)"> {{rooms.propertyName}}<span class = "room-star" ng-repeat="r_cnt in strtoint(rooms.starRate)">★</span>
                </a></h4>
                <a href="" ng-click="getPropertyDetails(rooms)">
                    <img class = "single-room-image" ng-src="{{rooms.ImagePath}}" alt=""/>
                    <p id="text"><span class="map-marker"></span>{{rooms.propertyAddress}}</p>
                    <!--<div class="items">-->
                        <li ng-if=" rooms.free_breakfast == 'Yes' "><img class = "feature-images" src='images/breakfast.png' title="Free Breakfast"></li>
                        <li ng-if=" rooms.pool == 'Yes' "><img class = "feature-images" src='images/pool.png' title="Swimming Pool"></li>

                        <li ng-if=" rooms.free_parking == 'Yes' "><img class = "feature-images" src='images/parking.png' title="Free Parking"></li>
                        <li ng-if=" rooms.television_access == 'Yes' "><img class = "feature-images" src='images/television.png' title="Television Access"></li>
                        <li ng-if=" rooms.internet_access == 'Yes' "><img class = "feature-images" src='images/internet.png' title="Internet Access"></li>
                        <li ng-if=" rooms.smoking_allowd == 'Yes' "><img class = "feature-images" src='images/smoking.png' title="Smoking Allowed"></li>
                        <li ng-if=" rooms.pet_friendly == 'Yes' "><img class = "feature-images" src='images/pet.png' title="Pet Friendly"></li>
                    <!--</div>-->
                </a>
            </div>
            <?php } ?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="fotter-info">
    <?php $this->load->view('common/footer.html'); ?>
</div>
<!---->
<style>
    .grey-background{
        background-color: darkgrey;
    }
</style>
</body>
</html>