<?php
session_start();
include_once '../config/constants.php';
include_once '../config/db.php';

// $errors = array(); // array to hold validation errors
// $data = array(); // array to pass back data

// if (empty($_POST['reserve']))
//     $errors['reserve_time'] = 'Please select atleast 1 slot';

// if (empty($_POST['event']))
//     $errors['event'] = 'Event field is required';

// if (!empty($errors)) {
//     // if there are items in our errors array, return those errors
//     $data['success'] = false;
//     $data['errors'] = $errors;
// } else {

    $user = $_SESSION['id'];
    $court = $_POST['barangay'];
    $res_date = $_POST['date'];
    $event = $_POST['event'];
    $status = '0';
    $date = date("Y-m-d h:i:sa");
    foreach ($_POST['reserve'] as $reserve) {
        $sql = "INSERT INTO tbl_reservation VALUES (NULL, '".$user."', '".$court."', '".$res_date."', '".$reserve."', '".$event."', '".$status."')";
        if ($conn->query($sql) === TRUE) {
            ?>
                <script>
                    alert('Successfully Added. Please Wait for the approval. Thank you !');
                    window.location.href = '../user/index.php';
                </script>
            <?php
            } else {
                ?>
                <script>
                    history.back();
                </script>
            <?php
        }
    }
    
// }

// echo json_encode($data);