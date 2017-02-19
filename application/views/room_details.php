<!DOCTYPE HTML>
<html>

<!--head-->
<?php include('includes/head.php'); ?>
 <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.sticky.js"></script>
<body>

<!-- Top header -->
<?php include('includes/header.php'); ?>
<div class="container mt50">
    <div class="col-sm-12 detail-name" >
        <h3><?php echo $propertyDetails->propertyName ?></h3>
    </div>
    <div class="row">
        <!-- Slider -->
        <section class="standard-slider room-slider">
            <div class="col-sm-12 col-md-8">
                <div id="owl-standard" class="owl-carousel">
                    <div class="item"> <a href="<?php echo $propertyDetails->imagePath ?>" data-rel="prettyPhoto[gallery1]"><img src="<?php echo base_url() ?>assets/img/holidays_img/4.jpg" alt="Image 2" class="img-responsive"></a> </div>
                    <div class="item"> <a href="<?php echo base_url() ?>assets/img/holidays_img/3.jpg" data-rel="prettyPhoto[gallery1]"><img src="<?php echo base_url() ?>assets/img/holidays_img/3.jpg" alt="Image 2" class="img-responsive"></a> </div>
                </div>
            </div>
        </section>

        <!-- Reservation form -->
        <section id="reservation-form" class="mt50 clearfix">
            <div class="col-sm-12 col-md-4">
                <form class="reservation-vertical clearfix" role="form" method="post" action="php/reservation.php" name="reservationform" id="reservationform">
                    <div class="log">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="#" class="btn btn-primary btn-block">Book Now</a>
                            </div>
                        </div>
                         <div class="row" style="padding-top:10px;">
                            <div class="col-md-6">
                                <button class="btn btn-primary btn-block" id="sendEmailbtn" type="button" data-backdrop="static" data-toggle="modal" data-target="#sendEmail">Send Email</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary btn-block" id="sendSmsbtn" type="button" data-toggle="modal" data-backdrop="static" data-target="#sendEmail">Send SMS</button>
                            </div>
                         </div>
                     </div>
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <div id="map" style="width:100%;height:300px;overflow:hidden;border:1px solid red"></div>
                    </div>
                </div>
            </div>
        </section>
<!--        <section id="reservation-form" class="mt50 clearfix" style="z-index:-99999">-->

<!--        </section>-->

        <!-- Room Content -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-7 mt50">
                        <h2 class="lined-heading"><span>About the Property</span></h2>
                        <h3 class="mt50">Overview</h3>
                        <table class="table table-striped mt30">
                            <tbody>
                            <tr>
                                <td><i class="fa fa-check-circle"></i> No. of Rooms - <?php echo $propertyInfoDetails->bedrooms; ?></td>
                                <td><i class="fa fa-check-circle"></i> No. of Bathrooms - <?php echo $propertyInfoDetails->bathrooms; ?></td>
                                <td><i class="fa fa-check-circle"></i> Internet Access - <?php echo $propertyInfoDetails->internet_access; ?></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-check-circle"></i>Meal - <?php echo $propertyInfoDetails->meals; ?></td>
                                <td><i class="fa fa-check-circle"></i>Television - <?php echo $propertyInfoDetails->television; ?></td>
                                <td><i class="fa fa-check-circle"></i>Pet Friendly - <?php echo $propertyInfoDetails->pet_friendly; ?></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-check-circle"></i>Air Condition - <?php echo $propertyInfoDetails->air_condition; ?></td>
                                <td><i class="fa fa-check-circle"></i>In house kitchen - <?php echo $propertyInfoDetails->in_house_kitchen; ?></td>
                                <td><i class="fa fa-check-circle"></i>Accommodates - <?php echo $propertyInfoDetails->accommodates; ?></td>
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
                            <li><a href="#facilities" data-toggle="tab">Address</a></li>
                            <li><a href="#extra" data-toggle="tab">Direction</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="overview">
                               <p><h3><?php echo $propertyDetails->propertyName ?></h3></p>
                                <p><?php echo $propertyDetails->description ?></p>
                            </div>
                            <div class="tab-pane fade" id="facilities"><?php echo $propertyDetails->propertyAddress ?></div>
                            <div class="tab-pane fade" id="extra"><?php echo $propertyDetails->Direction ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- Footer -->
<?php include('includes/footer.php'); ?>

<!-- Go-top Button -->
<div id="go-top"><i class="fa fa-angle-up fa-2x"></i></div>
<!--<div class="col-sm-12 col-md-6" style="z-index: -99999">
    <div id="map" style="width:100%;height:100%;overflow:hidden;border:1px solid red"></div>
</div>-->
<div class="modal fade" id="sendEmail" role="dialog" style="z-index:99999">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $propertyDetails->propertyName ?></h4>
            </div>
            <div class="modal-body">
                <div id="emailalert" style="text-align: center;color: green"></div>
                <form id="sendEmailForm" method="post">
                    <input type="hidden" name="property_id" value="<?php echo $propertyDetails->property_id ?>">
                    <div class="" id="name">
                    <label for="email"></label> <input type="text"
                                                       class="form-control" name="full_name" id="full_name"
                                                       ng-model="form.full_name" placeholder="Full Name" />
                </div>
                <div class="email_div" id="email_id_div" style="display:none">
                    <label for="email"></label> <input type="text"
                                                       class="form-control" name="email" id="email_id"
                                                       ng-model="form.email_id" placeholder="Enter email"  />
                </div>
                    <div class="phone_number_div" id="email_id_div" style="display:none">
                <label for="email"></label> <input type="text"
                                                   class="form-control" name="phone" id="email_id"
                                                   ng-model="form.email_id" placeholder="Enter Number"  />
            </div>
                    <div class="" id="email_id_div"  style="padding-top:20px;">
                        <input name="checkIn" type="text" id="checkin" value="" class="form-control checkin" placeholder="Check-in" required="required" />
                    </div>
                    <div class="" id="email_id_div"  style="padding-top:20px;">
                        <input name="checkOut" type="text" id="checkout" value="" class="form-control checkout" placeholder="Check-out"/>
                    </div>
                <div class="" id="enquiry_div">
                    <label for="enquiry"></label>
                    <textarea class="form-control"
                              ng-model="form.enquiry" id="enquiry" name="enquiry"
                              placeholder="Enquiry.." required="required"></textarea>
                    <p><span id="remaining">160 characters remaining</span> <span id="messages">1 message(s)</span></p>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"  style="float:left">Send</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>
<!--<script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>-->
<script>
    function initMap() {
        var LatLang = {lat:<?php echo $propertyInfoDetails->latitude; ?>, lng:<?php echo $propertyInfoDetails->longitude; ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: LatLang
        });
//        map.setOptions({draggable: false});
        var contentString = '<?php echo $propertyDetails->propertyName ?>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        var marker = new google.maps.Marker({
            position: LatLang,
            map: map,
            title: 'Property Location'
        });
        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });
    }
    $('#sendEmailbtn').on('click',function(){
        $('.phone_number_div').hide();
        $('.email_div').show();
        $('.email_div input').prop('required',true);

//        $('.email_div input').attr('required',true);​​​​​
    });

    $('#sendSmsbtn').on('click',function() {
        $('.phone_number_div').show();
        $('.email_div').hide();
        $('.phone_number_div input').prop('required',true);
//        $('.phone_number_div input').attr('required',true);

    });

    $('#sendSmsForm').on('submit', function (e) {
         e.preventDefault();
        $.ajax({
            url: '<?php echo base_url()?>index.php/Contact/sendEmail',
            type: 'POST',
            data: $('#sendSmsForm').serialize(),
            success: function(data) {
                console.log(data);
                document.getElementById('smsalert').innerHTML=data;
            }
        });
    });

    $('#sendEmailForm').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: '<?php echo base_url()?>index.php/Contact/sendEmail',
            type: 'POST',
            data: $('#sendEmailForm').serialize(),
            success: function(data) {
                document.getElementById('emailalert').innerHTML=data;
            }
        });
    });


</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmt-QMYNXcRMQMQil1v5ZBEmsuvZtLWS0&callback=initMap"></script>t>
</script>