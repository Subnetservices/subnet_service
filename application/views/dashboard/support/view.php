
  

      <div class="content">
  

        <div class="row">
          <div class="col-md-5">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">Ticket Title - <?php echo $ticket->ticket_title?></h5>
              </div>
              <div class="card-body">
              	
            
                 <?php 
                  $replies = $this->db->select('*')->from('support_replies')->where('support_id',$ticket->spid)->get()->result();
                 foreach ($replies as $key => $value): ?>
	                 
	                   <p><?php echo $value->reply?>
                      <br><small><?php echo $value->created_at?></small> 
                     </p>
	
                 <?php endforeach ?>

              </div>
            </div>
          </div>
        </div>
      </div>

