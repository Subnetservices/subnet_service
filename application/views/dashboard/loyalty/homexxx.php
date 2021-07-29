
  

      <div class="content">
  
        <div class="row">
          <div class="col-md-5">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">Loyalty Points [<?php echo $loyalty->points?>]</h5>
              </div>
              <div class="card-body">
                <form method="post">
                  <div class="form-group">
                 <select name="network_id" class="form-control">
                   <option></option>
                 </select>
               </div>
               <table class="table">
                <?php if ($loyalty->points>=20 && $loyalty->points<50): ?>
                  <tr>
                    <td>N100 (20pts)</td><td><input type="radio" name="redeemable"></td>
                  </tr>
                <?php elseif ($loyalty->points>=50 && $loyalty->points<200): ?>
                  <tr>
                    <td>N100 (20pts)</td><td><input type="radio" name="redeemable"></td>
                  </tr>
                  <tr>
                    <td>500MB Or N300</td><td><input type="radio" name="redeemable"></td>
                  </tr>
                <?php elseif ($loyalty->points>=200 && $loyalty->points<500): ?>
                  <tr>
                    <td>N100 (20pts)</td><td><input type="radio" name="redeemable"></td>
                  </tr>
                  <tr>
                    <td>500MB Or N300</td><td><input type="radio" name="redeemable"></td>
                  </tr>
                  <tr>
                    <td>3GB Or N950</td><td><input type="radio" name="redeemable"></td>
                  </tr>
                <?php elseif ($loyalty->points>=500 && $loyalty->points<1000): ?>
                  <tr>
                    <td>N100 (20pts)</td><td><input type="radio" name="redeemable"></td>
                  </tr>
                  <tr>
                    <td>500MB Or N300</td><td><input type="radio" name="redeemable"></td>
                  </tr>
                  <tr>
                    <td>3GB Or N950</td><td><input type="radio" name="redeemable"></td>
                  </tr>
                  <tr>
                    <td>5GB Or N1200</td><td><input type="radio" name="redeemable"></td>
                  </tr>
                <?php elseif ($loyalty->points>=1000): ?>
                  <tr>
                    <td>N100 (20pts)</td><td><input type="radio" name="redeemable"></td>
                  </tr>
                  <tr>
                    <td>500MB Or N300</td><td><input type="radio" name="redeemable"></td>
                  </tr>
                  <tr>
                    <td>3GB Or N950</td><td><input type="radio" name="redeemable"></td>
                  </tr>
                  <tr>
                    <td>5GB Or N1200</td><td><input type="radio" name="redeemable"></td>
                  </tr>
                  <tr>
                    <td>10GB Or N3000</td><td><input type="radio" name="redeemable"></td>
                  </tr>
                <?php endif ?>
                 
               </table>
               
               <div class="form-group">
                 <input type="number" step="20" name="phone_number" size="60" class="form-control" placeholder="20">
               </div>

                 <div class="form-group">
                   <button class="btn btn-success" name="redeem">Redeem</button>
                 </div>
               </form>
              </div>
              <div class="card-footer">

                <div class="card-stats">
                  <i class="fa fa-check"></i>Pick One redeemable
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>