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
    <script type="text/javascript" src="js/angular.min.js"></script>
    <script type="text/javascript" src="js/controller/landingPageController.js"></script>

    <script type="text/javascript" src="js/global/global_url_variable.js"></script>
    <script type="text/javascript" src="js/global/global_functions.js"></script>

</head>
<body ng-app="landingPageApp" >
<!--header starts-->
<div class="header">
    <?php $this->load->view('common/header-new.php'); ?>
</div>

<!---strat-date-piker---->
<link rel="stylesheet" href="css/jquery-ui.css" />
<script src="js/jquery-ui.js"></script>
<script>
    function toggleFields(){
        //alert('here');
        $('#firstName').toggle();
        $('#lastName').toggle();
        $('#mobileNumber').toggle();
        $('#email').toggle();

        if ($('#signUp_status_text').text() == "Already have an account? Login!") {
            $('#signUp_status_text').text("Don't have an account? Sign Up!");
            $("#firstName").attr("disabled", "disabled");
            $("#lastName").attr("disabled", "disabled");
            $("#mobileNumber").attr("disabled", "disabled");
            $("#email").attr("disabled", "disabled");
            $('#lgnBtn').text("Login");
            $('#loginTitle').text("Login");
        } else{
            $('#signUp_status_text').text("Already have an account? Login!");
            $('#lgnBtn').text("Sign Up");
            $('#loginTitle').text("Sign Up");
            $("#firstName").removeAttr("disabled");
            $("#lastName").removeAttr("disabled");
            $("#mobileNumber").removeAttr("disabled");
            $("#email").removeAttr("disabled");

        }
    }
    $(document).ready(function() {
        var response = '';
        $.ajax({ type: "GET",
            url: "http://ipinfo.io/json",
            async: false,
            success : function(text)
            { //alert($.parseJSON(text));
                response = text;
                $.ajax({ type: "post",
                    url: "VisitorInfo/insertVisitorData",
                    datatype:'json',
                    data:response,
                    async: false,
                    success : function(text)
                    {
                        $.ajax({
                            type: "post",
                            url: "VisitorInfo/getVisitorCount",
                            async: false,
                            success : function(response)
                            {
                                var parseResp = $.parseJSON(response);
                                $("#visitCount").html(parseResp.count);

                            }
                        });
                    }

                });
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
    <div class="container col-md-5 col-md-offset-3">
        <h3 id="loginTitle">Sign Up</h3>
        <div ng-controller="loginCtrl">
            <form ng-submit="authenticateAdmin()">
                <div class="form-group">
                    <input type="text" id="firstName" placeholder="First Name" ng-model="form.firstName" class="form-control login-field" required>
                </div>
                <div class="form-group">
                    <input type="text" id="lastName" placeholder="Last Name" ng-model="form.lastName" class="form-control login-field" required>
                </div>
                <div class="form-group">
                    <input type="text" id="mobileNumber" placeholder="Mobile Number" ng-model="form.mobileNumber" class="form-control login-field" required>
                </div>
                <div class="form-group">
                    <input type="text" id="email" placeholder="Email" ng-model="form.email" class="form-control login-field" required>
                </div>
                <div class="form-group">
                    <input type="text" id="username" placeholder="Username" ng-model="form.username" class="form-control login-field" required>
                </div>
                <div class="form-group">
                    <input type="password" id="login-pass" placeholder="Password" ng-model="form.password" class="form-control login-field" required>
                </div>
                <div class="form-group">
                    <input type="hidden" name="access_type" id="access_type" ng-model="form.access_type" ng_init="form.access_type='user'">
                </div>
                <div class="form-group">
                    <button  id="lgnBtn" class="btn btn-success modal-login-btn">Sign Up</button>
                </div>
                <div class="form-group">
                    <a id="signUp_status_text" onClick="toggleFields()" style="cursor: pointer;">Already have an account? Login!</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!---->
<div class="fotter">
    <div class="container">
        <h3>Today's Unique Visitors : <span id="visitCount"></span></h3>
    </div>
</div>
<!---->
<div class="fotter-info">
    <?php $this->load->view('common/footer.html'); ?>
</div>
<!---->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header login_modal_header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div>
                    <h2 class="modal-title" id="myModalLabel">Login</h2>
                </div>
            </div>
            <div class="modal-body login-modal">
                <div class="clearfix"></div>
                <div id='social-icons-conatainer'>
                    <div class='modal-body-left'ng-controller="loginCtrl">
                        <h3 style="text-align: center; margin-top: 0px;">Admin</h3>
                        <div class="form-group">
                            <input type="text" id="username" placeholder="Username" ng-model="form.username" class="form-control login-field">
                        </div>

                        <div class="form-group">
                            <input type="password" id="login-pass" placeholder="Password" ng-model="form.password" class="form-control login-field">
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="access_type" id="access_type"  ng-model="form.access_type" value="user" ng_init="form.access_type='user'" class="form-control login-field">
                        </div>

                        <div class="form-group">
                            <button ng-click="authenticateAdmin()" class="btn btn-success modal-login-btn">Login</button>

                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer login_modal_footer">
                <div style="text-align:left !important; float:left;">
                    <a href="Registration" class="login-link text-center" >New User?</a>
                </div>
                <div style="text-align:right !important; float:right;">
                    <a href="#" class="login-link text-center" style="">Lost your password?</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>