
      <div class="content">
        <div class="row">
          

        <div class="col-md-5">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Edit Give Away</h5>
              </div>
              <div class="card-body">
                
                <form method="post">
                  <input type="hidden" class="form-control" name="giveaway_id" value="<?php echo $give->gvid?>" required>
                  <div class="form-group"><label>Title</label>
                    <input type="text" class="form-control" name="title" placeholder="New year giv away" value="<?php echo $give->title?>" required>
                  </div>
                     <div class="">
                       
                      <div class="form-group">
                        <label>Network</label>
                        <select name="network_id" id="networks" class="form-control" required>
                          <option value="<?php echo $give->network_id?>"><?php echo $give->network?></option>
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
                        <input type="text" name="airtime_amount" class="form-control" placeholder="200" value="<?php echo $give->gift_value?>">
                      </div>
                      <div class="form-group"><label>Quantity</label>
                        <input type="text" class="form-control" name="quantity" placeholder="5" required value="<?php echo $give->quantity?>">
                      </div>
                      
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-round" name="update_giveaway">Create</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

