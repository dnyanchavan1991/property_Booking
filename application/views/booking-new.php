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

    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link href="css/new-theme/owl.carousel.css" rel="stylesheet">

    <script src="js/jquery-ui.js"></script>
    <script src="js/new-theme/jquery.min.js"></script>
    <script src="js/new-theme/owl.carousel.js"></script>
	
    <script src="js/new-theme/bootstrap.js"></script>
    <script type="text/javascript" src="js/angular.min.js"></script>
    <script type="text/javascript" src="js/angular-messages.min.js"></script>
    <script type="text/javascript" src="js/controller/accomodationController.js"></script>

    <script type="text/javascript" src="js/global/global_url_variable.js"></script>
    <script type="text/javascript" src="js/global/global_functions.js"></script>
    <script type="text/javascript">
         
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
</head>
<body ng-app="accomodationApp" >
<!--header starts-->
<div class="header">
    <?php $this->load->view('common/header.php'); ?>
</div>

<!---strat-date-piker---->
<script src="js/new-theme/jquery.min.js"></script>
<script type="text/javascript">
    $(function() { 
        $("#checkin_id").datepicker({
            dateFormat: "dd/mm/yy",
            minDate:  0,
            onClose: function(date){
                var date1 = $('#checkin_id').datepicker('getDate');
                var date = new Date( Date.parse( date1 ) );
                date.setDate( date.getDate() + 1 );
                var newDate = date.toDateString();
                newDate = new Date( Date.parse( newDate ) );
                $('#checkout_id').datepicker("option","minDate",newDate);
            }
        }); 
    });

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

<div class="rooms text-center">
    <div class="container">
        <h4 class="booking-title">Booking for </h4><h3 class="tittle-one"><?php echo $property_name;?></h3>
        <div class="reservation-form">
            <div class="col-md-3 reservation-left">
                <?php
                $i=1;
                $count=1;
                $files = glob('Admin/'.$image_path."*.*");
                foreach ($files as $image_files) {
                    ?>
                    <div class="item text-center image-grid property-grid">
                        <ul>
                            <?php
                            for ($count=1; $count<2; $count++)
                            {
                                if($i<count($files)){
                                    $image = $files[$i];
                                    $supported_file = array(
                                        'gif',
                                        'jpg',
                                        'jpeg',
                                        'png'
                                    );
                                    $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
                                    if (in_array($ext, $supported_file))
                                    { ?>
                                        <li><img src="<?php echo $image;?>" alt=""></li>
                                        <?php
                                        $i++;
                                    }
                                    else
                                    {
                                        continue;
                                    }
                                }
                            }?>
                        </ul>
                    </div>
                <?php   } ?>
                <!--<ul>
                    <?php
/*                    $files = glob('Admin/'.$image_path."*.*");
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
                        {
                            echo "<li>";
                            echo "<img src='".$image."' alt=''/>";
                            echo "</li>";
                        }
                        if($i == 3)
                        {
                            break;
                        }
                    }
                    */?>
                </ul>-->
            </div>
            <div class="col-md-9 reservation-right">
                <form name="form" role="form" ng-controller="roomAvailabilityController" ng-submit="getRoomAvalabilityCount()" class="form-horizontal">
                    <!--<h4>When would you like to come?</h4>-->
                    <?php if(isset($name) && isset($email_address)){?>
                        <div class="form-group">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" ng-model="cust_name" name="cust_name" ng-init="cust_name='<?php echo $name;?>'" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-7">
                                <input type="email" class="form-control" ng-model="cust_email" name="cust_email" ng-init="cust_email='<?php echo $email_address;?>'" readonly />
                            </div>
                        </div>
                    <?php } else{?>
                        <div class="form-group">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" ng-model="cust_name" name="cust_name" Placeholder="Enter name" ng-required="true"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-7">
                                <input type="email" class="form-control" ng-model="cust_email" name="cust_email" Placeholder="Enter email" ng-required="true"/>
                            </div>
                        </div>
                    <?php }?>
                    <div class="form-group">
                        <label class="control-label col-md-3">Check In</label>
                        <div class="col-md-7">
                            <input type="text" class="date form-control" id="checkin_id" ng-model="checkin" name="checkin" Placeholder="Check-In date" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Check Out</label>
                        <div class="col-md-7">
                            <input type="text" class="date form-control" id="checkout_id" ng-model="checkout" name="checkout" Placeholder="Check-Out date" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Guests</label>
                        <div class="col-md-7">
                            <input type="number" class="form-control" ng-model="accomodates" name="accomodates" min="1" max="15" Placeholder="No. of guests" required />
                        </div>
                    </div><br>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-success">Reserve</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="fotter-info">
    <?php $this->load->view('common/footer.html'); ?>
</div>
<!---->
<script>

</script>
</body>
</html>