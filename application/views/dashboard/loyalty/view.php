
  

      <div class="content">
  
        <div class="row">
          <div class="col-md-5">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">Referrals</h5>
              </div>
              <div class="card-body">
                <div>Your referral Link
                 <code> <span>http://example.com/?ref=23234</span></code>
                </div>
               <table class="table">
                 <tr>
                 
                 <?php 
                 if ($referrals) {
                  
                 foreach ($referrals as $key => $value): ?>
                   <tr>
                     <td><?php echo $value->username?></td>
     
                   </tr>
                 <?php endforeach;
                  # code...
                 }
                 ?>
                 
               </table>
              </div>
              <div class="card-footer">
                
                <hr/>
                <div class="card-stats">
                  <i class="fa fa-check"></i> Your referral list
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>