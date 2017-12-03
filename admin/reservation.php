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
                    <strong>Reservations</strong>
                </li>
            </ol>

            <!-- PAGE CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <hr />
                        <h2>Reservation List</h2>
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
                                <th data-hide="phone"># - Status</th>
                                <th>Name</th>
                                <th data-hide="phone">Barangay / Court</th>
                                <th data-hide="phone,tablet">Date / Time</th>
                                <th>Event</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;
                            $sql = "SELECT * FROM tbl_reservation a INNER JOIN tbl_user b ON b.id = a.user_id
                            INNER JOIN tbl_court c ON c.court_id = a.court_id";
                            $result = $conn->query($sql);
                            if($result-> num_rows > 0){
                                while($res = $result->fetch_assoc()){
                                    ?>
                                    <tr class="odd gradeX">
                                        <td>
                                            <?= $i ?> - 
                                            <?php 
                                                if ($res['status'] == '1') {
                                                    ?>
                                                    <span class="badge badge-success">Approved</span>
                                                    <?php
                                                }elseif ($res['status'] == '2') {
                                                    ?>
                                                    <span class="badge badge-danger">Declined</span>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <span class="badge badge-warning">Pending</span>
                                                    <?php
                                                }
                                            ?>
                                        </td>
                                        <td><?= $res['full_name'];?></td>
                                        <td>
                                            <?php
                                                    echo '<strong>' . ucfirst($res['barangay']) . '</strong> - ' .ucfirst($res['court_name']);
                                            ?>
                                        
                                        </td>
                                        <td class="center"><?= '<strong>' . $res['date'] ?> </strong>- <?= $res['time_start']. ' - ' . $res['time_end']?></td>
                                        <th class="center"><?= $res['sport'] ?></th>
                                        <td class="center">
                                            <a href="reservation-details.php?id=<?= $res['id']?>" class="btn btn-default btn-sm btn-icon icon-left">
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