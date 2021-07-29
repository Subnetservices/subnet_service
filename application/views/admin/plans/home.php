               
               
            
                <!-- Responsive tables start -->
                <div class="row" id="table-responsive">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Data plans</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div>
                                        <?php //echo $message; ?>
                                    </div>
                                    <div class="">
                                        <form method="post">
                                            <div class="form-group"><label>Bundle Plan GB/MB</label>
                                                <input type="text" class="form-control" name="product_value" placeholder="1024">
                                            </div>
                                            <div class="form-group"><label>Current price</label>
                                                <input type="text" class="form-control" name="current_price" placeholder="0.00">
                                            </div>
                                            <div class="form-group"><label>Old Price</label>
                                                <input type="text" class="form-control" name="old_price" placeholder="0.00">
                                            </div>
                                            <div class="form-group"><label>Wallet Price</label>
                                                <input type="text" class="form-control" name="wallet_price" placeholder="0.00">
                                            </div>
                                            <div class="form-group"><label>Network</label>
                                                <select name="network" class="form-control">
                                                    <option value="mtn">MTN</option>
                                                    <option value="airtel">airtel</option>
                                                    <option value="9mobile">9mobile</option>
                                                    <option value="glo">GLO</option>
                                                </select>
                                            </div>
                                            <div class="form-group"><label>Network ID</label>
                                                <input type="text" class="form-control" name="network_id" placeholder="123">
                                            </div>
                                            <div class="form-group"><label>Product ID</label>
                                                <input type="text" class="form-control" name="product_id" placeholder="123">
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="submit" name="addplan" value="Add" class="btn btn-success">
                                            </div>
                                        </form>
                                    </div>
                            
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Responsive tables end -->

                  <!-- Responsive tables start -->
                <div class="row" id="table-responsive">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Plans</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                <div>
                                    <?php echo $message; ?>
                                </div>
                                
                                <table class="table table-responsive mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Plan</th>
                                            <th scope="col">Old Price</th>
                                            <th scope="col">New Price</th>
                                            <th scope="col">Wallet Price</th>
                                            <th scope="col">Network</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dataplans as $key => $value): ?>
                                        <tr>
                                            <th scope="row"></th>
                                            <td><?php echo $value->product_value ?>MB</td>
                                            <td><span>&#8358;</span><?php echo $value->old_price ?></td>
                                            <td><span>&#8358;</span><?php echo $value->current_price ?></td>
                                            <td><span>&#8358;</span><?php echo $value->wallet_price ?></td>
                                            <td><?php echo $value->network ?></td>
                                            <td><a href="/admin/dataplans/edit/<?php echo $value->prid?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>edit</a></td>
                                            <td>
                                                <form method="post">
                                                    <input type="hidden" name="plid" value="<?php echo $value->prid?>">
                                                    <input type="hidden" name="rmp">
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
               
                                        </tr>
                                        <?php endforeach ?>
                                        
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Responsive tables end -->