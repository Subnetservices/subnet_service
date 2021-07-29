               
               
               
            
                <!-- Responsive tables start -->
                <div class="row" id="table-responsive">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Coupon Codes</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="">
                                        <form method="post">
                                            <div class="form-group"><label>Coupon Cod</label>
                                                <input type="text" class="form-control" name="coupon_code" placeholder="wER48" required>
                                            </div>
                                            <div class="form-group"><label>Amount</label>
                                                <input type="text" class="form-control" name="amount" placeholder="0.00" required>
                                            </div>
                                            <div class="form-group"><label>Limit</label>
                                                <input type="text" class="form-control" name="limit" placeholder="20" required>
                                            </div>
                                             
                                            <div class="form-group">
                                                <input type="submit" name="addcoupon" value="Add" class="btn btn-success">
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
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Coupons</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                            
                                </div>
                                <table class="table table-responsive mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Coupon Code</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Available</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($coupons as $key => $value): ?>
                                        <tr>
                                            <th scope="row"></th>
                                            <td><?php echo $value->coupon_code ?></td>
                                            <td><span>&#8358;</span><?php echo $value->coupon_amount?></td>
                                            <td><?php echo $value->available ?></td>
                                            <td><a href="/admin/coupon/edit/<?php echo $value->cpid?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>view</a></td>
                                            <td>
                                                <form method="post">
                                                    <input type="hidden" name="cpid" value="<?php echo $value->cpid?>">
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