               
               
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
                    <div class="col-6">
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
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($blockedusers as $key => $value): ?>
                                        <tr>
                                            <th scope="row"></th>
                                            <td><?php echo $value->full_name ?> <span> </span><?php echo $value->last_name ?></td>
                                            <td><?php echo $value->email ?></td>
                                            <td>
                                            <form method="post">
                                                <input type="hidden" name="user_id" value="<?php echo $value->uid?>">
                                                <input type="hidden" name="unblock">

                                                <button class="btn btn-warning btn-sm">Unblock</button>
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