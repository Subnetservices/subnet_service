        


                    <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit your Profile</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" method="post" action="">
                                            <input type="hidden" name="user_id" value="<?php echo $user->id ?>">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">First Name</label>
                                                            <input type="text" id="first-name-vertical" class="form-control" name="first_name" value="<?php echo $user->first_name?>" placeholder="First Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">Last Name</label>
                                                            <input type="text" id="first-name-vertical" class="form-control" name="last_name" value="<?php echo $user->last_name?>" placeholder="First Name">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Email</label>
                                                            <input type="email" id="email-id-vertical" class="form-control" name="email" placeholder="Email" value="<?php echo $user->email?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="contact-info-vertical">Mobile</label>
                                                            <input type="number" id="contact-info-vertical" class="form-control" name="phone" value="<?php echo $user->phone?>" placeholder="Mobile">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1" name="update">Save</button>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Change Password</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical">
                                            <input type="hidden" name="user_id" value="<?php echo $user->id ?>">
                                            <div class="form-body">
                                                <div class="row">
                                                    
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="password-vertical">Password</label>
                                                            <input type="password" id="password-vertical" class="form-control" name="password" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="password-vertical">Retype Password</label>
                                                            <input type="password" id="password-vertical" class="form-control" name="password2" placeholder="Password">
                                                        </div>
                                                    </div>
                                                                                                        
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1" name="update_password">Save</button>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>