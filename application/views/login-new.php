<!DOCTYPE html>
<html>
<head>
    <title>Property Booking</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Pinyon+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css'>
    
      <!--<script src="js/new-theme/jquery.min.js"></script> -->
 <script type="text/javascript" src="js/angular.min.js"></script>
 
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script> 
    <script src="js/new-theme/jquery.validate.js"></script>
 
 <script src="js/js/materialize1.js"></script>
  <script src="js/js/init1.js"></script>  
   <script src="js/js/prism.js"></script> 
   
    <!-- requried-jsfiles-for owl -->
    <link href="css/new-theme/owl.carousel.css" rel="stylesheet">
    
    <script type="text/javascript" src="js/controller/loginController.js"></script>

    <script type="text/javascript" src="js/global/global_url_variable.js"></script>
    <script type="text/javascript" src="js/global/global_functions.js"></script> 



<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize1.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style1.css" type="text/css" rel="stylesheet" media="screen,projection"/>  
 
  
     
    
</head>
<body ng-app="landingPageApp" >
<!--header starts-->
<div class="navbar navbar-inverse" ng-controller="galleryImgCtrl">
    <?php $this->load->view('common/header1.php'); ?>
</div>
<!---strat-date-piker-->

 <script>

    $().ready(function() {
         
        // validate signup form on keyup and submit
        $("#signupForm").validate({
            rules: {
                firstName: {
                    required: true,
                    minlength: 2
                },
                lastName: {
                    required: true,
                    minlength: 2
                },
                mobileNumber: {
                    required: true,
                    digits: true,
                    minlength: 10
                },
                username: {
                    required: true,
                    minlength: 2
                },
                password: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                firstName: {
                    required: "Please enter a first name",
                    minlength: "Your first name must consist of at least 2 characters"
                },
                lastName: {
                    required: "Please enter a last name",
                    minlength: "Your last name must consist of at least 2 characters"
                },
                mobileNumber: {
                    required: "Please enter a last name",
                    digit: "Only numbers are allowed",
                    minlength: "Your number must be at least 10 numbers long"
                },
                username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 2 characters"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                email: {
                    required: "Please enter a email",
                    email: "Please enter a valid email address"
                }
            },
            submitHandler: function(form) {
                /*alert('is good');
                return false;*/
            }
        });
    });

    function toggleFields(){
        //alert('here');
        $('#firstName').toggle();
        $('#lastName').toggle();
        $('#mobileNumber').toggle();
        $('#email').toggle();
        $('#gender').toggle();
        $('#datepicker').toggle();

        $('#firstNameLabel').toggle();
        $('#lastNameLabel').toggle();
        $('#mobileNumberLabel').toggle();
        $('#emailLabel').toggle();
        $('#genderLabel').toggle();
        $('#birthDateLabel').toggle();

        if ($('#signUp_status_text').text() == "Already have an account? Login!") {
            $('#signUp_status_text').text("Don't have an account? Sign Up!");
            $("#firstName").attr("disabled", "disabled");
            $("#lastName").attr("disabled", "disabled");
            $("#mobileNumber").attr("disabled", "disabled");
            $("#email").attr("disabled", "disabled");
            $("#gender").attr("disabled", "disabled");
            $("#datepicker").attr("disabled", "disabled");
            $("#firstNameLabel").attr("disabled", "disabled");
            $("#lastNameLabel").attr("disabled", "disabled");
            $("#mobileNumberLabel").attr("disabled", "disabled");
            $("#emailLabel").attr("disabled", "disabled");
            $("#genderLabel").attr("disabled", "disabled");
            $("#birthDateLabel").attr("disabled", "disabled");
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
            $("#gender").removeAttr("disabled");
            $("#datepicker").removeAttr("disabled");
            $("#firstNameLabel").removeAttr("disabled");
            $("#lastNameLabel").removeAttr("disabled");
            $("#mobileNumberLabel").removeAttr("disabled");
            $("#emailLabel").removeAttr("disabled");
            $("#genderLabel").removeAttr("disabled");
            $("#birthDateLabel").removeAttr("disabled");
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
<br><br><br>
 <div class="container">
<div class="row">
<div ng-controller="loginCtrl">
    <form class="col s12" id="signupForm" ng-submit="authenticateAdmin()" role="form">
      <div class="row">
        <div class="input-field col s12  m12 l6">
          <input  type="text" id="firstName" name="firstName" placeholder="" ng-model="firstName"  class="validate">
          <label for="last_name">First Name</label>
        </div>
        <div class="input-field col s12  m12 l6">
          <input type="text" id="lastName" name="lastName" placeholder="" ng-model="lastName"  class="validate">
          <label for="last_name">Last Name</label>
        </div>
      </div>
      <div class="row">
       <div class="input-field col s12  m12 l6">
          <input type="number" name="mobileNumber" id="mobileNumber" placeholder="" ng-model="mobileNumber" class="validate">
          <label for="last_name">Mobile No</label>
        </div>
        <div class="input-field col s12  m12 l6">
          <input type="text" id="email" name="email" placeholder="" ng-model="email" class="validate">
          <label for="email">Email</label>
        </div>
        
      </div>
      <div class="row">
            <div class="input-field col s12  m12 l6">
              <input type="text" id="username" placeholder="Username" ng-model="username" class="validate">
              <label for="last_name">User Name</label>
            </div>
            <div class="input-field col s12  m12 l6">
              <input type="password" id="password" placeholder="Password" ng-model="password" class="validate">
              <label for="password">Password</label>
            </div>      
      </div>
       <div class="row">

            <div class="input-field col s12  m12 l6">
            
                <input type="date" class="datepicker" ng-model="date_of_birth" name="date_of_birth" placeholder="" 
                value="" onfocus="this.value = '';" >
                 <label for="last_name">Select Date Of Birth</label>
            </div>


            <div class="input-field col s12  m12 l6">
                <select id="gender" ng-model="gender">
                  <option value="" selected>Choose Gender</option>
                  <option value="0">Other</option>
                  <option value="1">Male</option>
                  <option value="2">Female</option>
                  
                </select>
                <label>Select Gender</label>
              </div>  
        </div>
      <div class="row">
        <input type="hidden" name="access_type" id="access_type" ng-model="access_type" ng_init="access_type='user'"
         class="validate">
      </div>
      <div class="row">
          <button class="btn waves-effect waves-light modal-login-btn"  id="lgnBtn" name="action" onclick="alert('login-new.php')">Submit 1
           <!--  <i class="material-icons right">send</i> -->
          </button>
        <a id="signUp_status_text" onClick="toggleFields()" style="cursor: pointer;">Already have an account? Login!</a>
      </div>


    </form>
</div>
</div>
</div>








<div class="fotter">
    <div class="container">
        <h3>Today's Unique Visitors : <span id="visitCount"></span></h3>
    </div>
</div>
 
<div class="fotter-info">
    <?php $this->load->view('common/footer1.html'); ?>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

  
</body>
</html>