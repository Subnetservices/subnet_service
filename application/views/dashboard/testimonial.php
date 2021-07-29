
  

      <div class="content">
  
        <div class="row">
          <div class="col-md-5">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">Testify About the Platform</h5>
              </div>
              <div class="card-body">
                <div><?php echo $message?></div>

         <form method="post">
				<input type="hidden" name="user_id" value="<?php echo $user->uid?>">
				<div class="form-group">
					<textarea class="form-control" name="testimony" placeholder="Your testimony goes here....."></textarea>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="testify" value="send">
				</div>
				</form>
               </table>
              </div>
              <div class="card-footer">
      
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-7">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">Your Testimonies</h5>
              </div>
              <div class="card-body">
              	
               <table class="table">
                 <tr>
                   <th>Testimony</th>
                   <th>Approved</th>
                 </tr>

                 <?php 
                   if (count($testimonials)>0) {
                   foreach ($testimonials as $key => $value): ?>
  	                 <tr>
  	                   <td><?php echo $value->testimony?></td>
  	                   <td><?php echo $value->approved?></td>
  	                 </tr>
                   <?php endforeach ?>
                 <?php }else{ echo "<tr><td>you don't have any record</td></tr>";} ?>
               

                 
               </table>
              </div>
              <div class="card-footer">
                
                <hr/>
                <div class="card-stats">
                  <i class="fa fa-check"></i> Your investment should not be less than your previous investment
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

