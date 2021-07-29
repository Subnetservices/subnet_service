

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
          				<input type="hidden" name="user_id" value="<?php echo $user->uid?>" >
          				<div class="form-group"><label>Ticket Title <span style="color: red">*</span></label>
          					<input class="form-control" type="text" name="ticket_title" placeholder="title of ticket" required>
          				</div>
          				<div class="form-group"><label>message <span style="color: red">*</span></label>
          					<textarea class="form-control" name="message" placeholder="message..." required> </textarea>
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
                <h5 class="card-title">Previous Tickets</h5>
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
	                   <td><a href="/dashboard/support/v/<?php echo $value->ticket_id?>"><?php echo $value->ticket_title?></td>
	                   <td><?php echo $value->status?></td>
	                   <td><?php echo $value->created?></td>
	                 </tr>
                 <?php endforeach ?>
                 
               </table>
              </div>
              <div class="card-footer">
                
               
              </div>
            </div>
          </div>
        </div>
      </div>
