

<?php print_r($upcoming_birthdays); ?>
                <!-- Responsive tables start -->
                <div class="row" id="table-responsive">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Upcoming Birthdays</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                            
                                </div>
                                <table class="table table-responsive mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Birthday</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($upcoming_birthdays as $key => $value): ?>
                                        <tr>
                                            <th scope="row"></th>
                                            <td><?php echo $value->full_name ?></td>

                                            <td><?php

                                             echo date("l jS \of F Y", strtotime($value->dob)) ?></td>
                        
                                        </tr>
                                        <?php endforeach ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Responsive tables end -->

                <!-- Responsive tables start -->
                <div class="row" id="table-responsive">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Today's Birthdays</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                            
                                </div>
                                <table class="table table-responsive mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Birthday</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($today_birthdays as $key => $value): ?>
                                        <tr>
                                            <th scope="row"></th>
                                            <td><?php echo $value->full_name ?></td>

                                            <td><?php

                                             echo date("l jS \of F Y", strtotime($value->dob)) ?></td>
                        
                                        </tr>
                                        <?php endforeach ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Responsive tables end -->