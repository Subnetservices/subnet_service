
      <div class="content">
        <div class="row">
          

        <div class="col-md-5">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Purchase Data</h5>
              </div>
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
                          <option value="mtn">MTN</option> 
                          <option value="glo" >GLO</option>
                          <option value="airtel" >Airtel</option>
                          <option value="9mobile" >9Mobile</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <?php 
                        ?>
                        <label>Data Plan</label>
                        <select name="plan" id="data_plans" class="form-control" required>
                          <option value="" disabled>---select data plan---</option>


                        </select>
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
            //  walletprice = discount(plan.current_price);
             var walletprice = plan.wallet_price;
             var cardprice = plan.current_price;
             var  discount = Math.floor(100-((100*walletprice)/cardprice));
              document.getElementById('walletprice').innerHTML = "<span></span><h5>NGN"+walletprice+" "+discount+"% off</h5>";
              document.getElementById('cardprice').innerHTML = "<span></span><h5>NGN"+cardprice+"</h5>";

        });

   });



</script>

<style type="text/css">
  .payoption{

  }
</style>