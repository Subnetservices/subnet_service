                    <div class="col-xl-10 col-md-6 col-sm-12 profile-card-2">
                            <div class="card">
                                <div class="card-header mx-auto pb-0">
                                    <div class="row m-0">
                                        <div class="col-sm-12 text-center">
                                            <h4><?php echo $user->first_name?><span> </span><?php echo $user->last_name?></h4>
                                        </div>
                                        <div class="col-sm-12 text-center">
                                            <p class=""><?php echo $user->role?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body text-center mx-auto">
                                        <div class="avatar avatar-xl">
                                            <img class="img-fluid" src="/assets/images/portrait/small/avatar-s-12.png" alt="img placeholder">
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="uploads">
                                                <p class="font-weight-bold font-medium-2 mb-0"><?php echo $user->about?></p>
                                                <span class="">Uploads</span>
                                            </div>
                                            <div class="followers">
                                                <p class="font-weight-bold font-medium-2 mb-0"><?php echo $user->address?></p>
                                                <span class="">Followers</span>
                                            </div>
                                            <div class="following">
                                                <p class="font-weight-bold font-medium-2 mb-0"><?php echo $user->email?></p>
                                                <span class="">Following</span>
                                            </div>
                                        </div>
                                        <button class="btn gradient-light-primary btn-block mt-2">Follow</button>
                                    </div>
                                </div>
                            </div>
                        </div>