
      <div class="content">
        <div class="row">
          

        <div class="col-md-5">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Create a Give Away</h5>
              </div>
              <div class="card-body">
                
                <form method="post">
                  <div class="form-group"><label>Title</label>
                    <input type="text" class="form-control" name="title" placeholder="New year giv away" required>
                  </div>
                     <div class="">
                       
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
                        <label>Airtime Amount (NGN)</label>
                        <input type="text" name="airtime_amount" class="form-control" placeholder="200">
                      </div>
                      <div class="form-group"><label>Quantity</label>
                        <input type="text" class="form-control" name="quantity" placeholder="5" required>
                      </div>
                      
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-round" name="create_airtime">Create</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

      </div>
    </div>


    <div class="row">
          <div class="col-md-12">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">Give Aways</h5>
              </div>
              <div class="card-body">
            
               <table class="table">
                 <tr>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Network</th>
                    <th>Available</th>
                    <th>Date</th>
                    <th>Link</th>
                    <th></th>
                 </tr>
                 <?php 
                  if($giveaways){
                   foreach ($giveaways as $key => $value): ?>
                     <tr>
                       <td><?php echo  $value->title ?></td>
                       <td><?php echo  $value->gift_value ?></td>
                       <td><?php echo  $value->network ?></td>
                       <td><?php echo  $value->quantity ?></td>
                       <td><?php echo  $value->created_at ?></td>
                       <td><a href="http://<?php echo $_SERVER['SERVER_NAME']?>/giveaway?gift_id=<?php echo  $value->gvid ?>"><?php echo $_SERVER['SERVER_NAME']?>/giveaway?gift_id=<?php echo  $value->gvid ?></a></td>
                       <td><a href="/dashboard/giveaway/edit/<?php echo  $value->gvid ?>">Edit</a></td>
                     </tr>
                 <?php
                  endforeach;
                  }
                  ?>
                 
               </table>
              </div>
              </div>
            </div>
          </div>
        </div>
  </div>

