               
               
               
            
                <!-- Responsive tables start -->
                <div class="row" id="table-responsive">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Coupon</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="">
                                        <form method="post">
                                            <input type="hidden" name="cpid" value="<?php echo $coupon->cpid?>" >
                                            <div class="form-group"><label>Coupon Cod</label>
                                                <input type="text" class="form-control" name="coupon_code" placeholder="wER48" value="<?php echo $coupon->coupon_code?>" required>
                                            </div>
                                            <div class="form-group"><label>Amount</label>
                                                <input type="text" class="form-control" name="coupon_amount" value="<?php echo $coupon->coupon_amount?>"  placeholder="0.00" required>
                                            </div>
                                            <div class="form-group"><label>Limit</label>
                                                <input type="text" class="form-control" name="available" value="<?php echo $coupon->available?>" placeholder="20" required>
                                            </div>
                                             
                                            <div class="form-group">
                                                <input type="submit" name="updatecoupon" value="Save" class="btn btn-success">
                                            </div>
                                        </form>
                                    </div>
                            
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Responsive tables end -->
