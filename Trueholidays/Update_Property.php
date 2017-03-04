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
        echo"<script>window.location.href='Login.php';</script>";
        
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
         <link rel="icon" href="sml.ico" type="image/x-icon">
        <!-- App title -->
        <title>Training | Portal </title>
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
                    <a href="index.php" class="logo"><span>True<span>Holidays</span></span><i class="mdi mdi-cube"></i></a>
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
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span class="badge badge-success pull-right">2</span> <span></span>Property Mng </span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="Add_Property.php">Add Property</a></li>
                                    <li><a href="View_Property.php">View Property</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="Discount.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span>Discount Mgmt </span> </a>
                                
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
                        <?php 
                            $query="select * from property where property_id='".$id."'";
                            $res=mysql_query($query);
                            $row=mysql_fetch_row($res);
                        ?>

                <!-- end page title end breadcrumb -->
                  <form class="form-horizontal" role="form" action="Update_Property.php?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="card-box">
                                <div class="row">
                                    <div class="row">
                                        <h3 ><center style="color: skyblue;">Mandatory</center></h3>
                                    </div>
                                    <hr>
                                        <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label">Select Property :</label>
                                                <div class="col-md-6">
                                                    <select class="selectpicker"  data-live-search="true" data-size="2" data-style="btn-default" name="txtselectproperty">
                                                    <option value="0">Select Property</option>
                                                        <?PHP
                                                            $query11="select * from property_type  where property_type_id='".$row[11]."'";
                                                            $res11=mysql_query($query11);
                                                            $row11=mysql_fetch_row($res11);
                                                              echo"<option value=".$row11[0]." selected>".$row11[1]."</option>";
                                                            $query1="select * from property_type";
                                                            $res1=mysql_query($query1);
                                                            while ($row1=mysql_fetch_row($res1)) 
                                                            {
                                                                 echo"<option value=".$row1[0].">".$row1[1]."</option>";
                                                            }
                                                           
                                                           
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label" for="example-email">Name :</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="txtpropertyname" class="form-control" value="<?php echo $row[1];?>" placeholder="" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label" for="example-email">Street :</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="txtstreet" class="form-control" value="<?php echo $row[2];?>" placeholder="" >
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label" for="example-email">City :</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="txtcity" class="form-control" value="<?php echo $row[3];?>" placeholder="" >
                                                </div>
                                            </div>
                                              <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label">Select State :</label>
                                                <div class="col-md-6">
                                                    <select class="selectpicker" data-live-search="true" data-size="3" data-style="btn-default" name="txtselectstate">
                                                        <option value="<?php echo $row[6];?>" selected><?php echo $row[6];?></option>
                                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                        <option value="Assam">Assam</option>
                                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                        <option value="Bihar">Bihar</option>
                                                        <option value="Chandigarh">Chandigarh</option>
                                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                                        <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                                        <option value="Daman and Diu">Daman and Diu</option>
                                                        <option value="Delhi">Delhi</option>
                                                        <option value="Goa">Goa</option>
                                                        <option value="Gujarat">Gujarat</option>
                                                        <option value="Haryana">Haryana</option>
                                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                        <option value="Jharkhand">Jharkhand</option>
                                                        <option value="Karnataka">Karnataka</option>
                                                        <option value="Kerala">Kerala</option>
                                                        <option value="Lakshadweep">Lakshadweep</option>
                                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                        <option value="Maharashtra">Maharashtra</option>
                                                        <option value="Manipur">Manipur</option>
                                                        <option value="Meghalaya">Meghalaya</option>
                                                        <option value="Mizoram">Mizoram</option>
                                                        <option value="Nagaland">Nagaland</option>
                                                        <option value="Orissa">Orissa</option>
                                                        <option value="Pondicherry">Pondicherry</option>
                                                        <option value="Punjab">Punjab</option>
                                                        <option value="Rajasthan">Rajasthan</option>
                                                        <option value="Sikkim">Sikkim</option>
                                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                                        <option value="Telangana">Telangana</option>
                                                        <option value="Tripura">Tripura</option>
                                                        <option value="Uttaranchal">Uttaranchal</option>
                                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                        <option value="West Bengal">West Bengal</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label" for="example-email">PIN Code :</label>
                                                <div class="col-md-6">
                                                   <input type="text" placeholder="" name="txtpincode" data-mask="999999" class="form-control" value="<?php echo $row[4];?>" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 <label class="col-md-3 col-md-offset-1 control-label" for="example-email">Star Rating :</label>
                                                   <div class="col-md-3" >
                                                       <h4> <div id="click" ></div></h4>
                                                        <input type="hidden" name="rating" id="rate"  value="<?php echo $row[5];?>">
                                                    </div>
                                                    <div class="col-md-3" >
                                                    <label class="control-label">Star Rated :</label>
                                                    
                                                     <?php 
                                                             for($i=1; $i<=$row[5]; $i++)
                                                             {
                                                                echo'<i class="fa fa-star text-warning"></i>';
                                                             }
                                                        ?>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label">Upload Images :</label>
                                                <div class="col-md-8">
                                                    <input type="file" name="iddoc" class="filestyle" value="<?php echo $row[8];?>" data-size="sm">
                                                    <input type="text" name="imgpath" value="<?php echo $row[8];?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label">Uploaded Images :</label>
                                                <div class="col-md-2 card-box">
                                                <?php 
                                                    $results= glob($row[8].'mainImage*');
                                                        $filename = $results[0];
                                                ?>
                                                    <img src="<?php echo $filename;?>" height="100px" class="img-thumbnail" width="100px" alt="img not found">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                               <label class="col-md-3 col-md-offset-1 control-label">Upload Gallery :</label>
                                                <div class="col-md-6">
                                                        <input type="file" name="gallery[]" class="filestyle"
                                                           multiple="multiple" data-size="sm">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label">Uploaded Gallery :</label>
                                                <div class="col-md-6 card-box">
                                                <?php 
                                                     $images1 = glob($row[8] . "*");
                                                 $c=0;
                                                        foreach($images1 as $image1)
                                                        {
                                                             echo'<img src="'.$image1.'" height="100px" class="img-thumbnail" width="100px" alt="img not found">';
                                                        }
                                                ?>
                                            </div>

                                           <div class="form-group">
                                                        <label for="message" class="col-md-3 col-md-offset-1 control-label">Description :</label>
                                                         <div class="col-md-6 ">
                                                            <textarea id="message" class="form-control" name="txtdescription" 
                                                                  data-parsley-trigger="keyup" data-parsley-minlength="10"  placeholder=" ">
                                                                  <?php echo $row[9];?></textarea>
                                                        </div>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="card-box">
                                <div class="row">
                                    <div class="row">
                                        <h3><center style="color: skyblue;"> Features and Facilities (Optional)</center></h3>
                                    </div>
                                    <hr>
                                    <?php 
                                                $querypropertyinfo="select * from property_info where property_id='".$id."'";
                                                $respropertyinfo=mysql_query($querypropertyinfo);
                                                $rowpropertyinfo=mysql_fetch_row($respropertyinfo);
                                        ?>
                                    <div class="form-group">
                                            <label for="message" class="col-md-3 col-md-offset-1 control-label">Map Location :</label>
                                             <div class="col-md-6">
                                              <div id="map" style='height: 200px;max-width:100%;'></div>
                                               <input class="form-control" type="text" name="txtlatitude" id="latbox" value="<?php echo $rowpropertyinfo[23];?>" readonly>
                                                <input class="form-control" type="text" name="txtlongitude" id="lngbox" value="<?php echo $rowpropertyinfo[24];?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="message" class="col-md-3 col-md-offset-1 control-label">How TO Reach :</label>
                                                 <div class="col-md-6 ">
                                                    <textarea id="message" class="form-control" name="txthowtoreach" 
                                                          data-parsley-trigger="keyup" data-parsley-minlength="10"  placeholder=" "> <?php echo $row[10];?></textarea>
                                                </div>
                                        </div>
                                        
                                            <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label">Bedrooms :</label>
                                                <div class="col-md-6">
                                                    <select class="selectpicker"  data-live-search="true" data-size="2" data-style="btn-default" name="txtselectbedrooms">
                                                    <option value="<?php echo $rowpropertyinfo[1];?>"><?php echo $rowpropertyinfo[1]?></option>
                                                      <?php 
                                                        for($bedrooms=1; $bedrooms<=10; $bedrooms++)
                                                        {
                                                           echo'<option value='.$bedrooms.'>'.$bedrooms.'</option>';
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label">Beds :</label>
                                                <div class="col-md-6">
                                                    <select class="selectpicker"  data-live-search="true" data-size="2" data-style="btn-default" name="txtselectbeds">
                                                    <option value="<?php echo $rowpropertyinfo[12];?>"><?php echo $rowpropertyinfo[1];?></option>
                                                      <?php 
                                                        for($beds=1; $beds<=15; $beds++)
                                                        {
                                                           echo'<option value='.$beds.'>'.$beds.'</option>';
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label">Bathrooms :</label>
                                                <div class="col-md-6">
                                                    <select class="selectpicker"  data-live-search="true" data-size="2" data-style="btn-default" name="txtselectbathrooms">
                                                    <option value="<?php echo $rowpropertyinfo[2];?>"><?php echo $rowpropertyinfo[2];?></option>
                                                               <?php 
                                                                    for($bathrooms=1; $bathrooms<=10; $bathrooms++)
                                                                    {
                                                                       echo'<option value='.$bathrooms.'>'.$bathrooms.'</option>';
                                                                    }
                                                                ?>
                                                    </select>
                                                </div>  
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label">Accommodates :</label>
                                                <div class="col-md-6">
                                                    <select class="selectpicker"  data-live-search="true" data-size="2" data-style="btn-default" name="txtselectaccommodates">
                                                    <option value="<?php echo $rowpropertyinfo[13];?>"><?php echo $rowpropertyinfo[13];?></option>
                                                    <?php 
                                                        for($i=1; $i<=25; $i++)
                                                        {
                                                           echo'<option value='.$i.'>'.$i.'</option>';
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>

                                            
                                            <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label" for="example-email">Meals :</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="txtmeals" class="form-control" value="<?php echo $rowpropertyinfo[4];?>" placeholder="" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label" for="example-email"></label>
                                                <div class="col-md-3">
                                                    <div class="checkbox checkbox-primary m-b-15">
                                                    <?php 
                                                    if($rowpropertyinfo[3]=="Yes")
                                                    {
                                                         echo'<input id="chkbox1" type="checkbox" name="txtswimmingpool" value="Yes" checked>
                                                       
                                                        <label for="checkbox1">
                                                            Swimming pool
                                                        </label>'; 
                                                    }
                                                    else
                                                    {
                                                        echo'<input id="chkbox1" type="checkbox" name="txtswimmingpool" value="No">
                                                       
                                                        <label for="checkbox1">
                                                            Swimming pool
                                                        </label>';
                                                    }  
                                                    ?>
                                                    </div>
                                                   
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="checkbox checkbox-primary m-b-15">
                                                    <?php  
                                                    if($rowpropertyinfo[5]=="Yes")
                                                    {
                                                       echo' <input id="checkbox1" type="checkbox" name="txtinternet" value="Yes" checked>
                                                        <label for="checkbox1">
                                                            Internet / WIFI
                                                        </label>';
                                                    }
                                                    else
                                                    {
                                                        echo' <input id="checkbox1" type="checkbox" name="txtinternet" value="No" >
                                                        <label for="checkbox1">
                                                            Internet / WIFI
                                                        </label>';
                                                    }
                                                    ?>
                                                    </div>
                                                </div>
                                                <label class="col-md-3 col-md-offset-1 control-label" for="example-email"></label>
                                                <div class="col-md-3">
                                                    <div class="checkbox checkbox-primary m-b-15">
                                                    <?php 
                                                    if ($rowpropertyinfo[6]=="Yes") 
                                                    {
                                                       echo' <input id="checkbox1" type="checkbox" name="txtsmokingallowed" value="Yes" checked>
                                                        <label for="checkbox1">
                                                            Smoking Allowed
                                                        </label>';
                                                    }
                                                    else
                                                    {
                                                        echo' <input id="checkbox1" type="checkbox" name="txtsmokingallowed" value="No" >
                                                        <label for="checkbox1">
                                                            Smoking Allowed
                                                        </label>';
                                                    }
                                                    ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="checkbox checkbox-primary m-b-15">
                                                    <?php
                                                    if($rowpropertyinfo[7]=="Yes")
                                                    {
                                                       echo'<input id="checkbox1" type="checkbox" name="txtcabletv" value="Yes" checked>
                                                        <label for="checkbox1">
                                                            Cable TV  
                                                        </label>'; 
                                                    }
                                                    else
                                                    {
                                                        echo'<input id="checkbox1" type="checkbox" name="txtcabletv" value="No">
                                                        <label for="checkbox1">
                                                            Cable TV  
                                                        </label>'; 
                                                    }
                                                        

                                                        ?>
                                                    </div>
                                                </div>
                                                <label class="col-md-3 col-md-offset-1 control-label" for="example-email"></label>
                                                <div class="col-md-3">
                                                    <div class="checkbox checkbox-primary m-b-15">
                                                    <?php
                                                    if($rowpropertyinfo[8]=="Yes")
                                                    {
                                                        echo'<input id="checkbox1" type="checkbox" name="txtpetfriendly" value="Yes" checked>
                                                        <label for="checkbox1">
                                                            Pet friendly
                                                        </label>';
                                                    }
                                                    else
                                                    {
                                                        echo'<input id="checkbox1" type="checkbox" name="txtpetfriendly" value="No">
                                                        <label for="checkbox1">
                                                            Pet friendly
                                                        </label>';
                                                    }?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="checkbox checkbox-primary m-b-15">
                                                    <?php
                                                    if($rowpropertyinfo[9]=="Yes")
                                                    {
                                                        echo'<input id="checkbox1" type="checkbox" name="txtairconditioning" value="Yes" checked>
                                                        <label for="checkbox1">
                                                            Air Conditioning
                                                        </label>';
                                                    }
                                                    else
                                                    {
                                                        echo'<input id="checkbox1" type="checkbox" name="txtairconditioning" value="No">
                                                        <label for="checkbox1">
                                                            Air Conditioning
                                                        </label>';

                                                    }?>
                                                    </div>
                                                </div>
                                                <label class="col-md-3 col-md-offset-1 control-label" for="example-email"></label>
                                                <div class="col-md-3">
                                                    <div class="checkbox checkbox-primary m-b-15">
                                                     <?php
                                                    if($rowpropertyinfo[22]=="Yes")
                                                    {
                                                       echo' <input id="checkbox1" type="checkbox" name="txtpaymentfacility" value="Yes" checked>
                                                        <label for="checkbox1">
                                                           Payment Facility
                                                        </label>';
                                                    }
                                                    else
                                                    {
                                                         echo' <input id="checkbox1" type="checkbox" name="txtpaymentfacility" value="No">
                                                        <label for="checkbox1">
                                                           Payment Facility
                                                        </label>';
                                                    }?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="checkbox checkbox-primary m-b-15">
                                                     <?php
                                                    if($rowpropertyinfo[10]=="Yes")
                                                    {
                                                       echo' <input id="checkbox1" type="checkbox" name="txtkitchen" value="Yes" checked>
                                                        <label for="checkbox1">
                                                            In House Kitchen
                                                        </label>';
                                                    }
                                                    else
                                                    {
                                                        echo' <input id="checkbox1" type="checkbox" name="txtkitchen" value="No">
                                                        <label for="checkbox1">
                                                            In House Kitchen
                                                        </label>';
                                                    }
                                                    ?>
                                                    </div>
                                                </div>
                                                <label class="col-md-3 col-md-offset-1 control-label" for="example-email"></label>
                                                <div class="col-md-3">
                                                    <div class="checkbox checkbox-primary m-b-15">
                                                    <?php
                                                    if($rowpropertyinfo[10]=="Yes")
                                                    {
                                                        echo'<input id="checkbox1" type="checkbox" name="txtrestaurant" value="Yes" checked>
                                                        <label for="checkbox1">
                                                           Restaurant
                                                        </label>';
                                                    }
                                                    else
                                                    {
                                                        echo'<input id="checkbox1" type="checkbox" name="txtrestaurant" value="No">
                                                        <label for="checkbox1">
                                                           Restaurant
                                                        </label>';
                                                    }
                                                    ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="checkbox checkbox-primary m-b-15">
                                                     <?php
                                                    if($rowpropertyinfo[14]=="Yes")
                                                    {
                                                        echo'<input id="checkbox1" type="checkbox" name="txtparking" value="Yes" checked>
                                                        <label for="checkbox1">
                                                            Free Parking
                                                        </label>';
                                                    }
                                                    else
                                                    {
                                                        echo'<input id="checkbox1" type="checkbox" name="txtparking" value="No">
                                                        <label for="checkbox1">
                                                            Free Parking
                                                        </label>';
                                                    }
                                                    ?>
                                                    </div>
                                                </div>
                                                <label class="col-md-3 col-md-offset-1 control-label" for="example-email"></label>
                                                <div class="col-md-3">
                                                    <div class="checkbox checkbox-primary m-b-15">
                                                    <?php
                                                    if($rowpropertyinfo[15]=="Yes")
                                                    {
                                                       echo' <input id="checkbox1" type="checkbox" name="txtfirstaidavaliable" value="Yes" checked>
                                                        <label for="checkbox1">
                                                           First Aid Available
                                                        </label>';
                                                    }
                                                    else
                                                    {
                                                         echo' <input id="checkbox1" type="checkbox" name="txtfirstaidavaliable" value="No">
                                                        <label for="checkbox1">
                                                           First Aid Available
                                                        </label>';
                                                    }
                                                    ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="checkbox checkbox-primary m-b-15">
                                                    <?php
                                                    if($rowpropertyinfo[25]=="Yes")
                                                    {
                                                        echo'<input id="checkbox1" type="checkbox" name="txtfreebreakfast" value="Yes" checked>
                                                        <label for="checkbox1">
                                                           Free BreakFast
                                                        </label>';
                                                    }
                                                    else
                                                    {
                                                         echo'<input id="checkbox1" type="checkbox" name="txtfreebreakfast" value="No">
                                                        <label for="checkbox1">
                                                           Free BreakFast
                                                        </label>';
                                                    }
                                                    ?>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label" for="example-email">Entertainment :</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="txtentertainment" class="form-control" value="<?php echo $rowpropertyinfo[16];?>" placeholder="Enter Entertainment" >
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label" for="example-email">Other Amenities :</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="txtotheramenities" class="form-control" value="<?php echo $rowpropertyinfo[17];?>" placeholder="Enter Other Amenities" >
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label" for="example-email">Theme :</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="txttheme" class="form-control" value="<?php echo $rowpropertyinfo[18];?>" placeholder="Enter Theme" >
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label" for="example-email">Attractions :</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="txtattractions" class="form-control" value="<?php echo $rowpropertyinfo[19];?>" placeholder="Enter Attractions" >
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label" for="example-email">Leisure Activities :</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="txtleisure" class="form-control" value="<?php echo $rowpropertyinfo[20];?>" placeholder="Enter Leisure Activities" >
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-3 col-md-offset-1 control-label" for="example-email">General :</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="txtgeneral" class="form-control" value="<?php echo $rowpropertyinfo[21];?>" placeholder="Enter General" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 <label class="col-md-3 col-md-offset-1 control-label" for="example-email">Featured :</label>
                                                <div class="col-md-6">
                                                    <select class="selectpicker" data-style="btn-default" name="txtfeatured" >
                                                    <option value="<?php echo $rowpropertyinfo[26];?>"><?php echo $rowpropertyinfo[26];?></option>
                                                        <option value='Yes'>YES</option>
                                                        <option value='No'>NO</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                 <label class="col-md-3 col-md-offset-1 control-label" for="example-email">Featured Start Date:</label>
                                                <div class="col-md-6">
                                                   <input type="text" name="txtfeaturedstartdate" value="<?php echo $rowpropertyinfo[27];?>" id="nowdate" class="form-control"  readonly>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                 <label class="col-md-3 col-md-offset-1 control-label" for="example-email">Featured Start Date:</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose" name="txtfeaturedenddate" onchange="checkdate(this.value);"  value="<?php echo $rowpropertyinfo[28];?>">
                                                        <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                                    </div><!-- input-group -->
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 <label class="col-md-3 col-md-offset-1 control-label" for="example-email">Price:</label>
                                                <div class="col-md-6">
                                                   <input type="number" name="txtprice" value="<?php echo $rowpropertyinfo[29];?>"  class="form-control" required="true" >
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <center>
                                                    <button type="submit" name="updateProperty" class="btn btn-primary waves-effect waves-light">
                                                        Save And Next
                                                    </button>
                                                </center>
                                            </div>
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
                    <center> 2016 © Design & Developed By <a href="http://www.operandtechnologies.com" alt=" Operand Technologies" target="_blank">Operand Technologies </a> & IT Solutions. </center>
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->
        <?php 
$querypropertyinfo="select * from property_info where property_id='".$id."'";
$respropertyinfo=mysql_query($querypropertyinfo);
$rowpropertyinfo=mysql_fetch_row($respropertyinfo);
        ?>
<script>
      var map;
      var marker;
      var infowindow;
      var messagewindow;

      function initMap() {
        var california = {lat: <?php echo $rowpropertyinfo[23];?>, lng: <?php echo $rowpropertyinfo[24];?>};
        map = new google.maps.Map(document.getElementById('map'), {
          center: california,
          zoom: 13
        });


        google.maps.event.addListener(map, 'click', function(event) {
          if(marker != null)
          {
          marker.setMap(null);
           marker = new google.maps.Marker({
            position: event.latLng,
            map: map
            });
           }
           else
           {
              marker = new google.maps.Marker({
            position: event.latLng,
            map: map
            });
           }
       
          
          document.getElementById("latbox").value = marker.getPosition().lat();
      document.getElementById("lngbox").value = marker.getPosition().lng();
            

          /*google.maps.event.addListener(map, 'click', function() {
            alert(marker.getPosition());
          //  infowindow.open(map, marker);
          });*/
        });
      }

     


    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzpzoU4KUQ4Wa0ElfjKMUFDFxbep7wlMI&callback=initMap">
    </script>


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
    if(isset($_POST['updateProperty']))
        {
            $Select_Property=$_POST['txtselectproperty'];
            $Property_Name=$_POST['txtpropertyname'];
            $Street=$_POST['txtstreet'];
            $City=$_POST['txtcity'];
            $Select_State=$_POST['txtselectstate'];
            $Pincode=$_POST['txtpincode'];
            $Rating=$_POST['rating'];
            $Country="India";
            $Description=$_POST['txtdescription'];
            $Latitude=$_POST['txtlatitude'];
            $Longitude=$_POST['txtlongitude'];
            $How_To_Reach=$_POST['txthowtoreach'];

                $Select_bedrooms=$_POST['txtselectbedrooms'];
                $Select_beds=$_POST['txtselectbeds'];
                $Select_bathrooms=$_POST['txtselectbathrooms'];
                $Select_accommodates=$_POST['txtselectaccommodates'];
            $Meals=$_POST['txtmeals'];
           /* $Swimming_Pool=$_POST['txtswimmingpool'];
            $Internet=$_POST['txtinternet'];
            $Smoking=$_POST['txtsmokingallowed'];
            $Cable_TV=$_POST['txtcabletv'];
            $Pet_Friendly=$_POST['txtpetfriendly'];
            $Air_Contitioning=$_POST['txtairconditioning'];
            $Payment_Facility=$_POST['txtpaymentfacility'];
            $Kitchen=$_POST['txtkitchen'];
            $Restaurant=$_POST['txtrestaurant'];
            $Parking=$_POST['txtparking'];
            $First_Aid_Avaliable=$_POST['txtfirstaidavaliable'];
            $Free_Breakfast=$_POST["txtfreebreakfast"];*/
            if( isset($_POST["txtswimmingpool"]) ){ $Swimming_Pool="Yes";} else {  $Swimming_Pool="No";}
            if( isset($_POST["txtinternet"]) ){ $Internet="Yes";} else {  $Internet="No";}
            if(isset($_POST["txtsmokingallowed"])){$Smoking="Yes";}else{$Smoking="No";}
            if(isset($_POST["txtcabletv"])){$Cable_TV="Yes";}else{$Cable_TV="No";}
            if(isset($_POST["txtpetfriendly"])){$Pet_Friendly="Yes";}else{$Pet_Friendly="No";}
            if(isset($_POST["txtairconditioning"])){$Air_Contitioning="Yes";}else{$Air_Contitioning="No";}
            if(isset($_POST["txtpaymentfacility"])){$Payment_Facility="Yes";}else{$Payment_Facility="No";}
            if(isset($_POST["txtkitchen"])){$Kitchen="Yes";}else{$Kitchen="No";}
            if(isset($_POST["txtrestaurant"])){$Restaurant="Yes";}else{$Restaurant="No";}
            if(isset($_POST["txtparking"])){$Parking="Yes";}else{$Parking="No";}
            if(isset($_POST["txtfirstaidavaliable"])){$First_Aid_Avaliable="Yes";}else{$First_Aid_Avaliable="No";}
            if(isset($_POST["txtfreebreakfast"])){$Free_Breakfast="Yes";}else{$Free_Breakfast="No";}

            $Entertainment=$_POST['txtentertainment'];
            $Other_Amenities=$_POST['txtotheramenities'];
            $Theme=$_POST['txttheme'];
            $Attractions=$_POST['txtattractions'];
            $Leisure=$_POST['txtleisure'];
            $General=$_POST['txtgeneral'];
            $Featured=$_POST['txtfeatured'];
            $Featured_Start_Date=$_POST['txtfeaturedstartdate'];
            $Featured_End_Date=$_POST['txtfeaturedenddate'];
            $Price=$_POST['txtprice'];

             $result = mysql_query("SELECT MAX(property_id) FROM property");
            $row1 = mysql_fetch_row($result);
            $property_id = $row1[0]+1;

            /*$query= "INSERT INTO property_info values('".$property_id."','".$Select_bedrooms."','".$Select_bathrooms."','".$Swimming_Pool."','".$Meals."','".$Internet."','".$Smoking."','".$Cable_TV."','".$Pet_Friendly."','".$Air_Contitioning."','".$Kitchen."','".$Restaurant."','".$Select_beds."','".$Select_accommodates."','".$Parking."','".$First_Aid_Avaliable."',
            '".$Entertainment."','".$Other_Amenities."','".$Theme."','".$Attractions."','".$Leisure."','".$General."','".$Payment_Facility."','".$latitude."','".$latitude."',
            '".$Free_Breakfast."','".$Featured."','".$Featured_Start_Date."'
                                                    '".$Featured_End_Date."')";*/
           
            if ($_POST['txtselectproperty']=="0" && $_POST['txtselectstate']=="0" &&  $_POST['txtfeatured']==0) 
            {
                echo "<script>alert('Please select Album');</script>";
            }
            else
            {    
                $fdata_mainImg = $_FILES['iddoc'];
                $fdata = $_FILES['gallery'];
                $path = "";
                if(is_array($fdata['name']))
                {
                    $files="";
                    $temp="";
                    $path = $_POST['imgpath'];
                   /* mkdir($path);*/
                    /*--upload main img--*/
                    $exetention = explode(".", $fdata_mainImg["name"]);
                    $mainImg = "mainImage.".end($exetention);
                    move_uploaded_file($fdata_mainImg["tmp_name"], $path.$mainImg);
                    /*--upload gallery imgs--*/
                    for($i=0 ; $i<count($fdata['name']) ; $i++)
                    {
                        $temp = $fdata['tmp_name'][$i];
                        $files = $fdata['name'][$i];
                        move_uploaded_file($temp,$path.$files);
                    }

                    echo$query= "update  property set property_name='".$Property_Name."',street='".$Street."',city='".$City."',postal_code='".$Pincode."',star_rate='".$Rating."',
                                                    state='".$Select_State."',country='".$Country."',image_path='".$path."',
                                                    description='".$Description."',how_to_reach='".$How_To_Reach."',property_type_id='".$Select_Property."',activation_flag='YES' where property_id='".$id."'";
                  

                    $res=mysql_query($query);
                    if($res)
                    {
                            echo$query1= "update  property_info set bedrooms='".$Select_bedrooms."',bathrooms='".$Select_bathrooms."',pool='".$Swimming_Pool."',
                              meals='".$Meals."',internet_access='".$Internet."',smoking_allowd='".$Smoking."',television_access='".$Cable_TV."',
                              pet_friendly='".$Pet_Friendly."',air_condition='".$Air_Contitioning."',in_house_kitchen='".$Kitchen."',restaurant='".$Restaurant."',beds='".$Select_beds."',accommodates='".$Select_accommodates."',free_parking='".$Parking."',first_aid_available='".$First_Aid_Avaliable."',
                entertainment='".$Entertainment."',other_amenities='".$Other_Amenities."',theme='".$Theme."',attractions='".$Attractions."',leisureActivities='".$Leisure."',general='".$General."',payment_facility='".$Payment_Facility."',
                latitude='".$Latitude."',
                longitude='".$Longitude."',
                free_breakfast='".$Free_Breakfast."',Featured='".$Featured."',Featured_startDate='".$Featured_Start_Date."',
                                                        Featured_endDate='".$Featured_End_Date."', Price='".$Price."'   where     property_id='".$id."'";

                        $res1=mysql_query($query1);
                        if($res1)
                        {
                            echo '<script>alert("Data  successfully Update")</script>';
                          echo'<script>window.location.href="Update_Owner_Info.php?id='.$id.'"</script>';
                        }
                        else
                        {
                            echo '<script>alert("Data  not Update")</script>';
                        }
                    }
                    else
                    {
                        echo '<script>alert("Data Update")</script>';
                    }
 

                }

            }

        }
    
?>
<!-- <iframe src="//www.google.com/maps/embed/v1/place?q=Harrods,Brompton%20Rd,%20UK
      &zoom=17
      &key=AIzaSyAJMhoRgsAn7Jv1QnrJuigVHmS2T53uxjg">
  </iframe> -->
