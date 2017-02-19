<div class="container">
    <div class="row room-list fadeIn appear" >
        <div class="row" style="width:100%">
            <div class="col-sm-12" style="border-bottom:2px solid lightgrey;margin-bottom:20px;width:100%">
                <h3>Best Deals found : <?php echo $count ?> rentals</h3>
            </div>
            <?php
            if(empty($data)){
                echo "<div class='col-sm-12'><h3>No Result Found</h3></div>";
            }
            ?>
            <!-- Room -->
            <?php foreach($data as $result){ ?>
                <div class="col-sm-4">
                    <div class="room-thumb"> <img src="<?php echo base_url().'Admin/'.$result->image_path.'mainImage.jpg' ?>" alt="room 1" class="img-responsive" />
                        <div class="mask">
                            <div class="main">
                                <h5><?php echo $result->property_name ?></h5>
                                <!-- <div class="price">&euro; 99<span>a night</span></div>-->
                            </div>
                            <div class="content">
                                <p><span><?php echo substr($result->description, 0,100) ?></p>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-check-circle"></i>No.of Rooms - <?php echo $result->bedrooms; ?></li>
                                            <li><i class="fa fa-check-circle"></i> No.of Bathrooms - <?php echo $result->bathrooms; ?></li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-6">
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-check-circle"></i>Pet Friendly - <?php echo $result->pet_friendly; ?></li>
                                            <li><i class="fa fa-check-circle"></i>Air Condition - <?php echo $result->air_condition; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="<?php echo base_url('/index.php/Index1/PropertyDetails/'.$result->property_id.'') ?>" class="btn btn-primary btn-block">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</div>