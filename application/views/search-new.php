<!DOCTYPE html>
<html>
<head>
    <title>Property Booking</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Pinyon+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css'>
    <link href="css/new-theme/bootstrap.css" rel='stylesheet' type='text/css'/>
    <link href="css/new-theme/style.css" rel="stylesheet" type="text/css" media="all"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="js/new-theme/jquery.min.js"></script>
    <script src="js/new-theme/bootstrap.js"></script>

    <!-- requried-jsfiles-for owl -->
    <link href="css/new-theme/owl.carousel.css" rel="stylesheet">

    <script type="text/javascript" src="js/global/global_url_variable.js"></script>
    <script type="text/javascript" src="js/global/global_functions.js"></script>
	
    <script src="js/new-theme/owl.carousel.js"></script>
	<link rel="stylesheet" href="css/jquery-ui.css" />
<script src="js/jquery-ui.js"></script>
    <script type="text/javascript">
        $(function() {
            $( "#datepicker,#datepicker1" ).datepicker();

            $("#clearFilters").click(function(){
                location.reload();
            });

            /*$("#owl-demo").owlCarousel({
                items : 1,
                lazyLoad : true,
                autoPlay : true,
                navigation : true,
                navigationText :  false,
                pagination : false,
            });*/
        });

    </script>
    <script type="text/javascript" src="js/angular.min.js"></script>
    <script type="text/javascript" src="js/controller/checkRoomAvailabilityController.js"></script>
	<script type="text/javascript" src="js/dirPagination.js"></script>
    <!-- //requried-jsfiles-for owl -->
</head>
<body ng-app="checkRoomAvailabilityApp" ng-controller="checkRoomAvailabilityController" data-ng-init="getRoomAvailability()">
<!--header starts-->
<div class="header">
    <?php $this->load->view('common/header.html'); ?>
</div>

<!---strat-date-piker---->

<script>
    function allFieldsVisible(){

        var elm = $('#aaa');

        if (elm[0].style.display == "inline"){
            return true;
        } else {

            show();
        }
    }
    function showMoreFilters() {
		 
			if ($('#moreFilters:contains("+")').length > 0){
				$('#moreFilters').html("More Filters -");	
			} else {
				$('#moreFilters').html("More Filters +");	
			}
			
			
		 
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
<form method="post" action="RoomAvailability"  >
    <div class="online_reservation">
        <div class="b_room b_room_active" id="b_room">
            <div class="booking_room booking_room_active" id="booking_room">
                <div class="reservation">
                    <ul>
                        <li  class="span1_of_click">
                            <h5>Where to go?</h5>
                            <div class="book_date book_date_active">
                                <input   id="inpDestination" type="text" autocomplete="off" name="inpDestination" ng-model="inputDestination" value=""   ng-click="expandFilterOptions()" onClick="show()" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
                            </div>
                        </li>
                        <li  class="span1_of_click">
                            <h5>Arrival</h5>
                            <div class="book_date book_date_active">
                                <input class="date" id="datepicker" type="text" autocomplete="off" ng-model="checkInDate" name="checkIn" value="Arrival Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Arrival Date';}">
                            </div>
                        </li>
                        <li  class="span1_of_click">
                            <h5>Depature</h5>
                            <div class="book_date book_date_active">
                                <input class="date" id="datepicker1" type="text" autocomplete="off" ng-model="checkOutDate" name="checkOut" value="Departure Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Departure Date';}">
                            </div>
                        </li>
                        <li class="span1_of_click" id="aaa">
                            <h5>Accomodation type</h5>
                            <div>
                                <select class="frm-field required" ng-model="selectAccomodationType"  id="propertyType" name="propertyType" ng-init="selectAccomodationType=accomodationType[0]"
                                        ng-options="accomodation as accomodation.label for accomodation in accomodationType track by accomodation.value "
                                        ng-show = "inputDestination != 'Where you want to go?'" ></select>
                            </div>
                        </li>
                        <li class="span1_of_click" id="bbb">
                            <h5>No. of Guests</h5>
                            <div class="section_room">
                                <select class="frm-field required" ng-model="selectGuestHeadCount" id="guestCount" name="guestCount" ng-init="selectGuestHeadCount=guestHeadCount[0] " ng-options="option as option for option in guestHeadCount"></select>
                            </div>
                        </li>
                        <li class="span1_of_3">
                            <div class="date_btn">
                                <input type="submit" value="View Prices" />
                            </div>
                        </li>
                        <div class="clearfix"></div>
                        <li class="span1_of_click" id="bbb">
                            <h5>Sort By:</h5>
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
                        <li class="span1_of_3" style="margin-top: 26px;">
                            <div class="filter_btn" id="moreFilters" onclick="showMoreFilters()">More Filters +
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
                            <div class="room-grids">
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
                                <!--<div class="clearfix"></div>-->
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
<div id="package" class="package text-center filter-package" id="gallery" data-ng-init="galleryImgFetch()"> <!-- ng-controller="galleryImgCtrl" data-ng-init="galleryImgFetch()" -->
    <div class="container">
        <h3>Featured Properties</h3>

        <!--<div id="owl-demo" class="owl-carousel" owl-options="owlOptions">
            <div class="item text-center image-grid" ng-repeat="imageData in imageSrc">
                <ul>
                    <li ng-repeat="imageData in imageSrc.slice($index, ($index+3 > imageData.length ? imageData.length : $index+3))">
                         <img ng-src="{{imageData.image}}" alt="" ></li>
                </ul>
            </div>

        </div>-->

        <data-owl-carousel class="owl-carousel" data-options="{navigation: true, pagination: false, autoPlay : true,}">

            <div owl-carousel-item="" ng-repeat="imageData in ::imageSrc" class="item text-center image-grid">
                <ul>
                    <li ng-repeat="imageData in imageSrc.slice($index, ($index+3 > imageData.length ? imageData.length : $index+3))">
					<img ng-click="getImagePropertyDetails(imageData)" ng-src="{{imageData.image}}" alt="" ></li>
                </ul>

            </div>

        </data-owl-carousel>
    </div>
</div>
<!---->
<!---->
<div class="rooms text-center">
    <div class="container" >
	 
							 
							 
        <div class="room-grids" dir-paginate="rooms in propNames | itemsPerPage : 50">
            <div class="col-md-4 room-sec"> 
			
                <h4><a href="" ng-click="getPropertyDetails(rooms)"> {{rooms.propertyName}}<span style="color:black;float:right" ng-repeat="r_cnt in strtoint(rooms.starRate)">★</span>
                </a></h4>
                <a href="" ng-click="getPropertyDetails(rooms)">
                    <img ng-src="{{rooms.ImagePath}}" alt=""/>
                    <p id="text"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>{{rooms.propertyAddress}}</p>
                    <div class="items">
                        <li><a href="#"><span class="img1"><img src='images/breakfast.png' ng-if=" rooms.free_breakfast == 'Yes' " style="width: 10%; height: 10%" title="Free Breakfast"></span></a></li>
                        <li><a href="#"><span class="img2"><img src='images/pool.png' ng-if=" rooms.pool == 'Yes' " style="width: 10%; height: 10%" title="Swimming Pool"></span></a></li>
                        <li><a href="#"><span class="img3"><img src='images/parking.png' ng-if=" rooms.free_parking == 'Yes' " style="width: 10%; height: 10%" title="Free Parking"></span></a></li>
                        <li><a href="#"><span class="img4"><img src='images/television.png' ng-if=" rooms.television_access == 'Yes' " style="width: 10%; height: 10%" title="Television Access"></span></a></li>
                        <li><a href="#"><span class="img5"><img src='images/internet.png' ng-if=" rooms.internet_access == 'Yes' " style="width: 10%; height: 10%" title="Internet Access"></span></a></li>
                        <li><a href="#"><span class="img6"><img src='images/smoking.png' ng-if=" rooms.smoking_allowd == 'Yes' " style="width: 10%; height: 10%" title="Smoking Allowed"></span></a></li>
                        <li><a href="#"><span class="img7"><img src='images/pet.png' ng-if=" rooms.pet_friendly == 'Yes' " style="width: 10%; height: 10%" title="Pet Friendly"></span></a></li>
                    </div>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="fotter-info">
    <?php $this->load->view('common/footer.html'); ?>
</div>
<!---->

</body>
</html>