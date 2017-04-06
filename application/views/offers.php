<!DOCTYPE HTML>
<html>
<?php
//if(isset($filterData)){
//    var_dump($filterData);
////    foreach($filterData['selectedBathroomList'] as $aa ){
////        var_dump($aa);
////    }
//}
////?>
<!--head-->
<?php include('includes/head.php'); ?>

<body>

<!-- Top header -->
<?php include('includes/header.php'); ?>
<section class="rooms mt100">
    <div  id="load-result">
        <div class="container">
            <div class="row room-list fadeIn appear" >
                <div class="row" style="width:100%">
                    <div class="col-sm-12" style="border-bottom:2px solid lightgrey;margin-bottom:20px;width:100%">
                        <h3>Best Offers found : <?php echo $offer_count ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <?php foreach ($offers as $offer){?>
            <div class="container offers-container" style="">
    <!--            <div class="row">-->
                    <div class="col-sm-4  offers-img"  style="height:200px;padding:0">
                        <div class="" style="background-color: red;width:50px;height:50px;border-radius: 50%;position:absolute;text-align:center;top:5px;left:5px">
                            <p style="padding-top:15px;color:#fff"><b>-<?php echo $offer->Discount; ?>%</b></p>
                        </div>
                        <a href="<?php echo base_url('/index.php/Index1/PropertyDetails/'.$offer->property_id)?>">
                            <img src="<?php echo base_url().'Trueholidays/'.$offer->image_path.'mainImage.jpg' ?>" style="width:100%;height:100%;"></a>
                    </div>
                    <div class="col-sm-6  offers-description">
                        <h2> <a href="<?php echo base_url('/index.php/Index1/PropertyDetails/'.$offer->property_id) ?>"><?php echo $offer->property_name; ?> </a></h2>
                        <p><h4><?php echo $offer->street.','.$offer->state.','.$offer->country; ?></h4></p>
                        <p><h4>No.of rooms : <?php echo $offer->bedrooms;  ?> </h4></p>
                        <div class="" id="email_id_div">
                            <?php for ($i=1;$i <= $offer->star_rate;$i++) {?>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            <?php } ?>
                        </div>
<!--                        <p><h4><a href="#">Reviews : 5</a></h4></p>-->
                    </div>
                    <div class="col-sm-2 offer-price" style="">
                        <p><span style="text-decoration:line-through"><?php echo $offer->property_price; ?></span> <b>INR</b></p>
                        <?php
                            if($offer->property_price){
                                $discount = $offer->property_price * $offer->Discount / 100;
                                $finalDiscount = $offer->property_price - $discount;
                            }
                        ?>
                        <p><h3 style="margin-top:0"><?php echo $finalDiscount ? $finalDiscount:'' ; ?></h3></p>
                    </div>
            </div>
        <?php }?>
        <div class="col-md-12" style="text-align:center">
            <?php echo $this->pagination->create_links();?>
        </div>
    </div>
</section>


<!-- Footer -->
<?php include('includes/footer.php'); ?>
<!-- Go-top Button -->
<div id="go-top"><i class="fa fa-angle-up fa-2x"></i></div>

</body>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
<script>

    $(".apply").click(function(){
        $(".more-filter").hide();
    });
    $(document).on('change', '.applyChange', function () {
        $.ajax({
            url: '<?php echo base_url()?>index.php/RoomAvailability/checkRoomAvailabilty',
            type: 'POST',
            data: $('#roomAvailable').serialize(),
            success: function(data) {
                document.body.innerHTML=data;
                $(".container .appear").css("opacity","1");
            }
        });
    });
    $(document).on('change', '.changeFilters', function () {
        $.ajax({
            url: '<?php echo base_url()?>index.php/RoomAvailability/checkRoomAvailabilty',
            type: 'POST',
            data: $('#roomAvailable').serialize(),
            success: function(data) {
                document.body.innerHTML=data;
                $(".container .appear").css("opacity","1");
            }
        });
    });

    $(document).on('click', '.other-rating', function () {
        // alert("working");
        $.ajax({
            url: '<?php echo base_url()?>index.php/RoomAvailability/checkFilterRoomAvailabilty',
            type: 'POST',
            data: $('#roomAvailable').serialize(),
            success: function(data) {
//                    document.body.innerHTML=data;
                $('#load-result').html(data);
                $(".container .appear").css("opacity","1");
            }
        });
    });
</script
</html>