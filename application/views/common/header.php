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
    jQuery(document).ready(function ($) {
    	var lastPart = window.location.href.split("/").pop();
    	   
    	  if (lastPart == "Index1") {
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
<div class="top-header"> <!--style="position: fixed; width: 100%; z-index: 1"-->
    <div class="container">
        <div class="top-menu">
        <form method="post" action="RoomAvailability" id="frmCntrl">
            <?php $accessType = $this->session->userdata('acessType'); ?>
            <input type="hidden" name="inpDestination" id="inpDestination" value=""> 
            <ul class="top-level-menu" >
                <li class="active"><a href="Index1">Home</a></li>
                 <li class="active" id="featured"> 
                 	<a href="#" onclick="$('#inpDestination').val('Featured');$('#frmCntrl').submit();"> Featured  </a> 
                 </li>
                <li class="active" id="search"> 
                	<a href="#" > Quick Search </a>
                
                	<ul class="hide" id="subSearch" style="position: absolute; z-index: 100" >
                		<li> <a href="#" onclick="$('#inpDestination').val('Maharashtra');$('#frmCntrl').submit();" id="QuickSearch" > Maharashtra </a> </li>
                		<!--	<ul class="hide subMenu" id="subSearchM" style="position: absolute; z-index: 100">
                			<li> <a href="subSearchM_1" > Ratnagiri </a> </li>
                			<li> <a href="subSearchM_2"> Malvan </a> </li>
                			<li> <a href="subSearchM_3"> Chiplun </a> </li>
                			<li> <a href="subSearchM_4"> Kolhapur </a> </li>
                			<li> <a href="subSearchM_5"> Pune </a> </li>
                			</ul>-->
                		<li> <a href="#" onclick="$('#inpDestination').val('Goa');$('#frmCntrl').submit();"> Goa </a> </li>
                			<!--<ul class="hide subMenu" id="subSearchG" style="position: absolute; z-index: 100">
                			<li> <a href="subSearchG_1"> Goa </a> </li>
                			<li> <a href="subSearchG_2"> Maharashtra </a> </li>
                			<li> <a href="subSearchG_3"> Goa </a> </li>
                			<li> <a href="subSearchG_4"> Maharashtra </a> </li>
                			<li> <a href="subSearchG_5"> Goa </a> </li>
                			</ul>-->
                		 
                		
                	</ul>
                </li>
				<?php 
             	if ($this->session->userdata ('user_id') == "") { ?>
                	<li id="logIn" class="active"><a href="#" data-hover="LOGIN" onClick="checkLogin('Index1')">Login</a></li>
				<?php } else {
				     if ($this->session->userdata ('gender') == "1") { ?>
                    <li id="logOut"><img src="images/new-theme/male.png" alt=""/>
                    <?php } else { ?>
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
            </form>
        </div>
        <span class="menu"> </span>
        <div class="m-clear"></div>
        <div class="logo">
            <ul>
                <li><a href="#" class="f1"></a></li>
                <li><a href="#" class="f2"></a></li>
                <li><a href="#" class="f3"></a></li>
                <li><a href="#" class="f4"></a></li>
            </ul>
            <script>            
                $("span.menu").click(function(){
                    $(".top-menu ul").slideToggle(200);
                });
            </script>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="hide" id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1500px; height: 300px; overflow: hidden; visibility: hidden;" class="banner">
    <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
        <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
        <div style="position:absolute;display:block;background:url('images/new-theme/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
    </div>
    <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1500px; height: 300px; overflow: hidden;">
        <div data-p="112.50" style="display: none;">
            <img data-u="image" src="images/new-theme/hotel1.jpg" />
        </div>
        <div data-p="112.50" style="display: none;">
            <img data-u="image" src="images/new-theme/hotel2.jpg" />
        </div>
    </div>
    <!-- Bullet Navigator -->
    <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
        <!-- bullet navigator item prototype -->
        <div data-u="prototype" style="width:16px;height:16px;"></div>
    </div>
    <!-- Arrow Navigator -->
    <span data-u="arrowleft" class="jssora12l" style="top:0px;left:0px;width:30px;height:46px;" data-autocenter="2"></span>
    <span data-u="arrowright" class="jssora12r" style="top:0px;right:0px;width:30px;height:46px;" data-autocenter="2"></span>
    <div class="banner-info text-center">
        <h1>True Holidays</h1>
        <span></span>
        <ul>
            <li><a class="scroll" href="#">SEARCH</a><i class="line"></i></li>
            <li><a class="scroll" href="#">BOOK</a><i class="line2"></i></li>
            <li><a class="scroll" href="#">CONFIRM</a></li>
            <div class="clearfix"></div>
        </ul>
    </div>
</div>