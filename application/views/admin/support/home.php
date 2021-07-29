               

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
                                            <th scope="col">Ticket ID</th>
                                            <th scope="col">User</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tickets as $key => $value): ?>
                                        <tr>
                                            <th scope="row"></th>
                                            <td><?php echo $value->ticket_id ?></td>
                                            <td><?php echo $value->full_name ?> </td>
                                            <td><?php echo $value->ticket_title ?> </td>
                                            
                                            
                                            <td><span class="badge badge-success"><?php echo $value->status ?></span></td>
                                            <td><?php echo $value->created ?></td>
                                            <td></td>
                                            <td><a href="/admin/support/v/<?php echo $value->spid?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>view</a></
               
                                        </tr>
                                        <?php endforeach ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Responsive tables end -->