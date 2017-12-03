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
                <li>
                    <a href="reservation-settings.php">
                        <i class="fa-home"></i>Reservation Setting</a>
                </li>
                <li class="active">
                    <strong>Court Setting</strong>
                </li>
            </ol>

            <!-- PAGE CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <hr />
                    <div class="row">
                    <form id="update-hour-settings">
                    <?php
                        // $start=strtotime('08:00');
                        // $end=strtotime('22:00');
                        //     for ($i=$start;$i<=$end;$i = $i + 60*60){
                                ?>
                                    <!-- <div class="col-md-3 text-center">
                                    <label>
                                        <input type="checkbox" name="hour[]" value="<?php echo date('H:i:s',$i); ?>"><?php echo date('H:i',$i); ?>
                                    </label>
                                    </div> -->
                                <?php
                            //}
                            $sql = "SELECT * FROM tbl_court_hours WHERE court_id = '".$_GET['id']."'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($hour = $result->fetch_assoc()){
                                    ?>
                                        <div class="col-md-3 text-center">
                                        <label>
                                            <input type="checkbox" name="hour[]" value="<?php echo $hour['hour'] ?>" <?php if ($hour['hour_status'] = '1'){echo 'checked';}?>><?php echo $hour['hour'] ?>
                                        </label>
                                        </div>
                                    <?php
                                }
                            }
                            
                    ?>
                    
                    </form>
                    </div>
                    <hr>
                    <div class="text-center">
                    <a href="reservation-settings.php" class="btn btn-default">Back</a>&nbsp;&nbsp;
                    <button id="update-hour" class="btn btn-success">UPDATE SETTING</button>
                    </div>
                </div>
            </div>
            <!-- End of PAGE CONTENT -->
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'?>