
  


      <div class="content">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-money-coins text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Account Balance</p>
                      <p class="card-title"><span>&#8358;</span><?php echo $wallet->amount?>
                        </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                </div>
              </div>
            </div>
          </div>

          

        <div class="col-md-4">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Fund Your Wallet</h5>
              </div>
              <div class="card-body">
                
                <form method="post">             
                    <div class="form-group">
                      <label>Amount</label>
                      <input type="text" class="form-control" placeholder="20000"  name="amount">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary" name="fundwallet">Paynow</button>
                    </div>
            
                </form>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Use A Coupon Code</h5>
              </div>
              <div class="card-body">
                <form method="post">
                  <div class="form-group">
                    <div><?php echo $couponmessage?></div>
                    <label>Enter Your Coupon Code</label>
                    <input type="text" class="form-control" placeholder="4CTFE"  name="coupon_code">
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-success" name="coupon">Apply</button>
                  </div>
                </form>
              </div>
            </div>

      </div>
    </div>
  </div>


