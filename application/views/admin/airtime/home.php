               
               
            
                <!-- Responsive tables start -->
                <div class="row" id="table-responsive">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Create Airtime</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="">
                                        <form method="post">
                                        
                                            
                                            <div class="form-group"><label>Network</label>
                                                <select name="network" class="form-control">
                                                    <option value="mtn">MTN</option>
                                                    <option value="airtel">airtel</option>
                                                    <option value="9mobile">9mobile</option>
                                                    <option value="glo">GLO</option>
                                                </select>
                                            </div>
                                             <div class="form-group"><label>Network ID</label>
                                                <input type="text" class="form-control" name="network_id" placeholder="1">
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
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Airtime Network</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                            
                                </div>
                                <table class="table table-responsive mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Network ID</th>
                                            <th scope="col">Network</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                          $airtime = $this->db->select('')->from('products')->where('product_type','airtime')->get()->result();
                                         foreach ($airtime as $key => $value): ?>
                                        <tr>
                                            <th scope="row"></th>
                                            
                                            <td><?php echo $value->network_id ?></td>
                                            <td><?php echo $value->network ?></td>
                                            <td><a href="/admin/airtime/edit/<?php echo $value->prid?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>edit</a></td>
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