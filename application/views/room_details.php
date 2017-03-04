<!DOCTYPE HTML>
<html>

<!--head-->
<?php include('includes/head.php'); ?>
<?php
$full_name = null;
if(isset($this->session->userdata()['first_name']) && $this->session->userdata()['last_name']){
   $full_name = $this->session->userdata()['first_name'].' '.$this->session->userdata()['last_name'];
}
?>
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
                <form class="reservation-vertical clearfix" role="form" method="post"  name="reservationform" id="reservationform">
                    <div class="log">
                        <div class="row">
<!--                            --><?php //var_dump($this->session->userdata()['user_id']) ?>
                            <input type="hidden" id="login_check_field" value="<?php echo isset($this->session->userdata()['user_id']) ? $this->session->userdata()['user_id'] : '' ?>">
                            <div class="col-md-12" style="text-align:center;font-size:15px;font-weight:bold;margin-top:-15px;padding-bottom:10px;">
                                Price : Rs.<?php echo $propertyInfoDetails->property_price ?>
                            </div>
                            <div class="col-md-12">
                                <a href="#" id="booknowbtn" class="btn btn-primary btn-block" data-toggle="modal">Book Now</a>
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
                        <div class="col-sm-11 mt50" id="review_result" style="padding:0;margin-top: -5px;">

                            <h3>Reviews</h3>

                            <?php
                                if(isset($review) && !empty($review)){
                                    foreach ($review as $reviews) {
                            ?>
                                <div class="row" style="border-bottom: 1px solid #ccc;padding-bottom:15px;">
                                    <div class="col-sm-12">
                                        <h4><?php echo $reviews->customer_name ?></h4>
                                    </div>
                                    <div class="col-sm-12">
                                        <?php echo $reviews->review_text ?>
                                    </div>
                                </div>
                            <?php
                                    }
                            }else{
                                echo "<h4>No Reviews</h4>";
                                }
                            ?>

                        </div>

                    </div>
                    <div class="col-sm-5 mt50">
                        <h2 class="lined-heading"><span>Location</span></h2>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
                            <li><a href="#facilities" data-toggle="tab">Address</a></li>
                            <li><a href="#extra" data-toggle="tab">Direction</a></li>
                            <li><a href="#review" data-toggle="tab">Review</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="overview">
                               <p><h3><?php echo $propertyDetails->propertyName ?></h3></p>
                                <p><?php echo $propertyDetails->description ?></p>
                            </div>
                            <div class="tab-pane fade" id="facilities"><?php echo $propertyDetails->propertyAddress ?></div>
                            <div class="tab-pane fade" id="extra"><?php echo $propertyDetails->Direction ?></div>
                            <div class="tab-pane fade" id="review">
                                <form method="post" id="review_form">
                                    <input type="hidden" name="property_id" value="<?php echo $propertyDetails->property_id ?>">
                                    <div class="row">
                                        <div class="email_div" id="email_id_div" >
                                            <label for="email"></label> <input type="text" class="form-control" name="review_name" id="email_id" ng-model="form.email_id" placeholder="Enter Name" value="<?php echo $full_name ?>" required />
                                        </div>
                                        <div class="email_div" id="email_id_div">
                                            <label for="email"></label> <input type="email" value="<?php echo isset($this->session->userdata()['email']) ? $this->session->userdata()['email'] : '' ?>"
                                                                               class="form-control" name="review_email" id="email_id"
                                                                               ng-model="form.email_id" placeholder="Enter Email" required />
                                        </div>
                                      <div class="" id="email_id_div"  style="padding-top:20px;">
                                            <input name="review_checkin" type="text" id="" value="" class="form-control datepicker" placeholder="Check-in" required />
                                        </div>
                                        <div class="" id="email_id_div"  style="padding-top:20px;">
                                            <input name="review_checkout" type="text" id="" value="" class="form-control datepicker" placeholder="Check-out" required />
                                        </div>
                                        <div class="" id="email_id_div"  style="padding-top:20px;">
                                            Rating:
                                        </div>
                                        <div class="" id="email_id_div"  style="padding-top:20px;">
                                            <input name="rating_given" type="radio" value="5" required />Excellent &nbsp;
                                            <input name="rating_given" type="radio" value="4" required />Very Good &nbsp;
                                            <input name="rating_given" type="radio" value="3" required />Good &nbsp;
                                            <input name="rating_given" type="radio" value="2" required />Average &nbsp;
                                            <input name="rating_given" type="radio" value="1" required />Bad &nbsp;
                                        </div>
                                        <div class="" id="enquiry_div">
                                            <label for="enquiry"></label>
                                            <textarea class="form-control"
                                                      ng-model="form.enquiry" id="enquiry" name="review_given"
                                                      placeholder="Enquiry.." required="required"></textarea>
                                            <p><span id="remaining">160 characters remaining</span> <span id="messages">1 message(s)</span></p>
                                        </div>
                                        <div id="review-msg" style="padding:10px;color:green"></div>
                                        <button type="submit" class="btn btn-primary"  style="float:left">Send</button>
                                    </div>
                                </form>
                            </div>
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
                    <label for="email"></label> <input type="text" value="<?php echo $full_name ?>"                                                       class="form-control" name="full_name" id="full_name"
                                                       ng-model="form.full_name" placeholder="Full Name" />
                </div>
                <div class="email_div" id="email_id_div" style="display:none">
                    <label for="email"></label> <input type="text" value="<?php echo isset($this->session->userdata()['email']) ? $this->session->userdata()['email'] : '' ?>"
                                                       class="form-control" name="email" id="email_id"
                                                       ng-model="form.email_id" placeholder="Enter email"  />
                </div>
                    <div class="phone_number_div" id="email_id_div" style="display:none">
                <label for="email"></label> <input type="text" value="<?php echo isset($this->session->userdata()['mobile']) ? $this->session->userdata()['mobile'] : '' ?>"
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
<div class="modal fade" id="bookNow" role="dialog" style="z-index:99999">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $propertyDetails->propertyName ?></h4>
            </div>
            <div class="modal-body">
                <div id="emailalert" style="text-align: center;color: green"></div>
                <form id="bookNowForm" method="post">
                    <input type="hidden" name="property_id" value="<?php echo $propertyDetails->property_id ?>">
                    <input type="hidden" name="customer_id" value="<?php echo isset($this->session->userdata()['user_id']) ? $this->session->userdata()['user_id'] : '' ?>">
                    <div class="" id="name">
                        <select name="accomodates" class="form-control" required>
                            <option value="">Guest</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="email_div">
                        <label for="email"></label> <input type="text"
                                                           class="form-control" name="booking_email" id="email_id"
                                                           ng-model="form.email_id" placeholder="Enter email" value="<?php echo isset($this->session->userdata()['email']) ? $this->session->userdata()['email'] : '' ?>" />
                    </div>
                    <div class="" id="email_id_div"  style="padding-top:20px;">
                        <input name="booking_checkin" type="text" id="txtCheckin" value="" class="form-control" placeholder="Check-in" required="required" />
                    </div>
                    <div class="" id="email_id_div"  style="padding-top:20px;">
                        <input name="booking_checkout" type="text" id="txtCheckout" value="" class="form-control" placeholder="Check-out" required />
                    </div>

            </div>
            <div id="book-msg" style="padding:15px;text-align: center;color:green"></div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"  style="float:left">Book</button>
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
<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
<!--<script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>-->
<script>
    $( function() {
        $( ".datepicker" ).datepicker();
        var login_check_field = $('#login_check_field').val();
        $('#booknowbtn').on('click',function () {
            if(login_check_field == ''){
//                alert('Please Login before Reservation')
                window.location = "<?php echo base_url()?>/index.php/Index1/Login";
            }else{
                $('#bookNow').modal('show');
            }
        });

    } );
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
                document.getElementById('smsalert').innerHTML=data;
                document.getElementById("sendSmsForm").reset();
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
                document.getElementById("sendEmailForm").reset();
                setTimeout(function() { $('#sendEmail').modal('hide'); }, 1500);
            }
        });
    });

    $('#review_form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: '<?php echo base_url() ?>/index.php/Review/sendReview',
            type: 'POST',
            data: $('#review_form').serialize(),
            success: function(data) {
                document.getElementById('review-msg').innerHTML = "Thank you..Your Review has been send";
                $('#review_result').html(data);
                document.getElementById("review_form").reset();
            }
        });
    });
    $('#bookNowForm').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: '<?php echo base_url() ?>/index.php/BookProperty/booking',
            type: 'POST',
            data: $('#bookNowForm').serialize(),
            success: function(data) {
                document.getElementById('book-msg').innerHTML=data;
                document.getElementById("bookNowForm").reset();
            }
        });
    });

    $(document).ready(function () {
        $("#txtCheckin").datepicker({
            dateFormat: "dd/mm/yy",
            onSelect: function (date) {
                var date2 = $('#txtCheckin').datepicker('getDate');
                date2.setDate(date2.getDate());
                $('#txtCheckout').datepicker('setDate', date2);
                //sets minDate to dateofbirth date + 1
                $('#txtCheckout').datepicker('option', 'minDate', date2);
            }
        });
        $('#txtCheckout').datepicker({
            dateFormat: "dd/mm/yy",
            onClose: function () {
                var dt1 = $('#txtCheckin').datepicker('getDate');
                console.log(dt1);
                var dt2 = $('#txtCheckout').datepicker('getDate');
                if (dt2 <= dt1) {
                    var minDate = $('#txtCheckout').datepicker('option', 'minDate');
                    $('#txtCheckout').datepicker('setDate', minDate);
                }
            }
        });
    });

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmt-QMYNXcRMQMQil1v5ZBEmsuvZtLWS0&callback=initMap"></script>