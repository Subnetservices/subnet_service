
  

      <div class="content">
  
        <div class="row">
          <div class="col-md-5">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">Transactions</h5>
              </div>
              <div class="card-body">
            
               <table class="table">
                 <tr>
                    <th>Bundle</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date</th>
                 </tr>
  
                 <?php 
                  if($transactions){
                 foreach ($transactions as $key => $value): ?>
                   <tr>
                     <td><?php echo  $value->plan ?></td>
                     <td><?php echo  $value->amount ?></td>
                     <td><?php echo  $value->status ?></td>
                     <td><?php echo  $value->payment_time ?></td>
     
                   </tr>
                 <?php
                  endforeach;
                  }
                  ?>
                 
               </table>
              </div>
              <div class="card-footer">
                
                <hr/>
                <div class="card-stats">
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>