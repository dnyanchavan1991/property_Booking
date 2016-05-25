
<div class="top-header">
    <div class="container">
        <div class="top-menu">
            <?php $accessType = $this->session->userdata('acessType'); ?>
            <ul>
                <li class="active"><a href="Index1">Home</a></li>
                <?php if(!isset($accessType)) { ?>
                    <li id="logIn"><a href="#" data-hover="LOGIN" onClick="checkLogin('Index1')">Login</a></li>
                <?php } else { ?>
                    <li id="logOut"><a href="#" data-hover="LOGOUT" onClick="checkLogout('Index1')">Logout</a></li>
                <?php } ?>
            </ul>
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