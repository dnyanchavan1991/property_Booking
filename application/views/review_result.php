<h3>Reviews</h3>
<?php foreach ($review as $reviews) {  ?>
    <div class="row" style="border-bottom: 1px solid #ccc;padding-bottom:15px;">
        <div class="col-sm-12">
            <h4><?php echo $reviews->customer_name ?></h4>
        </div>
        <div class="col-sm-12">
            <?php echo $reviews->review_text ?>
        </div>
    </div>
<?php } ?>