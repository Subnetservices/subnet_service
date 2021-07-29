
      <div class="content">
        <div class="row">
          

        <div class="col-md-5">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Buy Airtime</h5>
              </div>

              <?php print_r($airtime_error)?>
              <div class="card-body">
                <div><?php echo $message?></div>
                <form method="post">
                  <div class="form-group"><label>Phone Number</label>
                    <input type="tel" class="form-control" name="phone_number" placeholder="234813443433" required>
                  </div>
                    <div class="">
                      <div class="form-group">
                        <label>Network</label>
                        <select name="network" id="networks" class="form-control" required>
                         <option value="">--Select Network--</option>
                          <?php 
                           $airtime = $this->db->select('*')->from('products')->where('product_type','airtime')->get()->result();
                          foreach ($airtime as $key => $value): ?>
                            <option value="<?php echo $value->network_id?>"> <?php echo $value->network?></option>
                          <?php endforeach ?>
                         
                          
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Amount (N)</label>
                          <input name="amount" class="form-control" placeholder="100" required>
                      </div>
                      
                      <div class="">
                        <h3>Choose Payment Method</h3>
                        <label>Pay with Wallet
                          <input type="radio" name="payment_method" value="wallet" checked>
                        </label>
                        <span id="walletprice"></span>
                      </div>
                      <div class="">
                        <label>Pay With Card
                          <input type="radio" name="payment_method" value="card">
                        </label>
                        <span id="cardprice"></span>
                        
                      </div>
                
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-round" name="purchase">purchase</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

      </div>
    </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/assets/userarea/js/core/jquery.min.js"></script>
<script type="text/javascript">

 $('#networks').change(function() {
 //  alert( $(this).val() );
   var network = $(this).val();
   document.getElementById('data_plans').innerHTML = "";
      $.get("/dashboard/welcome/ajax_dataplans/"+network, function(data,status){
        document.getElementById('data_plans').innerHTML += "<option>--select plan--</option";
       // console.log(JSON.parse(data));
       // console.log(status);
        var plans = JSON.parse(data);
        for (var i = 0; i < plans.length; i++) {
         // document.getElementById('data_plans').innerHTML += "<option value='"+plans[i].current_price"'>"+plans[i].product_value+"MB"+plans[i].current_price+"</option>";
          
          document.getElementById('data_plans').innerHTML += "<option value="+plans[i].prid+">"+plans[i].product_value+"MB @ N"+plans[i].current_price+"</option>";
        }
      });
  });

 $('#data_plans').change(function() {
 //  alert( $(this).val() );
   var prid = $(this).val();
   
        $.get("/dashboard/welcome/ajax_plan/"+prid, function(data,status){
              var plan = JSON.parse(data);
              walletprice = discount(plan.current_price);
              cardprice = plan.current_price;
              document.getElementById('walletprice').innerHTML = "<span></span><h5>NGN"+walletprice+" <span style='color:red'> 10% off</span></h5>";
              document.getElementById('cardprice').innerHTML = "<span></span><h5>NGN"+cardprice+"</h5>";

        });

   });

 function discount(price) {
   return price - price* 10/100;
 }

</script>

<style type="text/css">
  .payoption{

  }
</style>