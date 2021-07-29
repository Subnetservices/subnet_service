
           <!-- Custom Listgroups start -->
                <section id="custom-listgroup">
                    <div class="row match-height">
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                            	
                               <div class="card-content">
                                <div class="card-title">
                            		<h4>Testimonials</h4>
                            	</div>
                                    <div class="card-body">
                                       
                                  <table class="table">
                                  	<tr>
                                  		<th>Name</th>
                                  		<th>Testimony</th>
                                  	</tr>
                                	<?php
                                
									  if ($testimonials) {
									  	foreach ($testimonials as $key => $value) {
									?>
									<tr>
										<td><?php echo $value->full_name?></td>
										<td><?php echo $value->testimony?></td>
										<td>
											<form method="post">
												<input type="hidden" name="tsid" value="<?php echo $value->tsid?>">
												<input type="submit" name="approve" value="approve">
											</form>
										</td>
									</tr>
							
									  <?php
									  	}
									  }
									?>
								</table>

                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>