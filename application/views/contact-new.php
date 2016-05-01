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
    <script src="js/new-theme/bootstrap.min.js"></script>
    <script src="js/new-theme/owl.carousel.js"></script>
    <script type="text/javascript" src="js/global/global_url_variable.js"></script>
    <script type="text/javascript" src="js/global/global_functions.js"></script>

    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link href="css/new-theme/owl.carousel.css" rel="stylesheet">

    <script src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/angular.min.js"></script>
    <script type="text/javascript" src="js/controller/getRoomDetailController.js"></script>
    <script type="text/javascript" src="js/dirPagination.js"></script>
</head>

<body ng-app="getRoomDetailApp" ng-controller="getRoomDetailController"	ng-init="getRoomDetail()" data-spy="scroll" data-target="#myScrollspy">
<!--header starts-->
<div class="header">
    <?php $this->load->view('common/header.html'); ?>
</div>

<script>
    $(function() {
        $( "#datepicker,#datepicker1" ).datepicker();
    });
    window.onload = function() {
        $("#owl-demo").owlCarousel({
            items : 1,
            lazyLoad : true,
            autoPlay : true,
            navigation : true,
            navigationText :  false,
            pagination : false,
        });
    };
</script>

<script type="text/javascript">
    (function() {
        JC.init({
            domainKey: ''
        });
    })();
</script>
<!---->
<div class="rooms text-center">
<div class="" id="myScrollspy">
    <ul class="nav nav-tabs nav-stacked" data-offset-top="120" data-spy="affix">
        <li class="active"><a href="#section1">Description</a></li>
        <li><a href="#section2">Gallery</a></li>
        <li><a href="#section3">Charges</a></li>
        <li><a href="#section4">How to Reach</a></li>
        <li><a href="#section5">Reviews</a></li>
    </ul>
</div>
    <div class="container" >
        <div class="room-grids col-sm-9" >
                <div class="col-sm-12">
                    <div id="section1" class="detailed-row">
                        <h2>Description</h2>
                        <p><?php echo nl2br($propertyDescription);?></p>
                        <br>
                        <div class="panel panel-default">
                            <div class="panel-heading"><i class="glyphicon glyphicon-ok-circle"></i> The Property</div>
                            <div class="panel-body">
                                <p>
                                <ul>
                                    <li class="property-details">
                                        <b>Type :</b> <?php echo  nl2br($property_type); ?> &nbsp;
                                    </li>
                                    <li class="property-details">
                                        <b>Bedrooms :</b> <?php echo  nl2br($bedrooms); ?> &nbsp;
                                    </li>
                                    <li class="property-details">
                                        <b>Bathrooms :</b> <?php echo  nl2br($bathrooms); ?> &nbsp;
                                    </li>
                                    <li class="property-details">
                                        <b>Accommodates :</b> <?php echo  $accommodates; ?> &nbsp;
                                    </li>
                                </ul>
                                </p>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading"><i class="glyphicon glyphicon-ok-circle"></i> Amenities</div>
                            <div class="panel-body">
                                <p>
                                <ul>
                                    <li style="float: left; ">
                                        <b>Swimming Pool :</b> <?php if($pool == "Yes"){?>
                                            <img src="images/Yes_tick.gif" style="height: 20px;width: 20px;">
                                        <?php } else{?>
                                            <img src="images/No_tick.png" style="height: 15px;width: 15px;">
                                        <?php } ?> &nbsp;
                                    </li>
                                    <li style="  float: left; ">
                                        <b>Internet Access :</b> <?php if($internet_access == "Yes"){?>
                                            <img src="images/Yes_tick.gif" style="height: 20px;width: 20px;">
                                        <?php } else{?>
                                            <img src="images/No_tick.png" style="height: 15px;width: 15px;">
                                        <?php } ?> &nbsp;
                                    </li>
                                    <li style="  float: left; ">
                                        <b>Television :</b> <?php if($television == "Yes"){?>
                                            <img src="images/Yes_tick.gif" style="height: 20px;width: 20px;">
                                        <?php } else{?>
                                            <img src="images/No_tick.png" style="height: 15px;width: 15px;">
                                        <?php } ?> &nbsp;
                                    </li>
                                    <li style="  float: left; ">
                                        <b>Pets Allowed :</b> <?php if($pet_friendly == "Yes"){?>
                                            <img src="images/Yes_tick.gif" style="height: 20px;width: 20px;">
                                        <?php } else{?>
                                            <img src="images/No_tick.png" style="height: 15px;width: 15px;">
                                        <?php } ?> &nbsp;
                                    </li>
                                    <li style="  float: left; ">
                                        <b>Air Conditioned :</b> <?php if($air_condition == "Yes"){?>
                                            <img src="images/Yes_tick.gif" style="height: 20px;width: 20px;">
                                        <?php } else{?>
                                            <img src="images/No_tick.png" style="height: 15px;width: 15px;">
                                        <?php } ?> &nbsp;
                                    </li>
                                    <li style="  float: left; ">
                                        <b>In-House Kitchen :</b> <?php if($in_house_kitchen == "Yes"){?>
                                            <img src="images/Yes_tick.gif" style="height: 20px;width: 20px;">
                                        <?php } else{?>
                                            <img src="images/No_tick.png" style="height: 15px;width: 15px;">
                                        <?php } ?> &nbsp;
                                    </li>
                                </ul>
                                </p>
                                <div class="clearfix"> </div>
                                <p>
                                <div>
                                    <b>Food :</b> <?php if($meals){echo  nl2br($meals);} else {echo "NA";} ?> &nbsp;
                                </div>
                                <div>
                                    <b>Other Amenities :</b> <?php if($other_amenities){echo nl2br($other_amenities);} else {echo "NA";} ?> &nbsp;
                                </div>
                                <div>
                                    <b>Leisure Activities :</b> <?php if($leisureActivities){echo nl2br($leisureActivities);} else {echo "NA";} ?> &nbsp;
                                </div>
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div id="section2" class="detailed-row">
                        <h2>Gallery</h2>
                        <div id="owl-demo" class="owl-carousel">
                            <?php
                            $files = glob('Admin/'.$imagePath."*.*");
                            for ($i=1; $i<count($files); $i++)
                            {
                                $image = $files[$i];
                                $supported_file = array(
                                    'gif',
                                    'jpg',
                                    'jpeg',
                                    'png'
                                );
                                $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
                                if (in_array($ext, $supported_file))
                                {?>
                                    <div class="item text-center image-grid property-grid">
                                        <ul>
                                            <li><img src="<?php echo $image;?>" alt=""></li>
                                        </ul>
                                    </div>
                                <?php
                                }
                                else
                                {
                                    continue;
                                }
                            }?>
                        </div>
                    </div>
                    <hr>
                    <div id="section3" class="detailed-row">
                        <h2>Charges</h2>
                        <?php
                        foreach($rentresult as $row)
                        {
                            $row=(array)$row;
                            echo'<p><b>Accomodation Type:-</b>'.$row['accomodation'].
                                '<br><b>Base Price:-</b>'.$row['basePrice'].
                                '<br><b>Price per child:-</b>'.$row['childPrice'].
                                '<br><b>Price per Adult:-</b>'.$row['adultPrice'].
                                '<br><b>Room capacity:-</b>'.$row['capacity'].
                                '</p><br><br>';
                        }
                        ?>
                    </div>
                    <hr>
                    <div id="section4" class="detailed-row">
                        <h2>How To Reach</h2>
                        <p><?php echo nl2br($way_to_reach); ?></p>
                    </div>
                    <hr>
                    <div id="section5" class="detailed-row">
                        <h2>Reviews</h2>
                        <div class="contact-form detailed-contact-form">
                            <form name="form" novalidate ng-submit="form.$valid && processForm()" ng-controller="reviewCtrl" class="angular-msgs">

                                <?php if(isset($name) && isset($email_address)){?>
                                    <input type="text" id="customer_name" ng-model="customer_name" placeholder="Name" ng-init="customer_name='<?php echo $name;?>'" readonly>
                                    <input type="email" ng-model="customer_email" placeholder="Email" ng-init="customer_email='<?php echo $email_address;?>'" readonly>
                                <?php } else{?>

                                    <input type="text" id="customer_name" ng-model="customer_name" name="customer_name" ng-pattern="/^[a-zA-Z ]*$/" placeholder="Name" ng-value="" required>
                                    <div id="ng-error" ng-messages="form.customer_name.$error" ng-if="form.customer_name.$dirty">
                                        <div ng-message="required">This field is required</div>
                                        <div ng-message="pattern">Only characters & space allowed</div>
                                    </div>
                                    <input type="email" ng-model="customer_email" name="customer_email" ng-pattern="/^[_a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/" placeholder="Email" ng-value="" required>
                                    <div id="ng-error" ng-messages="form.customer_email.$error" ng-if="form.customer_email.$dirty">
                                        <div ng-message="required">This field is required</div>
                                        <div ng-message="pattern">Your email address is invalid</div>
                                    </div>
                                <?php }?>

                                <div class="clearfix"> </div>

                                <input class="date" id="datepicker" type="text" autocomplete="off" ng-model="review_checkin" name="review_checkin" id="review_checkin" value="Check-In date" onfocus="this.value = '';" >
                                <!--<input id="review_checkin" type="text" ng-model="review_checkin" name="review_checkin" placeholder="Check-In date"  required>-->
                                <div id="ng-error" ng-messages="form.review_checkin.$error" ng-if="form.review_checkin.$dirty">
                                    <div ng-message="required" >This field is required</div>
                                </div>
                                <input class="date" id="datepicker1" type="text" autocomplete="off" ng-model="review_checkout" name="review_checkout" id="review_checkout" value="Check-Out date" onfocus="this.value = '';" >
                                <!--<input id="review_checkout" type="text" ng-model="review_checkout" name="review_checkout" placeholder="Check-Out date"  required>-->
                                <div id="ng-error" ng-messages="form.review_checkout.$error" ng-if="form.review_checkout.$dirty">
                                    <div ng-message="required" >This field is required</div>
                                </div>

                                <div class="clearfix"> </div>

                                <div>Rating:</div>
                                <div class="acidjs-rating-stars">
                                    <input type="radio" ng-model="rating_given" id="group-2-0" value="5" /><label for="group-2-0"></label>
                                    <input type="radio" ng-model="rating_given" id="group-2-1" value="4" /><label for="group-2-1"></label>
                                    <input type="radio" ng-model="rating_given" id="group-2-2" ng-init="rating_given=3" ng-selected="true" value="3" /><label for="group-2-2"></label>
                                    <input type="radio" ng-model="rating_given" id="group-2-3" value="2" /><label for="group-2-3"></label>
                                    <input type="radio" ng-model="rating_given" id="group-2-4" value="1" /><label for="group-2-4"></label>
                                </div>

                                <textarea ng-model="review_given" ng-minlength="100" ng-maxlength="1000" name="review_given"  placeholder="Content...(max 1000)" required></textarea>
                                <div id="ng-error" ng-messages="form.review_given.$error" ng-if="form.review_given.$dirty" >
                                    <div ng-message="required">This field is required</div>
                                    <div ng-message="minlength">Review must be over 100 characters</div>
                                    <div ng-message="maxlength">Review must not exceed 1000 characters</div>
                                </div>

                                <div class="clearfix"> </div>

                                <input type="hidden" ng-model="prop_id" ng-init="prop_id='<?php echo $property_id;?>'" >
                                <input type="submit" id="submit" value="Submit">
                                <br/><br/>
                            </form>
                        </div>
                        <div class="other-comments" ng-controller="paginateReview" ng-init="getReviews()">
                            <div class="comments-head">
                                <div><h3>Reviews</h3></div>
                                <div>
                                    <dir-pagination-controls
                                        max-size="5"
                                        direction-links="true"
                                        boundary-links="true"
                                        auto-hide="true">
                                    </dir-pagination-controls>
                                </div>
                                <!--<div>
                                    <select ng-model="perpage">
                                        <option ng-value="5" ng-selected="true">5</option>
                                        <option ng-value="10">10</option>
                                        <option ng-value="25">25</option>
                                    </select>
                                </div>-->
                                <div class="clearfix"></div>
                            </div>
                            <div class="comments-bot" dir-paginate="reviews_count in reviews|itemsPerPage:10">
                                <p>{{reviews_count.review_text}}</p>
                                <div class="text-left" >
                                    <span class="red-star" ng-repeat="r_cnt in strtoint(reviews_count.star_rating)">★</span>
                                </div>
                                <h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                    {{reviews_count.customer_name}} <br/>
                                    <p>Visited property during {{reviews_count.check_in}} - {{reviews_count.check_out}}</p>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="booking-grid col-sm-3">
            <h4>Availability : <?php echo $avail_accomodates;?></h4>
            <p class="best-pri"></p>

            <a class="best-btn" onclick=" return checkLogin()" href="BookProperty">Book Now</a>
            <div class="hotel-left-two" ng-controller="popupController">

                <p>
                    <a href="" ng-click="togglemailPopUp()" class="best-btn">Send
                        Mail</a>
                    <a href="" ng-click="togglemessagePopUp()"
                       class="best-btn">Send SMS</a>
                </p>
                <modal id="modal"  title="ff"  ng-model="model" visible="showModal">

                    <form  name="formData" class="contact-form detailed-contact-form" ng-submit="Contact_to_customer_enquiry(
                                        <?php echo "'$propertyId'"; ?>)">
                        <div class="">
                            <label for="email"></label> <input type="text"
                                                               class="form-control" name="full_name" id="full_name"
                                                               ng-model="form.full_name" placeholder="Full Name" />
                        </div>
                        <div class="" id="email_id_div">
                            <label for="email"></label> <input type="email"
                                                               class="form-control" name="email_id" id="email_id"
                                                               ng-model="form.email_id" placeholder="Enter email" />
                        </div>
                        <div class="" id="phone_div">
                            <label for="email"></label> <input type="text"
                                                               class="form-control" name="phone" id="phone"
                                                               ng-model="form.phone"
                                                               placeholder="Enter Phone/Mobile Number" />
                        </div>
                        <div class="">
                            <label for="checkIn"></label><input class="date"
                                                                name="checkIn" id="checkIn" ng-model="form.checkIn"
                                                                ng-init="checkIn= 'CheckIn Date'" type="text"
                                                                style="width: 70%; padding: 15px !important; margin: 0px !important;  height: 0px;  " onfocus="this.value = '';"
                                                                onblur="if (this.value == '') {this.value = '';}" required>
                        </div>
                        <div class="">
                            <label for="checkOut"></label><input class="date"
                                                                 name="checkOut" id="checkOut" ng-model="form.checkOut"
                                                                 ng-init="checkOut= 'CheckOut Date'" type="text"
                                                                 style="width: 70%; padding: 15px !important; margin: 0px !important; height: 0px;" onfocus="this.value = '';"
                                                                 onblur="if (this.value == '') {this.value = '';}" required>
                        </div>
                        <div class="">
                            <label for="enquiry"></label>
                            <textarea class="form-control"
                                      ng-model="form.enquiry" id="enquiry" name="enquiry"
                                      placeholder="Enquiry.." required="required"></textarea>
                        </div>

                        <br>

                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <script src="js/jquery-ui.js"></script>
                    <script>
                        $(function() {
                            $("#datepicker,#checkIn,#checkOut")
                                .datepicker();
                        });
                    </script>
                </modal>
            </div>
            <div class="map-gd">
                <div id="map_canvas" style="width:100%;height:270px;"></div>
                <script src="http://maps.googleapis.com/maps/api/js"></script>
                <script>
                    /* - map - */
                    var map;
                    var lat = parseFloat('<?php echo $latitude;?>');
                    var log = parseFloat('<?php echo $longitude;?>');
                    var myLatlng = new google.maps.LatLng(lat,log);
                    var myOptions = {
                        zoom: 12,
                        center: myLatlng,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                    var marker = new google.maps.Marker({
                        position: myLatlng,
                        map: map,
                        title: "Property location"
                    });

                    /* - map end - */
                </script>
            </div>
    </div>
    </div>
</div>
<div class="fotter-info">
    <?php $this->load->view('common/footer.html'); ?>
</div>
<!---->

</body>
</html>