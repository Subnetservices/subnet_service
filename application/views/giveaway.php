</div>
 <section class="services-w3sec py-5" id="pricing">
    <div class="container py-xl-5 py-lg-3"><div>

      <div class="col-md-5">
        <h3 style="color:green;"><?php echo $message ?></h3>
          <p class="text"><h3> Created by : <?php echo $giv->full_name?></h3></p>
          <p class="text"><h3> Network : <?php echo $giv->network?></h3></p>
          <p><h4> Name of give away: <?php echo $giv->title?></h4></p>
          <form method="post">
            <input type="hidden" name="gift_id" value="<?php echo $giv->gvid?>">
            <div class="form-group">Enter Phone Number
              <input type="text" name="phone_number" class="form-control" placeholder="08121213133">
            </div>
            <div class="form-group">
              <input type="submit" name="redeem" value="redeem" class="btn btn-primary">

            </div>
          </form>
        </div>
      </div>
</section>