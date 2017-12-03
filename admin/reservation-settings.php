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
                <li>
                    <a href="reservation.php">
                        <i class="fa-home"></i>Reservation</a>
                </li>
                <li class="active">
                    <strong>Reservation Setting</strong>
                </li>
            </ol>

            <!-- PAGE CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <hr />
                    
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
                                <th>Barangay - Court</th>
                                <th data-hide="phone">Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;
                            $sql = "SELECT * FROM tbl_court WHERE status = '1'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?= $i ?></td>
                                        <td><?= $row['barangay'].' - ' .$row['court_name'] ?></td>
                                        <td>
                                        <?php 
                                            if ($row['status'] == '1') {
                                                ?>
                                                <span class="badge badge-success">Active</span>
                                                <?php
                                            }elseif ($row['status'] == '2') {
                                                ?>
                                                <span class="badge badge-danger">Inactive</span>
                                                <?php
                                            }
                                        ?>
                                        </td>
                                        <td class="center">
                                            <a href="court-settings.php?id=<?= $row['court_id'] ?>" class="btn btn-default btn-sm btn-icon icon-left">
                                                <i class="entypo-pencil"></i>
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
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