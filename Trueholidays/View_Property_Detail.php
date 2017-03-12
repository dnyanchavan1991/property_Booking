<?php
    include("db.php");
     ob_start();
     $id=$_GET['id'];
    //error_reporting(0); 
    session_start();
    if(isset( $_SESSION['TrueHolidays']))
    {
            
    }
    else
    {
        echo"<script>window.location.href='Login.php';</script>";
        
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

      <!--  <link rel="shortcut icon" href="assets/images/favicon.ico"> -->
         <link rel="icon" href="sml.ico" type="image/x-icon">
        <!-- App title -->
        <title>Training | Portal </title>

        <!-- Bx slider css -->
        <link href="../plugins/bx-slider/jquery.bxslider.css" rel="stylesheet" type="text/css" />

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
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span class="badge badge-success pull-right">2</span> <span></span>Property Mng </span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="Add_Property.php">Add Property</a></li>
                                    <li class="Active"><a href="View_Property.php">View Property</a></li>
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
                                    <h4 class="page-title">View Property Details</h4>
                                        
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="property-detail-wrapper">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="">
                                    <ul class="bxslider property-slider" >
                                        <?php 
                                        $query="select image_path from property where property_id='".$id."'";
                                        $res=mysqli_query($con,$query);
                                        $row=mysqli_fetch_row($res);
                                                $directory = $row[0];
                                                $images = glob($directory . "*");

                                                foreach($images as $image)
                                                {
                                                  /*echo $image;*/
                                                  echo'<li><img src="'.$image.'"/></li>';
                                                }
                                        ?>
                                    </ul>

                                        <div id="bx-pager" class="text-center hide-phone ">
                                            <?php  
                                                $query1="select image_path from property where property_id='".$id."'";
                                                $res1=mysqli_query($con,$query1);
                                                $row1=mysqli_fetch_row($res1);
                                                $directory1 = $row1[0];
                                                $images1 = glob($directory1 . "*");
                                                 $c=0;
                                                        foreach($images1 as $image1)
                                                        {
                                                           
                                                          /*echo $image;*/
                                                          echo'<a data-slide-index='.$c.' href=""><img src="'.$image1.'" class="card-box"  height="70" /></a>';
                                                           $c++;
                                                          
                                                        }
                                                
                                             ?>
                                        </div>
                                    </div>
                                    <!-- end slider -->

                                    <div class="m-t-30">
                                    <?php 
                                         $query="select * from property where property_id='".$id."'";
                                        $res=mysqli_query($con,$query);
                                        $row=mysqli_fetch_row($res);

                                    ?>
                                        <h3>Property Infomation</h3>
                                        <div class="card-box">
                                        <p class="text-muted text-overflow"><i class="mdi mdi-map-marker-radius m-r-5"></i><?php echo$row[2].", ".$row[3].", ".$row[6].", <b>Pincode:</b>".$row[4]; ?></p>
                                        </div>

                                        <p class="m-t-20">
                                          <div class="card-box">
                                           <button type="button" class="btn btn-brown btn-xs waves-effect m-t-10 m-b-10 waves-light" style="border:1px solid; border-top-right-radius: 20px;border-bottom-right-radius: 20px;">Discription</button> <br>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       <?php echo$row[9];?>
                                           </div>
                                           <div class="card-box">
                                                  <button type="button" class="btn btn-brown btn-xs waves-effect m-t-10 m-b-10 waves-light" style="border:1px solid; border-top-right-radius: 20px;border-bottom-right-radius: 20px;">How To Reach</button><br>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                           <?php echo$row[10];?>
                                           </div>
                                        </p>

                                        <h4 class="m-t-30 m-b-20">General Amenities</h4>

                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                <ul class="list-unstyled proprerty-features card-box">
                                                <?php 
                                                     $query="select * from property_info where property_id='".$id."'";
                                                    $res=mysqli_query($con,$query);
                                                    $row=mysqli_fetch_row($res);

                                                echo'<div class="row">';
                                                    if($row[3]=="Yes")
                                                    {
                                                        echo'<div class="col-sm-4"><li>
                                                                <i class="mdi mdi-check-circle-outline text-success m-r-5 "></i>
                                                                Swimming pool
                                                            </li></div>';
                                                    }
                                                    else
                                                    {

                                                    }

                                                     if($row[5]=="Yes")
                                                    {
                                                          echo' <div class="col-sm-4"><li>
                                                                    <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                                     Internet / Wifi
                                                                </li></div>';
                                                    }
                                                    else
                                                    {

                                                    } 
                                                    if($row[6]=="Yes")
                                                    {
                                                          echo' <div class="col-sm-4"><li>
                                                                    <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                                     Smoking Allowed
                                                                </li></div>';
                                                    }
                                                    else 
                                                    {

                                                    }
                                                   
                                                        if($row[7]=="Yes")
                                                    {
                                                          echo' <div class="col-sm-4"><li>
                                                                    <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                                     Cabel TV
                                                                </li></div>';
                                                    }
                                                     else 
                                                    {

                                                    }
                                                    
                                                    if($row[8]=="Yes")
                                                    {
                                                          echo' <div class="col-sm-4"><li>
                                                                    <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                                     Pet Friendly
                                                                </li></div>';
                                                    }
                                                     else 
                                                     {

                                                     }

                                                    if($row[9]=="Yes")
                                                    {
                                                          echo' <div class="col-sm-4"><li>
                                                                    <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                                     Air conditioning
                                                                </li></div>';
                                                    }
                                                     else 
                                                     {

                                                     }

                                                    if($row[10]=="Yes")
                                                    {
                                                          echo' <div class="col-sm-4"><li>
                                                                    <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                                     Kitchan
                                                                </li></div>';
                                                    }
                                                    else
                                                    {

                                                    }

                                                    if($row[22]=="Yes")
                                                    {
                                                          echo' <div class="col-sm-4"><li>
                                                                    <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                                     Payment Facility
                                                                </li></div>';
                                                    }
                                                     else
                                                     {

                                                     }
                                                      
                                                    if($row[11]=="Yes")
                                                    {
                                                          echo' <div class="col-sm-4"><li>
                                                                    <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                                     Restaurant
                                                                </li></div>';
                                                    }
                                                    else 
                                                    {

                                                    }
                                                    if($row[14]=="Yes")
                                                    {
                                                          echo' <div class="col-sm-4"><li>
                                                                    <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                                     Free Parking
                                                                </li></div>';
                                                    }
                                                    else 
                                                    {

                                                    }

                                                    if($row[15]=="Yes")
                                                    {
                                                          echo' <div class="col-sm-4"><li>
                                                                    <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                                    First Aid Available
                                                                </li></div>';
                                                    }
                                                    else 
                                                    {

                                                    }

                                                    if($row[25]=="Yes")
                                                    {
                                                          echo' <div class="col-sm-4"><li>
                                                                    <i class="mdi mdi-check-circle-outline text-success m-r-5"></i>
                                                                     Free BreakFast
                                                                </li></div>';
                                                    }
                                                    else
                                                    {

                                                    }
                                                     echo"</div>";
                                                     ?>
                                                </ul>
                                            </div> 
                                        </div> <!-- end row -->

                                        <h4 class="m-t-30 m-b-20">Location</h4>

                                        <div class="card-box">
                                              <div id="map-property" style='max-height: 200px; max-width:100%;'></div>
                                        </div>

                                    </div> <!-- end m-t-30 -->

                                </div> <!-- end col -->

                                <div class="col-md-4">
                                    <div class="text-center card-box">
                                        <div class="text-left">
                                            <h4 class="header-title m-t-0 m-b-20">Owner Profile</h4>
                                        </div>
                                        <hr>
                                        <?php 
                                         $queryowner="select * from property_owner_info where property_id='".$id."'";
                                         $resowner=mysqli_query($con,$queryowner);
                                         $rowowner=mysqli_fetch_row($resowner);
                                        ?>
                                        <div class="member-card">
                                            <div class="thumb-xl member-thumb  center-block">
                                           <?php if($rowowner[10]!=NULL)
                                            {
                                                
                                                    $results= glob($rowowner[10].$id.'*');
                                                        $filename = $results[0];
                                        
                                                echo"<img src='$filename' class='img-circle img-thumbnail'  alt='Profile img Not Avaliable'> ";
                                            }
                                            else
                                            {
                                                 echo'<img src="happy.png" class="img-circle img-responsive img-thumbnail" alt="profile-image">';
                                            }
                                            ?>
                                                <!-- <img src="<?php echo$rowowner[10];?>" class="img-circle img-responsive img-thumbnail" alt="profile-image"> -->
                                                <i class="mdi mdi-star-circle member-star text-success" title="Featublue Agent"></i>
                                            </div>
                                            <br>
                                            <hr>
                                            <div class="">
                                               
                                                 <p><center>Star Rating:
                                                 <?php 
                                         $queryownerrating="select * from property where property_id='".$id."'";
                                         $resownerrating=mysqli_query($con,$queryownerrating);
                                         $rowownerrating=mysqli_fetch_row($resownerrating);
                                         for($i=1; $i<=$rowownerrating[5]; $i++)
                                         {
                                            echo'<i class="fa fa-star text-warning"></i>';
                                         }

                                        ?><!-- 
                                                <p>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                     --></center>
                                                </p>
                                                 <h4 class="m-b-5"><center><?php echo$rowowner[2];?></center></h4>
                                            </div>

                                            <div class="row">
                                                <div class="table-responsive">
                                                     <table class="table  m-b-0">
                                                     <?php 
                                                     if($rowowner[5]!=NULL)
                                                     {
                                                        echo '<tr>
                                                            <td style="text-align: left;"><b>Email</b></td>
                                                            <td style="text-align: left;">:  '.$rowowner[5].'</td>
                                                        </tr>';
                                                     }
                                                     else
                                                     {

                                                     }

                                                     if($rowowner[6]!=NULL)
                                                     {
                                                        echo' <tr>
                                                            <td style="text-align: left;"><b>Address</b></td>
                                                            <td style="text-align: left;">:  '.$rowowner[6].'</td>
                                                        </tr>';
                                                     }
                                                     else
                                                     {

                                                     }

                                                    if($rowowner[7]!=NULL)
                                                     {
                                                        echo '<tr>
                                                            <td style="text-align: left;"><b>Reg Date</b></td>
                                                            <td style="text-align: left;">:  '.$rowowner[7].'</td>
                                                        </tr>';
                                                     }
                                                     else
                                                     {

                                                     }

                                                    if($rowowner[3]!=NULL)
                                                     {
                                                        echo '<tr>
                                                            <td style="text-align: left;"><b>Contact No</b></td>
                                                            <td style="text-align: left;">:  '.$rowowner[3].'</td>
                                                        </tr>';
                                                     }
                                                     else
                                                     {

                                                     } 

                                                     if($rowowner[4]!=NULL)
                                                     {
                                                        echo ' <tr>
                                                            <td style="text-align: left;"><b>Contact No(2)  </b></td>
                                                            <td style="text-align: left;">:  '.$rowowner[4].'</td>
                                                        </tr>';
                                                     }
                                                     else
                                                     {

                                                     }
                                                     ?>
                                                        
                                                        <!-- <tr>
                                                            <td style="text-align: left;"><b>Address</b></td>
                                                            <td style="text-align: left;">: <?php echo $rowowner[6]?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: left;"><b>Reg Date</b></td>
                                                            <td style="text-align: left;">: <?php echo $rowowner[7]?></td>
                                                        </tr> 
                                                        <tr>
                                                            <td style="text-align: left;"><b>Contact No</b></td>
                                                            <td style="text-align: left;">: <?php echo $rowowner[3]?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: left;"><b>Contact No(2)  </b></td>
                                                            <td style="text-align: left;">: <?php echo $rowowner[4]?></td>
                                                        </tr>-->
                                                     </table>
                                                </div>
                                            </div>
                                        </div> <!-- end membar card -->
                                    </div> <!-- end card-box -->

                                    <div class="card-box">
                                        <div class="table-responsive">
                                            <table class="table table-bordered m-b-0">
                                                <tbody>
                                                <?php 
                                                    $query="select * from property_info where property_id='".$id."'";
                                                    $res=mysqli_query($con,$query);
                                                    $row=mysqli_fetch_row($res);
                                                    if($row[3]!=Null)
                                                    {
                                                        echo'<tr>
                                                                <th>Bedrooms :</th>
                                                                <td>'.$row[1].'</td>
                                                            </tr>';
                                                    }
                                                    else
                                                    {

                                                    }
                                                     if($row[12]!=Null)
                                                    {
                                                        echo'<tr>
                                                                <th>Beds :</th>
                                                                <td>'.$row[12].'</td>
                                                            </tr>';
                                                    }
                                                    else
                                                    {

                                                    }
                                                     if($row[2]!=Null)
                                                    {
                                                        echo'<tr>
                                                                <th>Bathrooms:</th>
                                                                <td>'.$row[2].'</td>
                                                            </tr>';
                                                    }
                                                    else
                                                    {

                                                    }
                                                     if($row[13]!=Null)
                                                    {
                                                        echo'<tr>
                                                                <th>Accommodates :</th>
                                                                <td>'.$row[13].'</td>
                                                            </tr>';
                                                    }
                                                    else
                                                    {

                                                    }
                                                     if($row[16]!=Null)
                                                    {
                                                        echo'<tr>
                                                                <th>Entertainment :</th>
                                                                <td>'.$row[16].'</td>
                                                            </tr>';
                                                    }
                                                    else
                                                    {

                                                    }
                                                     if($row[4]!=Null)
                                                    {
                                                        echo'<tr>
                                                                <th>Meals :</th>
                                                                <td>'.$row[4].'</td>
                                                            </tr>';
                                                    }
                                                    else
                                                    {

                                                    }
                                                     if($row[18]!=Null)
                                                    {
                                                        echo'<tr>
                                                                <th>Theme :</th>
                                                                <td>'.$row[18].'</td>
                                                            </tr>';
                                                    }
                                                    else
                                                    {

                                                    }
                                                    if($row[19]!=Null)
                                                    {
                                                        echo'<tr>
                                                                <th>Attractions :</th>
                                                                <td>'.$row[19].'</td>
                                                            </tr>';
                                                    }
                                                    else
                                                    {

                                                    }
                                                    if($row[17]!=Null)
                                                    {
                                                        echo'<tr>
                                                                <th>Other Amenities  :</th>
                                                                <td>'.$row[17].'</td>
                                                            </tr>';
                                                    }
                                                    else
                                                    {

                                                    }
                                                    if($row[20]!=Null)
                                                    {
                                                        echo'<tr>
                                                                <th>Leisure Activities  :</th>
                                                                <td>'.$row[20].'</td>
                                                            </tr>';
                                                    }
                                                    else
                                                    {

                                                    }
                                                    if($row[21]!=Null)
                                                    {
                                                        echo'<tr>
                                                                <th>General :</th>
                                                                <td>'.$row[21].'</td>
                                                            </tr>';
                                                    }
                                                    else
                                                    {
                                                            
                                                    }
                                                    
                                                    ?>
                                                    <!-- <tr>
                                                        <th scope="row">Price:</th>
                                                        <td>$390,000</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Contract type: </th>
                                                        <td><span class="label label-danger">For Sale</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Bathrooms:</th>
                                                        <td>1.5</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Square ft:</th>
                                                        <td>468</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Garage Spaces:</th>
                                                        <td>2</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Land Size:</th>
                                                        <td>721 m²</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Floors:</th>
                                                        <td>2</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Listed for:</th>
                                                        <td>15 days</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Available:</th>
                                                        <td>Immediately</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Pets:</th>
                                                        <td>Pets Allowed</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Bedrooms:</th>
                                                        <td>3</td>
                                                    </tr> -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- end card-box -->

                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>
                        <!-- end property-detail-wrapper -->

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
<!-- 
  <script>
      var map;
      var marker;
      var infowindow;
      var messagewindow; 

     
      function initMap() {

        var california = {lat:18.76597494331089, lng:73.39405974938973};
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

     


    </script> -->
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

        <!-- Bx slider js -->
        <script src="../plugins/bx-slider/jquery.bxslider.min.js"></script>

        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script type="text/javascript" src="../plugins/gmaps/gmaps.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script>
            $(document).ready(function () {
                $('.property-slider').bxSlider({
                    pagerCustom: '#bx-pager'
                });
            });
</script>
<?php 
$query="select * from property_info where property_id='".$id."'";
                                                    $res=mysqli_query($con,$query);
                                                    $row=mysqli_fetch_row($res);
                                                   
?>
<script>
            var map = new GMaps({
                el: '#map-property',
                lat: <?php echo$row[23];?>,
                lng: <?php echo$row[24];?>,
                mapTypeControlOptions: {
                    mapTypeIds : ["hybrid", "roadmap", "satellite", "terrain", "osm"]
                }
            });
            map.addMarker({
                lat: <?php echo$row[23];?> ,
                lng:<?php echo$row[24];?>,
                title: 'Im your custom marker',
                icon: 'assets/images/map-marker.png'
            });
        </script>


    </body>
</html>