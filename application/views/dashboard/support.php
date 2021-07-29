
  

      <div class="content">
  
        <div class="row">
          <div class="col-md-5">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">Support Ticket</h5>
              </div>
              <div class="card-body">
                 <div><?php echo $message?></div>

               <form method="post">
          				<input type="hidden" name="user_id" value="<?php echo $user->uid?>">
          				<div class="form-group">
          					<input class="form-control" type="text" name="ticket_title" placeholder="title of ticket">
          				</div>
          				<div class="form-group">
          					<textarea class="form-control" name="message" placeholder="message..."></textarea>
          				</div>
          				<div class="form-group">
          					<input type="submit" class="btn btn-primary" name="sendticket" value="send">
          				</div>
          				</form>
              </div>
              <div class="card-footer">
      
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-5">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">Invest Now</h5>
              </div>
              <div class="card-body">
              	
               <table class="table">
                 <tr>
                   <td>Ticket ID</td>
                   <td>Subject</td>
                   <td>Status</td>
                   <td>Date Created</td>
                 </tr>
                 <?php 

                 foreach ($tickets as $key => $value): ?>
	                 <tr>
	                   <td><?php echo $value->ticket_id?></td>
	                   <td><?php echo $value->ticket_title?></td>
	                   <td><?php echo $value->status?></td>
	                   <td><?php echo $value->created?></td>
	                 </tr>
                 <?php endforeach ?>
                 
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

