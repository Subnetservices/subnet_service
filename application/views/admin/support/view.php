         
                <!-- Responsive tables start -->
                <div class="row" id="table-responsive">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Support Ticket</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div>
                                        <h4> Client: <a href="/admin/users/vw/<?php echo $ticket->uid?>"><?php echo $ticket->full_name?></a></h4>
                                        <h4>Ticket Title - <?php echo $ticket->ticket_title?></h4>
                                        <p>Message: <br>
                                            <?php echo $ticket->message?>
                                            <br><?php echo $ticket->created?></p>
                                    </div>
                                    <div>
                                        <form method="post">
                                            <input type="hidden" name="support_id" value="<?php echo $ticket->spid?>">
                                            <div class="form-group"><label>Reply Message</label>
                                                <textarea name="message" class="form-control" placeholder=" Thank you for contacting support"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary" name="reply" value="Reply">
                                            </div>
                                        </form>
                                    </div>
                                <div>
                                    <!-- replies goes here -->
                                    <?php
                                      $replies = $this->db->select('*')->from('support_replies')->where('support_id',$ticket->spid)->get()->result();
                                      if ($replies) {
                                     foreach ($replies as $key => $value): ?>
                                        <p><?php echo $value->reply?>
                                          <br><small><?php echo $value->created_at?></small> 
                                         </p>
                                    <?php endforeach;
                                      }else{
                                      ?>
                                        
                                      <?php 
                                         }
                                     ?>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Responsive tables end -->