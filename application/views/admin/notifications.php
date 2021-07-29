
           <!-- Custom Listgroups start -->
                <section id="custom-listgroup">
                    <div class="row match-height">
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                              
                                <div class="card-content">
                                    <div class="card-body">
                                       
                                        <div class="list-group">
                                        	<?php
											  if ($notifs) {
											  	foreach ($notifs as $key => $value) {
											  		if ($value->viewed=='0') {
											  			# code...
											  		
											  		?>
											  		
											  <a href="<?php echo $value->_id?>" class="list-group-item list-group-item-action active">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1 text-white"><?php echo $value->title?></h5>
                                                    <small>3 days ago</small>
                                                </div>
                                                <p class="mb-1"><?php echo $value->content?></p>
                                                 
                                               </a>

											  		<?php
											  	}else{
											  		?>
												  	<a href="#" class="list-group-item list-group-item-action">
	                                                <div class="d-flex w-100 justify-content-between">
	                                                    <h5 class="mb-1"><?php echo $value->title?></h5>
	                                                    <small class="text-muted">3 days ago</small>
	                                                </div>
	                                                <p class="mb-1"><?php echo $value->content?></p>
	                                                </a>

											  		<?php
											  	  }
											  	}
											  }
											?>

                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>