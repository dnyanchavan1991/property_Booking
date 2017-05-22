<?php
    include("db.php");
     ob_start();
    //error_reporting(0); 
    session_start();
    if(isset( $_SESSION['TrueHolidays']))
    {
            
    }
    else
    {
        echo"<script>window.location.href='../index.php/Index1/Login';</script>";	
        
    }
    $id=$_GET['id'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
       <!--  <link rel="shortcut icon" href="assets/images/favicon.ico"> -->
         <link rel="icon" href="hld.ico" type="image/x-icon">
        <!-- App title -->
        <title>HOLIDAYBAY | UPDATE OWNER INFO </title>
<!-- Date Picker Css -->
<link href="../plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <!-- Google Map -->
         <!-- Bx slider css -->
        <link href="../plugins/bx-slider/jquery.bxslider.css" rel="stylesheet" type="text/css" />
<!-- Plugins css-->
        <link href="../plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="../plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="../plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

        <!-- Jquery filer css -->
        <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
        <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>
        <script type="text/javascript">
            function checkdate(val)
            {
                //alert(val);
                    var now = document.getElementById("nowdate").value;
                    //alert(now);
                    if (val <= now) 
                    {
                      alert("Please Select Currect Date");
                      document.getElementById("datepicker-autoclose").value="";
                    }
                    else
                    {
                        document.getElementById("datepicker-autoclose").value=val;
                    }
            }
        </script>
    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                  <div class="spinner-wrapper">
                    <div class="rotator">
                      <div class="inner-spin"></div>
                      <div class="inner-spin"></div>
                    </div>
                  </div>
                </div>
            </div>
        </div>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.php" class="logo"><span>HOLIDAYBAY</span><i class="mdi mdi-cube"></i></a>
                    <!-- Image logo -->
                    <!--<a href="index.html" class="logo">-->
                        <!--<span>-->
                            <!--<img src="assets/images/logo.png" alt="" height="30">-->
                        <!--</span>-->
                        <!--<i>-->
                            <!--<img src="assets/images/logo_sm.png" alt="" height="28">-->
                        <!--</i>-->
                    <!--</a>-->
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">

                        <!-- Navbar-left -->
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                        </ul>

                        <!-- Right(Notification) -->
                        <ul class="nav navbar-nav navbar-right">
                            
                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle waves-effect waves-light user-link" data-toggle="dropdown" aria-expanded="true">
                                    <img src="happy.png" alt="user-img" class="img-circle user-img">
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li>
                                        <h5><?php echo $_SESSION['TrueHolidays'] ;?></h5>
                                    </li>
                                    <li><a href="Logout.php"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                </ul>
                            </li>

                        </ul> <!-- end navbar-right -->

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu" >
                <div class="sidebar-inner slimscrollleft" >

                    <!--- Sidemenu -->
                    <div id="sidebar-menu" >
                        <!-- User detail -->
                        <div class="user-details" >
                            <div class="overlay"></div>
                            <div class="text-center">
                                <img src="happy.png" alt="" class="thumb-md img-circle">
                            </div>
                            <div class="user-info">
                                <div>
                                    <a href="#setting-dropdown" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <?php echo $_SESSION['TrueHolidays'] ;?><span class="mdi mdi-menu-down"></span></a>
                                </div>
                            </div>
                        </div>
                        <!-- end user detail -->

                        <div class="dropdown" id="setting-dropdown">
                            <ul class="dropdown-menu">
                                <li><a href="Logout.php"><i class="mdi mdi-logout m-r-5"></i> Logout</a></li>
                            </ul>
                        </div>

                      <ul >
                            <li class="menu-title">Navigation</li>

                           <!--  <li class="has_sub">
                                <a href="index.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> Dashboard</a>
                            </li> -->
                            <li class="has_sub Active">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span>Property Management </span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="Add_Property.php">Add Property</a></li>
                                    <li class="Active"><a href="View_Property.php">View Property</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="Discount.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span>Discount Management </span> </a>
                                
                            </li>
                            <li class="has_sub Active">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span>DoD Management </span> </a>
                                <ul class="list-unstyled">
                                    <li ><a href="Add_Deals_Of_Day.php">Add Deals</a></li>
                                    <li><a href="View_Deals_Of_Day.php">View Deals</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Add Property </h4>
                                        
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                <!-- end page title end breadcrumb -->
                <?php 
                  $queryowner="select * from property_owner_info where property_id='".$id."'";
                                         $resowner=mysqli_query($con,$queryowner);
                                         $rowowner=mysqli_fetch_row($resowner);

                ?>
                  <form class="form-horizontal" role="form" action="Update_Owner_Info.php?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="card-box">
                                <div class="row">
                                    <div class="row">
                                        <h3 ><center style="color: skyblue;"> Property Owner Info</center></h3>
                                    </div>
                                    <hr>
                                            <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label" for="example-email">Name :</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="txtname" class="form-control" value="<?php  echo$rowowner[2];?>" placeholder="" >
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label">Upload Profile :</label>
                                                <div class="col-md-6">
                                                
                                                    <input type="file" name="iddoc" class="filestyle" data-size="sm" value="<?php  echo$rowowner[10];?>" >
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label">Uploaded Profile :</label>
                                                <div class="col-md-2 card-box">
                                                <?php 
                                                    $results= glob($rowowner[10].$id.'*');
                                                        $filename = $results[0];
                                                ?>
                  <center><img src="<?php echo $filename;?>" height="100px" class="img-thumbnail" width="100px" alt="img not found"></center>
                                                     
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label" for="example-email">Email :</label>
                                                <div class="col-md-6">
                                                    <input type="email" name="txtemail" class="form-control" value="<?php  echo$rowowner[5];?>" placeholder="" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="message" class="col-md-3 col-md-offset-1 control-label">Address :</label>
                                                 <div class="col-md-6 ">
                                                    <textarea id="message" class="form-control" name="txtaddress" 
                                                          data-parsley-trigger="keyup" data-parsley-minlength="10"  placeholder=" "><?php  echo$rowowner[6];?></textarea>
                                                </div>
                               				 </div>
                               				  <div class="form-group">
                                                 <label class="col-md-3 col-md-offset-1 control-label" for="example-email">Registration Date:</label>
                                                <div class="col-md-6">
                                                   <input type="text" name="txtregistrationdate" value="<?php  echo$rowowner[7];?>"
                                                    class="form-control"  readonly>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label" for="example-email">Tel/Mobile No. :</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="txtmobile" class="form-control" value="<?php  echo$rowowner[3];?>" placeholder=""  data-mask="9999999999">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label" for="example-email">Alternative Tel/Mobile No. :</label>
                                                <div class="col-md-6">
                                                   <input type="text" placeholder="" value="<?php  echo$rowowner[4];?>" name="txtmobile2" data-mask="999999" class="form-control"  data-mask="9999999999">
                                                </div>
                                            </div>
                                             
                               				  <div class="form-group">
                                                <center>
                                                    <button type="submit" name="updatePropertyowner" class="btn btn-primary waves-effect waves-light">
                                                        Save 
                                                    </button>
                                                </center>
                                            </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- end row -->
                <!-- second panel -->

                <!-- End second panel -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right fixed" style="box-shadow: 0px 0px 2px 2px #494949;">
                    <center> 2016 © Design & Developed By <a href="http://www.operandtechnologies.com" alt=" Operand Technologies">Operand Technologies </a> & IT Solutions. </center>
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>
<!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <script src="../plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <script type="text/javascript" src="../plugins/multiselect/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="../plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script src="../plugins/select2/js/select2.min.js" type="text/javascript"></script>
        <script src="../plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="../plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script src="../plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="../plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

        <script type="text/javascript" src="../plugins/autocomplete/jquery.mockjax.js"></script>
        <script type="text/javascript" src="../plugins/autocomplete/jquery.autocomplete.min.js"></script>
        <script type="text/javascript" src="../plugins/autocomplete/countries.js"></script>
        <script type="text/javascript" src="assets/pages/jquery.autocomplete.init.js"></script>

        <script type="text/javascript" src="assets/pages/jquery.form-advanced.init.js"></script>


        <!-- Rating js -->
        <script src="../plugins/raty-fa/jquery.raty-fa.js"></script>
        <!-- page init -->
        <script src="assets/pages/jquery.rating.js"></script>

        <!-- subnet Mask -->
         <script src="../plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
        <!-- <script src="../plugins/autoNumeric/autoNumeric.js" type="text/javascript"></script> -->

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <!-- Google Map -->
         <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script type="text/javascript" src="../plugins/gmaps/gmaps.js"></script>
          <!-- Bx slider js -->
        <script src="../plugins/bx-slider/jquery.bxslider.min.js"></script>
        <!-- date Picker -->
        <script src="../plugins/timepicker/bootstrap-timepicker.js"></script>
        <script src="../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="../plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/pages/jquery.form-pickers.init.js"></script>

    </body>
</html>

<?php 
 include("db.php");
    if(isset($_POST['updatePropertyowner']))
        {
            $Owner_Name=$_POST['txtname'];
            $Email=$_POST['txtemail'];
            $Address=$_POST['txtaddress'];
            $Registration_Date=$_POST['txtregistrationdate'];
            $Mobile_No1=$_POST['txtmobile'];
            $Mobile_No2=$_POST['txtmobile2'];
            /*$property_id=$_GET['id'];*/
           $result = mysqli_query($con,"SELECT * FROM property_owner_info where property_id='".$id."'");
            $row1 = mysqli_fetch_row($result);
            $property_id = $id;
             $owner_id = $row1[0];
             $fdata_mainImg = $_FILES['iddoc'];
               		
               		$path = 'Owner Profile/';
                   /* mkdir($path);*/
                    /*--upload main img--*/

                    $exetention = explode(".", $fdata_mainImg["name"]);
                    $mainImg = $property_id.".".end($exetention);
                    $mainpath=$path.$mainImg;
                    move_uploaded_file($fdata_mainImg["tmp_name"], $mainpath);
                 $query= "update  property_owner_info set property_id='".$property_id."',owner_name='".$Owner_Name."',phone='".$Mobile_No1."',alternative_phone='".$Mobile_No2."',email='".$Email."',address='".$Address."',
                    registred_date='".$Registration_Date."',
                            email_me='yes',sms_me='yes', Owner_Profile='".$path."' where owner_id='".$owner_id."'";
                    
                    $res=mysqli_query($con,$query);
                    if($res)
                    {
                        echo '<script>alert("Data  successfully Updated")</script>';
                       echo"<script>window.location.href='View_Property.php';</script>";
                    }
                    else
                    {
                        echo '<script>alert("Data  not inserted")</script>';
                    }
                    

                  
                                    

 mysqli_close();
                   
        }
    
?>