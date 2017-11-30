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
                    <strong>Users</strong>
                </li>
            </ol>

            <!-- PAGE CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <hr />
                    <h2>Data Tables</h2>

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
                                <th data-hide="phone">ID #</th>
                                <th>Name</th>
                                <th data-hide="phone">Email</th>
                                <th data-hide="phone,tablet">Contact Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql="SELECT * FROM tbl_user";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?= $row['id'] ?></td>
                                                <td><?= $row['full_name'] ?></td>
                                                <td><?= $row['email'] ?></td>
                                                <td><?= $row['contact'] ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-default btn-sm btn-icon icon-left">
                                                        <i class="entypo-pencil"></i>
                                                        Edit
                                                    </a>
                                                    
                                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                                        <i class="entypo-cancel"></i>
                                                        Delete
                                                    </a>
                                                    
                                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                                        <i class="entypo-info"></i>
                                                        Profile
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php
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