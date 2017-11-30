<?php require_once 'includes/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- BREADCRUMBS -->
            <ol class="breadcrumb bc-3">
                <li>
                    <a href="index.php">
                        <i class="fa-home"></i>Home</a>
                </li>
                <li class="active">
                    <strong>Add Court</strong>
                </li>
            </ol>

            <!-- PAGE CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <hr />

                    <h2>Add Court</h2>
                        <br />
                        
                        <div class="panel panel-primary">
                        
                            <div class="panel-heading">
                                <div class="panel-title">Fill up the required Information</div>
                            </div>
                        
                            <div class="panel-body">
                        
                                <form id="add_court_form">
                        
                                    <div class="form-group input-barangay">
                                        <label class="control-label">Barangay</label>

                                        <input type="text" class="form-control" name="barangay" id="barangay"  placeholder="e.g. Sta Rita" />
                                    </div>
                        
                                    <div class="form-group input-courtname">
                                        <label class="control-label">Court Name</label>
                        
                                        <input type="text" class="form-control" name="court_name" id="court_name" placeholder="e.g. Nelly Brown" />
                                    </div>

                                    <div class="form-group input-status">
                                        <label class="control-label">Status</label>
                        
                                        <select class="form-control" name="status" id="status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                        
                                    <div class="form-group">
                                        <button id="add_court" class="btn btn-success">Submit</button>
                                    </div>
                        
                                </form>
                        
                            </div>
                        
                        </div>
                </div>
                <div class="col-md-12">
                    <h2>Court List</h2>

                    <br />

                    <script type="text/javascript">
                        jQuery(document).ready(function ($) {
                            var $table1 = jQuery('#table-1');

                            // Initialize DataTable
                            $table1.DataTable({
                                "aLengthMenu": [
                                    [10, 25, 50, -1],
                                    [10, 25, 50, "All"]
                                ],
                                "bStateSave": true
                            });

                            // Initalize Select Dropdown after DataTables is created
                            $table1.closest('.dataTables_wrapper').find('select').select2({
                                minimumResultsForSearch: -1
                            });
                        });
                    </script>

                    <table class="table table-bordered datatable" id="table-1">
                        <thead>
                            <tr>
                                <th data-hide="phone">#</th>
                                <th>Barangay</th>
                                <th data-hide="phone">Name</th>
                                <th data-hide="phone,tablet">Date Added</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 1;
                            $sql = "SELECT * FROM tbl_court";
                            $result = $conn->query($sql);
                            if($result->num_rows > 0){
                                while($court = $result->fetch_assoc()){
                                    ?>
                                    <tr class="odd gradeX" <?php if($court['status'] == '0'){ echo 'style="background-color:#e89797;color:#ffffff;"';} ?>>
                                        <td><?= $i ?></td>
                                        <td><?= $court['barangay'] ?></td>
                                        <td><?= $court['court_name'] ?></td>
                                        <td class="center"><?= $court['timestamp_created'] ?></td>
                                        <td class="center">
                                            <a href="javascript:void(0)" onclick="jQuery('#modal-id-<?= $court['court_id'] ?>').modal('show', {backdrop: 'static'});" class="btn btn-default btn-sm btn-icon icon-left">
                                                <i class="entypo-pencil"></i>
                                                Edit
                                            </a>
                                            
                                            <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                                <i class="entypo-cancel"></i>
                                                Delete
                                            </a>    

                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-id-<?= $court['court_id'] ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title">Update Court Details</h4>
                                                </div>
                                                
                                                <div class="modal-body">
                                                
                                                    <form id="edit_court_form" data-id="<?= $court['court_id'] ?>">
                                                            <input type="hidden" name="id" id="court_id" value="<?= $court['court_id'] ?>">
                                                
                                                            <div class="form-group input-barangay">
                                                                <label class="control-label">Barangay</label>
                        
                                                                <input type="text" class="form-control" name="barangay" id="barangay" value="<?= $court['barangay'] ?>" />
                                                            </div>
                                                
                                                            <div class="form-group input-courtname">
                                                                <label class="control-label">Court Name</label>
                                                
                                                                <input type="text" class="form-control" name="court_name" id="court_name" value="<?= $court['court_name'] ?>" />
                                                            </div>
                        
                                                            <div class="form-group input-status">
                                                                <label class="control-label">Status</label>
                                                
                                                                <select class="form-control" name="status" id="status">
                                                                    <option value="1" <?php if($court['status'] == 1){echo 'selected';} ?>>Active</option>
                                                                    <option value="0" <?php if($court['status'] == 0){echo 'selected';} ?>>Inactive</option>
                                                                </select>
                                                            </div>
                                                        
                                                </div>
                                                
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-info">Save changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $i++;
                                }
                            }
                            
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- End of PAGE CONTENT -->
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'?>