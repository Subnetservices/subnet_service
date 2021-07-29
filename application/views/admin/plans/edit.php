          
            
                <!-- Responsive tables start -->
                <div class="row" id="table-responsive">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Data plans</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="">
                                        <form method="post">
                                            <input type="hidden" name="plid" value="<?php echo $plan->prid?>">
                                            <div class="form-group"><label>Bundle Plan GB/MB</label>
                                                <input type="text" class="form-control" name="product_value" placeholder="1024" value="<?php echo $plan->product_value?>">
                                            </div>
                                            <div class="form-group"><label>Current price</label>
                                                <input type="text" class="form-control" name="current_price" placeholder="0.00" value="<?php echo $plan->current_price?>">
                                            </div>
                                            <div class="form-group"><label>Old Price</label>
                                                <input type="text" class="form-control" name="old_price" placeholder="0.00" value="<?php echo $plan->old_price?>">
                                            </div>
                                            <div class="form-group"><label>Wallet Price</label>
                                                <input type="text" class="form-control" name="wallet_price" placeholder="0.00" value="<?php echo $plan->wallet_price?>">
                                            </div>
                                            <div class="form-group"><label>Network</label>
                                                <select name="network" class="form-control">
                                                    <option value="<?php echo $plan->network?>"><?php echo $plan->network?></option>
                                                    <option value="mtn">MTN</option>
                                                    <option value="airtel">airtel</option>
                                                    <option value="9mobile">9mobile</option>
                                                    <option value="glo">GLO</option>
                                                </select>
                                            </div>
                                            <div class="form-group"><label>Network ID</label>
                                                <input type="text" class="form-control" name="network_id" placeholder="123" value="<?php echo $plan->network_id?>">
                                            </div>
                                            <div class="form-group"><label>Product ID</label>
                                                <input type="text" class="form-control" name="product_id" placeholder="123" value="<?php echo $plan->product_id?>">
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="submit" name="updateplan" value="Update" class="btn btn-success">
                                            </div>
                                        </form>
                                    </div>
                            
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Responsive tables end -->