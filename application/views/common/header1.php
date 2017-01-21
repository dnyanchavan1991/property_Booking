<!--<script type="text/javascript" src="js/new-theme/jquery-1.11.3.min.js"></script>-->

<script type="text/javascript" src="js/new-theme/jssor.slider.mini.js"></script>
<!--<script src="js/new-theme/owl.carousel.js"></script>-->

<script>
    $(document).ready(function(){
        //$('div.active').hide();
        $('li.image-li').on('click', function() {
             //alert("User Logged Out !");
            $('li.image-li').toggle();
        });
    });

     
    $(document).ready(function(){
      $('.carousel.carousel-slider').carousel({full_width: true});
    });
       
        
    jQuery(document).ready(function ($) {
      var lastPart = window.location.href.split("/").pop();
         
        if (lastPart == "Index1" || lastPart == "" || lastPart == "Contact") {
        $("#jssor_1").toggleClass();
            }
       
        var jssor_1_SlideshowTransitions = [
            {$Duration:1200,$Opacity:2}
        ];

        var jssor_1_options = {
            $AutoPlay: true,
            $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
            },
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
            }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizing
        function ScaleSlider() {
            var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
            if (refSize) {
                refSize = Math.min(refSize, 1500);
                jssor_1_slider.$ScaleWidth(refSize);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }
        ScaleSlider();
        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        //responsive code end
        
        $("#search").click(function(){
          $("#subSearch" ).toggleClass();
            $("#QuickSearch_Mh").click(function(){
              $("#subSearchM" ).toggleClass();
            });
          });
    });
    
</script>

 <form method="post" action="RoomAvailability" id="frmCntrl">
<?php $accessType = $this->session->userdata('acessType'); ?>
<input type="hidden" name="inpDestination" id="inpDestination" value=""> 
<nav  role="navigation" style="background-color:#ee6e73; color: white;">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">Logo</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="Index1">Home</a></li>
        <li><a href="#" onclick="$('#inpDestination').val('Featured');$('#frmCntrl').submit();">Featured</a></li>
       <li id="search">
            <a class="dropdown-button" href="#" data-activates="subSearch" >Quick Search <i class="material-icons right">            arrow_drop_down</i></a>
                   <ul id="subSearch" class="dropdown-content">
                      <li><a href="#" onclick="$('#inpDestination').val('Maharashtra');$('#frmCntrl').submit();" id="QuickSearch">Maharashtra</a></li>
                      <li><a href="#" onclick="$('#inpDestination').val('Goa');$('#frmCntrl').submit();">Goa</a></li>
                  </ul>
       </li>
        <?php 
              if ($this->session->userdata ('user_id') == "") { ?>
                  <li id="logIn" class="active"><a href="#" data-hover="LOGIN" onClick="checkLogin('Index1')">Login</a></li>
        <?php } 
                else 
                {
             if ($this->session->userdata ('gender') == "1")
                      { ?>
                         <li id="logOut"><img src="images/new-theme/male.png" alt=""/>
                    <?php
                     } 
                     else
                      { ?>
                        <li id="logOut"><img src="images/new-theme/female.png" alt=""/>
                <?php } ?>
                 <!-- <ul class="second-level-menu"> -->
                    <li class="image-li">
                        <a href="#" class="active" data-hover="LOGOUT" onClick="checkLogout('Index1')">Logout</a>
                    </li>
                    <!-- </ul> -->
                    </li>
                  <!--<li id="logOut"><a href="#" data-hover="LOGOUT" onClick="checkLogout('Index1')">Logout</a></li>-->
        <?php } ?>
      </ul>

      <ul id="nav-mobile" class="side-nav">
         <li><a href="Index1">Home</a></li>
        <li><a href="#" onclick="$('#inpDestination').val('Featured');$('#frmCntrl').submit();">Featured</a></li>
       <li id="search">
            <a class="dropdown-button" href="#!" data-activates="dropdown1" >Quick Search <i class="material-icons right">            arrow_drop_down</i></a>
                   <ul id="dropdown1" class="dropdown-content">
                      <li><a href="#" onclick="$('#inpDestination').val('Maharashtra');$('#frmCntrl').submit();" id="QuickSearch">Maharashtra</a></li>
                      <li><a href="#" onclick="$('#inpDestination').val('Goa');$('#frmCntrl').submit();">Goa</a></li>
                  </ul>
       </li>
        <?php 
              if ($this->session->userdata ('user_id') == "") { ?>
                  <li id="logIn" class="active"><a href="#" data-hover="LOGIN" onClick="checkLogin('Index1')">Login</a></li>
        <?php } 
                else 
                {
             if ($this->session->userdata ('gender') == "1")
                      { ?>
                         <li id="logOut"><img src="images/new-theme/male.png" alt=""/>
                    <?php
                     } 
                     else
                      { ?>
                        <li id="logOut"><img src="images/new-theme/female.png" alt=""/>
                <?php } ?>
                 <!-- <ul class="second-level-menu"> -->
                    <li class="image-li">
                        <a href="#" class="active" data-hover="LOGOUT" onClick="checkLogout('Index1')">Logout</a>
                    </li>
                    <!-- </ul> -->
                    </li>
                  <!--<li id="logOut"><a href="#" data-hover="LOGOUT" onClick="checkLogout('Index1')">Logout</a></li>-->
        <?php } ?>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  </form>

  <div class="" id="jssor_1">
    
  </div>
      