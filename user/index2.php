<?php require_once 'includes/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- BREADCRUMBS -->
            <ol class="breadcrumb bc-3">
                <li class="active">
                    <strong>Home</strong>
                </li>
            </ol>

            <!-- PAGE CONTENT -->
            <div class="row">
                <hr />
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Select Barangay</label>
                        <div class="col-md-12">
                            <select class="form-control" id="select-barangay">
                            <option value="">Select Barangay</option>
                            <?php
                                $sql = "SELECT * FROM tbl_court WHERE status = '1'";
                                $result = $conn->query($sql);
                                if($result->num_rows > 0){
                                    while($court = $result->fetch_assoc()){
                                        ?>
                                        <option value="<?= $court['court_id'] ?>" <?php if(isset($_GET['barangay']) && $_GET['barangay'] == $court['court_id']){echo 'selected';} ?>><?= $court['barangay'] ?></option>
                                        <?php
                                    }
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <?php
                        if(isset($_GET['barangay']) && !empty($_GET['barangay'])){
                            ?>
                                <br>
                                <hr>
                                <a href="javascript:void(0)" class="btn btn-primary btn-block" id="add-reservation">ADD RESERVATION</a>
                                <br>
                                <form id=add-reservation-form>
                                    <div class="form-group">
                                        <label class="control-label">Pick Date</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="datepicker" data-format="yyyy-mm-dd">
                                            
                                            <div class="input-group-addon">
                                                <a href="#"><i class="entypo-calendar"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Start Time</label>
                                            <select class="form-control" id="start-time">
                                                <option>Select Start Time</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">End Time</label>
                                            <select class="form-control" id="end-time">
                                                <option>Select Start Time</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Event</label>
                                            <select class="form-control">
                                                <option>Option 1</option>
                                                <option>Option 2</option>
                                            </select>
                                    </div>
                                </form>

                            <?php

                        }
                    ?>
                    
                </div>
                
                <div class="col-md-9">
                    
                    <div class="row">
                        <div class="col-sm-12">
                        <?php
                            if(isset($_GET['barangay'])){
                            ?>
                                <div class="well">

                                    <!-- Calendar Body -->
                                    <div class="calendar-body">

                                        <div id="calendar"></div>


                                    </div>
                        </div>
                            <?php
                            }
                        ?>
                            
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal-6">
                <div class="modal-dialog">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Reserved List for <span id="date" style="font-weight:600;"></span></h4>
                        </div>
                        
                        <div class="modal-body">
                            
                                <div class="row">
                                    <table class="table table-bordered datatable" id="event-table">                                 
                                        <tr>
                                            <th class="text-center">Time</th>
                                            <th class="text-center">Event</th>
                                            <th class="text-center">User ID</th>
                                        </tr>
                                        <tr id="table-data">                                                                                       
                                        </tr>
                                    </table>
                            </div>
                            
                            
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modal-8">
                <div class="modal-dialog">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Modal Content is Responsive</h4>
                        </div>
                        
                        <div class="modal-body">
                        
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Name</label>
                                        
                                        <input type="text" class="form-control" id="field-1" placeholder="John">
                                    </div>	
                                    
                                </div>
                                
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label for="field-2" class="control-label">Surname</label>
                                        
                                        <input type="text" class="form-control" id="field-2" placeholder="Doe">
                                    </div>	
                                
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="form-group">
                                        <label for="field-3" class="control-label">Address</label>
                                        
                                        <input type="text" class="form-control" id="field-3" placeholder="Address">
                                    </div>	
                                    
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-4">
                                    
                                    <div class="form-group">
                                        <label for="field-4" class="control-label">City</label>
                                        
                                        <input type="text" class="form-control" id="field-4" placeholder="Boston">
                                    </div>	
                                    
                                </div>
                                
                                <div class="col-md-4">
                                    
                                    <div class="form-group">
                                        <label for="field-5" class="control-label">Country</label>
                                        
                                        <input type="text" class="form-control" id="field-5" placeholder="United States">
                                    </div>	
                                
                                </div>
                                
                                <div class="col-md-4">
                                    
                                    <div class="form-group">
                                        <label for="field-6" class="control-label">Zip</label>
                                        
                                        <input type="text" class="form-control" id="field-6" placeholder="123456">
                                    </div>	
                                
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="form-group no-margin">
                                        <label for="field-7" class="control-label">Personal Info</label>
                                        
                                        <textarea class="form-control autogrow" id="field-7" placeholder="Write something about yourself"></textarea>
                                    </div>	
                                    
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-info">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            
            

            <!-- End of PAGE CONTENT -->
        </div>
    </div>
</div>


<?php require_once 'includes/footer.php'?>