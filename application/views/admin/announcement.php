<!-- Basic Vertical form layout section start -->
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Send general messages</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" method="post" action="">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <input type="hidden" name="user_id" value="<?php echo $user->id?>">
                                                        <div class="form-group">
                                                            <label>Select course to notify your students</label>
                                                           
                                                           <select name="course_id" class="form-control">
                                                            <option>---select course---</option>
                                                                <?php 
                                                                  $courses = $this->db->query("SELECT * FROM courses WHERE user_id='$user->id'")->result();
                                                                  foreach ($courses as $key => $value) {
                                                                  ?>
                                                                    <option value="<?php echo $value->_id?>"><?php echo $value->course_code?></option>
                                                                  <?php
                                                                  
                                                                  }
                                                                ?>
                                            
                                                           </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="message">type in your messages</label>
                                                            <textarea class="form-control" name="message" placeholder="your message goes here"></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-12">
                                                        <button type="submit" name="announce" class="btn btn-primary mr-1 mb-1">Submit</button>
                                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>