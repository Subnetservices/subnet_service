
  

      <div class="content">
  
        <div class="row">
          <div class="col-md-5">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">Loyalty Points [<?php echo $loyalty->points?>]</h5>
              </div>
              <div class="card-body">
                <?php echo $message; ?>

                <form method="post">

                  <table class="table">
                <?php if ($loyalty->points>=20 && $loyalty->points<50): ?>
                  <tr>
                    <td>N100 (20pts)</td><td><input type="radio" value="100" name="points" checked></td>
                  </tr>
                <?php elseif ($loyalty->points>=50 && $loyalty->points<200): ?>
                  <tr>
                    <td>N100 (20pts)</td><td><input type="radio" value="20" name="points"></td>
                  </tr>
                  <tr>
                    <td>N200 (50pts)</td><td><input type="radio" value="50" name="points"></td>
                  </tr>
                  
                <?php elseif ($loyalty->points>=200 && $loyalty->points<500): ?>
                  <tr>
                    <td>N100 (20pts)</td><td><input type="radio" value="100" name="points" checked></td>
                  </tr>
                  <tr>
                    <td>N200 (50pts)</td><td><input type="radio" value="50" name="points"></td>
                  </tr>
                  <tr>
                    <td>N9000 (200pts)</td><td><input type="radio" value="200" name="points"></td>
                  </tr>
                  
                <?php elseif ($loyalty->points>=500 && $loyalty->points<1000): ?>
                  <tr>
                    <td>N100 (20pts)</td><td><input type="radio" value="100" name="points" checked></td>
                  </tr>
                  <tr>
                    <td>N200 (50pts)</td><td><input type="radio" value="50" name="points"></td>
                  </tr>
                  <tr>
                    <td>N9000 (200pts)</td><td><input type="radio" value="200" name="points"></td>
                  </tr>
                  <tr>
                    <td>N1200 (500pts)</td><td><input type="radio" value="500" name="points"></td>
                  </tr>
                <?php elseif ($loyalty->points>=1000): ?>
                  <tr>
                    <td>N100 (20pts)</td><td><input type="radio" value="100" name="points" checked></td>
                  </tr>
                  <tr>
                    <td>N200 (50pts)</td><td><input type="radio" value="50" name="points"></td>
                  </tr>
                  <tr>
                    <td>N9000 (200pts)</td><td><input type="radio" value="200" name="points"></td>
                  </tr>
                  <tr>
                    <td>N3000(1000pts)</td><td><input type="radio" value="1000" name="points"></td>
                  </tr>
                <?php endif ?>
                 
               </table>
               <div class="form-group">
                        <label>Network</label>
                        <select name="network_id" id="networks" class="form-control" required>
                          <option value="">--Select Network--</option>
                          <?php 
                           $airtime = $this->db->select('*')->from('products')->where('product_type','airtime')->get()->result();
                          foreach ($airtime as $key => $value): ?>
                            <option value="<?php echo $value->network_id?>"> <?php echo $value->network?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                 <div class="form-group">
                   <input type="phone_number" name="phone_number" size="15" class="form-control" placeholder="2348045443011" required="yes">
                 </div>

                 <div class="form-group">
                   <button class="btn btn-success" name="redeem">Redeem</button>
                 </div>
               </form>
              </div>
              <div class="card-footer">

                <div class="card-stats">
                  <i class="fa fa-check"></i>Pick One points
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>