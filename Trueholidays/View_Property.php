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
?>
<?php
if(isset($_GET['id']))
    {
        

        if($_GET['name']=="YES")
        { 
             
                mysqli_query($con, "UPDATE  property SET activation_flag='NO' where property_id='".$_GET['id']."'");
        }
        if($_GET['name']=="NO")
        {   
                mysqli_query($con, "UPDATE  property SET activation_flag='YES' where property_id='".$_GET['id']."'");
        }

    }

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
<!-- DataTables -->
        <link href="../plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="../plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="../plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>


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
            function change(id)
        {
            //alert(id);
        var a=document.getElementById("status"+id).value;
        //var eid=document.getElementById("txteid").value;
        if(a=="YES")
            {
                //a="Disapproved";
                
                document.getElementById("status"+id).value="NO";
                document.getElementById("status"+id).style.backgroundColor='Red';
                $.ajax(
                {
                    type:"GET",
                    url:"View_Property.php",
                    data:"id="+id+"&name="+a,
                    success:function(data){ }
                });
            }
            if(a=="NO")
            {
                //a="Approved";
                    var aa=document.getElementById("status"+id).value="YES";
                    //alert(aa);
                    document.getElementById("status"+id).style.backgroundColor='Green';
                $.ajax(
                {
                    type:"GET",
                    url:"View_Property.php",
                    data:"id="+id+"&name="+a,
                    success:function(data)
                    {
                    }
                }); 
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
                                    <h4 class="page-title">View Property </h4>
                                        
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                <!-- end page title end breadcrumb -->
                  <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>View Property</b></h4>
                                    <hr>
                                    <div class="table-responsive">
                                    <table id="datatable-colvid" class="table table-bordered  table-info">
                                        <thead>
                                        <tr style="background-color: #494949; color: white;">
                                            <th>Sr. No</th>
                                            <th >Property Name</th>
                                            <th>Owner Name </th>
                                            <th>contact No</th>
                                            <th>Reg Date</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Update</th>
                                            <th>View</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                         <?php 
                                        $query="select * from property";
                                        $res=mysqli_query($con,$query);
                                       $c=0;
                                        while($row=mysqli_fetch_row($res))
                                        {
                                            $c++;
                                         $query1="select * from property_owner_info where property_id='".$row[0]."'";
                                                    $res1=mysqli_query($con,$query1);
                                                    $row1=mysqli_fetch_row($res1);
                                                    
                                                        
                                                                        
                                                            echo"<tr>
                                                                <td>$c</td>
                                                                 <td>$row[1]</td>
                                                                 <td>$row1[2]</td>
                                                                 <td>$row1[3]</td>
                                                                 <td>$row1[7]</td>
                                                                 <td>$row[6]</td>
                                                                 <td>$row[3]</td>
                                                                <td><center>
                                                                    <a href='Update_Property.php?id=$row[0]'>
                                                                        <button type='button' class='btn btn-info btn-md btn-block waves-effect waves-light'> 
                                                                        <i class='glyphicon glyphicon-edit'></i>
                                                                         </button>
                                                                    </a></center>
                                                                </td>
                                                                <td><center>
                                                                    <a href='View_Property_Detail.php?id=$row[0]'>
                                                                        <button type='button' class='btn btn-primary  btn-md btn-block waves-effect waves-light'> <i class='glyphicon glyphicon-th-large'></i>
                                                                        </button>
                                                                    </a></center>
                                                                </td>";
                                                                if($row[12]=="YES")
                                                                {
                                                                     echo'<td><center>
                                                                    <a href="">
                                                                        <button type="button" id="status'.$row[0].'" style="background-color:Green" value="YES" onclick="change('.$row[0].')" class="btn btn-success  btn-md btn-block waves-effect waves-light"><i class="glyphicon glyphicon-thumbs-up"></i>
                                                                        </button>
                                                                    </a></center>
                                                                </td>';
                                                                }
                                                                else
                                                                {
                                                                     echo'<td><center>
                                                                    <a href="">
                                                                        <button type="button" id="status'.$row[0].'" value="NO" style="background-color:red" onclick="change('.$row[0].')" class="btn btn-danger  btn-md btn-block waves-effect waves-light"><i class="glyphicon glyphicon-thumbs-down"></i>
                                                                      
                                                                        </button>
                                                                    </a></center>
                                                                </td>';
                                                                }
                                                               
                                                            echo"</tr>";
                                            
                                            
                                        }
                                        ?>
                                       
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                <!-- end row -->

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

        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables/dataTables.bootstrap.js"></script>

        <script src="../plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="../plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="../plugins/datatables/jszip.min.js"></script>
        <script src="../plugins/datatables/pdfmake.min.js"></script>
        <script src="../plugins/datatables/vfs_fonts.js"></script>
        <script src="../plugins/datatables/buttons.html5.min.js"></script>
        <script src="../plugins/datatables/buttons.print.min.js"></script>
        <script src="../plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="../plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="../plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="../plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="../plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="../plugins/datatables/dataTables.colVis.js"></script>
        <script src="../plugins/datatables/dataTables.fixedColumns.min.js"></script>

        <!-- init -->
        <script src="assets/pages/jquery.datatables.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({keys: true});
                $('#datatable-responsive').DataTable();
                $('#datatable-colvid').DataTable({
                    "dom": 'C<"clear">lfrtip',
                    "colVis": {
                        "buttonText": "Change columns"
                    }
                });
                $('#datatable-scroller').DataTable({
                    ajax: "../plugins/datatables/json/scroller-demo.json",
                    deferRender: true,
                    scrollY: 380,
                    scrollCollapse: true,
                    scroller: true
                });
                var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
                var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: false,
                    fixedColumns: {
                        leftColumns: 1,
                        rightColumns: 1
                    }
                });
            });
            TableManageButtons.init();

        </script>
        </body>
        </html>