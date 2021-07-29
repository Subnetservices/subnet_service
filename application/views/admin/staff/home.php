               
               
                <!-- Colored Avatar Starts -->
                <section id="colored-avatar">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"></h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

                                        <div class="chip mr-1">
                                           <a href="/admin/staff/addnew/" class="btn"><i class="fa fa-plus"> </i> Add</a>
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
                                <h4 class="card-title">Staff</h4>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($allstaff as $key => $value): ?>
                                        <tr>
                                            <th scope="row"></th>
                                            <td><?php echo $value->first_name ?> <span> </span><?php echo $value->last_name ?></td>
                                            <td><?php echo $value->email ?></td>
                                            <td><a href="/admin/staff/vw/<?php echo $value->uid?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>view</a></td>
                                            <td>
                                                <form method="post">
                                                    <input type="hidden" name="user_id" value="<?php echo $value->uid?>">
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