               
               
            
                <!-- Responsive tables start -->
                <div class="row" id="table-responsive">
                    <div class="col-5">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Data plans</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
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
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Staff</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                            
                                </div>
                                <table class="table table-responsive mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Plan</th>
                                            <th scope="col">Old Price</th>
                                            <th scope="col">New Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dataplans as $key => $value): ?>
                                        <tr>
                                            <th scope="row"></th>
                                            <td><?php echo $value->product_value ?>MB</td>
                                            <td><span>&#8358;</span><?php echo $value->old_price ?></td>
                                            <td><span>&#8358;</span><?php echo $value->current_price ?></td>
                                            <td><a href="/admin/staff/vw" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>view</a></td>
                                            <td>
                                                <form method="post">
                                                    <input type="hidden" name="user_id" value="<?php echo $value->prid?>">
                                                    <input type="hidden" name="rmu">
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
                <!-- Responsive tables end -->