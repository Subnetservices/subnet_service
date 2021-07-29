               
               
                <!-- Colored Avatar Starts -->
                <section id="colored-avatar">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Colored Avatar</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                       
                                     
                                        <div class="chip mr-1">
                                            <div class="chip-body">
                                                <div class="avatar bg-success">
                                                    <span>HT</span>
                                                </div>
                                                <span class="chip-text">Avatar Text</span>
                                            </div>
                                        </div>
                                        <div class="chip mr-1">
                                            <div class="chip-body">
                                                <div class="avatar bg-info">
                                                    <i class="feather icon-user"></i>
                                                </div>
                                                <span class="chip-text">Avatar Text</span>
                                            </div>
                                        </div>
                                        <div class="chip mr-1">
                                            <div class="chip-body">
                                                <div class="avatar bg-danger">
                                                    <i class="feather icon-user"></i>
                                                </div>
                                                <span class="chip-text">Avatar Text</span>
                                            </div>
                                        </div>
                                        <div class="chip mr-1">
                                            <div class="chip-body">
                                                <div class="avatar bg-warning">
                                                    <i class="feather icon-user"></i>
                                                </div>
                                                <span class="chip-text">Avatar Text</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Colored Avatar Ends -->



                <!-- Responsive tables start -->
                <div class="row" id="table-responsive">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Users</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                            
                                </div>
                                <table class="table table-responsive mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">phone</th>
                                            <th scope="col">Active</th>
                                            <th scope="col">Registered At</th>
                                            <th scope="col">Wallet</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($allusers as $key => $value): ?>
                                        <tr>
                                            <th scope="row"></th>
                                            <td><?php echo $value->full_name ?></td>
                                            <td><?php echo $value->email ?></td>
                                            <td><?php echo $value->phone ?></td>
                                            <td><?php echo $value->active ?></td>
                                            <td><?php echo $value->created_on ?></td>
                                            <td><span>&#8358;</span><?php echo $value->amount ?></td>
                                            <td><a href="/admin/users/vw/<?php echo $value->uid?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>view</a></td>
                                            <td>
                                            <form method="post">
                                                <input type="hidden" name="user_id" value="<?php echo $value->uid?>">
                                                <input type="hidden" name="block">

                                                <!-- <button class="btn btn-danger btn-sm">block</button> -->
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