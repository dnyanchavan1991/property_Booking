 
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
                     
                  <!--<li id="logOut"><a href="#" data-hover="LOGOUT" onClick="checkLogout('Index1')">Logout</a></li>-->
        <?php } ?>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  </form>