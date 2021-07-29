
      <div class="content">
     

          <div class="col-md-7">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Edit Profile</h5>
              </div>
              <div class="card-body">
                <div><?php echo $profile_message;?></div>
                <form method="post">
                    
                      <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" placeholder="Full Name" value="<?php echo $user->full_name?>" name="full_name">
                      </div>
                      
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" placeholder="Phone Number" value="<?php echo $user->phone?>" name="phone">
                      </div>
                      <div class="form-group">
                        <label>Birthday</label>
                        <input type="date" class="form-control" placeholder="Phone Number" value="<?php echo $user->dob?>" name="birthday">
                      </div>
                       
                 
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" placeholder="Email" value="<?php echo $user->email?>" readonly>
                      </div>
                  
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round" name="updateprofile">Update</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <div class="row">

            <div class="col-md-6">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Change Password</h5>
              </div>
              <div class="card-body">
                <div>
                  <?php echo $password_message?>
                </div>
                <form method="post" >
                  <input type="hidden" name="user_id" value="<?php echo $user->uid?>">
                   
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" >
                      </div>
                    
                      <div class="form-group">
                        <label>Retype Password</label>
                        <input type="password" class="form-control" name="password2" placeholder="Retype your password">
                      </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-round" name="updatepassword">Change</button>
                    </div>
  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>