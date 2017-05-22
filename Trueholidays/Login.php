<?PHP
    include("db.php");
  
    if(isset($_GET['_uid']))
    {
        $user_name=$_GET['_uid'];
        $pass=$_GET['_sid'];
        $query="select * from registration where user_name='".$user_name."'";
        $q=mysqli_query($con, $query);
        $row=mysqli_fetch_row($q);
		 
        if($user_name=='' && $pass=='')
            {
		        $msg='Please Enter Your Correct Email Id & Password'; 
            }
            else
            {
                         if($row[1]==$user_name && $row[2]==$pass && $row[9]=='admin')
                        {   
                            session_start();
                            
                            echo$_SESSION['TrueHolidays']=$row[1]; 
                            
                            echo"<script>window.location.href='index.php';</script>";
                        }
                        else
                        {    
                            $msg='Please Enter Your Correct Password'; 
                        }
                
        
            }
            mysqli_close();
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
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>TrueHolidays</title>

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>
         <script>
            function fetchimage(val)
            {
                $.ajax(
                {
                    type:"GET",
                    url:"fetchimage.php",
                    data:'getimage='+val,
                    success:function(data)
                    {
                        
                        $("#con").html(data);
                    }
                });
                
            }
        </script>

    </head>


    <body class="bg-transparent">

        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="m-t-40 account-pages">
                                <div class="text-center account-logo-box">
                                 
                                    <h2 class="text-uppercase">
                                        <a href="index.html" class="text-success">
                                            <span><h3 style="color: white;">Login</h3></span>
                                        </a>
                                    </h2>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
                                <div class="account-content">
                                 <form class="form-horizontal" action="Login.php" method="post">
                                    <div class="text-center m-b-20" id="con">
                                        <div class="m-b-20">
                                            <img src="" class="img-circle img-thumbnail thumb-lg" alt="thumbnail">
                                        </div>

                                        
                                    </div>
                                   

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="text" placeholder="Email ID" name="username" onblur="fetchimage(this.value);">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="password" placeholder="Password" name="password" required="true">
                                            </div>
                                        </div>

                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn w-md btn-bordered btn-danger waves-effect waves-light"
                                                        type="submit" name="login_user">Log In
                                                </button>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->


                            <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Not ADMIN? return TO holidaybay<a href="../" class="text-primary m-l-5"><b>holidaybay.in</b></a></p>
                                </div>
                            </div>

                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->

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

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>