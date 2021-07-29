
                <div class="row" id="table-responsive">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">User Information</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="form-group">
                                        <span>Name: <?php echo $clients->full_name?></span>
                                    </div>
                                    <div class="form-group">
                                        <span>Email: <?php echo $clients->email?></span>
                                    </div>
                                    <div class="form-group">
                                        <span>Phone: <?php echo $clients->phone?></span>
                                    </div>
                                    <div class="form-group">
                                        <?php $wallet = $this->db->select('*')->from('wallet')->where('user_id',$clients->uid)->get()->row(); ?>
                                        Wallet Balance:<span style="color: green"> NGN <?php echo $wallet->amount?></span>
                                    </div>
                                    <div>
                                        <form method="post">
                                            <p>
                                                <?php echo $message?>
                                            </p>

                                            <h5>Add to Clients Wallet</h5>
                                            <input type="hidden" name="client_id" value="<?php echo $clients->uid?>">
                                            <div class=" form-group">
                                                <label>Amount (NGN)</label>
                                                <input type="text" name="amount" class="form-control" placeholder="00.00">
                                                
                                            </div>
                                            <div class="form-group">
                                            <input type="submit" name="fundwallet" value="Fund Wallet" class="btn btn-primary btn-sm">
     
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="row" id="table-responsive">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">User Transactions</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <table class="table table-responsive">
                                        <tr>
                                            <th>Referrence</th>
                                            <th>Plan</th>
                                            <th>Amount</th>
                                            <th>Network</th>
                                            <th>Phone Number</th>
                                            <th>Payment Method</th>
                                            <th>Status</th>
                                            <th>Time</th>
                                        </tr>
                                        <?php #;
                                        //print_r($clients);
                                         $transactions = $this->db->select('*')->from('transactions')->where('user_id',$clients->uid)->order_by('payment_time','desc')->limit(20)->get()->result();
                                       //  print_r($transactions);
                                        if ($transactions): ?>
                                            <?php foreach ($transactions as $key => $value): ?>
                                                <tr>
                                                    <td><?php echo $value->referrence?></td>
                                                    <td><?php 
                                                    if ($value->plan=='wallet') {
                                                        echo "Funded Wallet";
                                                    }else{
                                                        echo $value->plan."MB";
                                                    }
                                                    
                                                    ?></td>
                                                    <td>NGN<?php echo $value->amount?></td>
                                                    <td><?php echo $value->network?></td>
                                                    <td><?php echo $value->phone_number?></td>
                                                    <td><?php echo $value->payment_method?></td>
                                                    <td><?php 
                                                    if ($value->status=='success') {
                                                        echo "<span class='badge badge-success'>success</span>";
                                                    }else{
                                                        echo "<span class='badge badge-warning' >pending</span>";
                                                    }
                                                    ?></td>
                                                    <td><?php echo $value->payment_time?></td>
                                                </tr>
                                            <?php endforeach ?>
                                            
                                            
                                        <?php endif ?>
                                        
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>


