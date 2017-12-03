<?php
session_start();
include_once '../config/constants.php';
include_once '../config/db.php';

$errors = array(); // array to hold validation errors
$data = array(); // array to pass back data

if (empty($_POST['barangay']))
    $errors['barangay'] = 'Barangay field is required';

if (empty($_POST['court_name']))
    $errors['courtname'] = 'Court Name field is required';

if (!empty($errors)) {
    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors'] = $errors;
} else {

    $barangay = $_POST['barangay'];
    $court_name = $_POST['court_name'];
    $status = $_POST['status'];
    $date = date("Y-m-d h:i:sa");

    $sql = "INSERT INTO tbl_court VALUES (NULL, '".$barangay."', '".$court_name."', '".$date."', '".$date."', '".$status."')";
        if ($conn->query($sql) === TRUE) {

            $last_id = $conn->insert_id;
            $start=strtotime('08:00');
            $end=strtotime('22:00');
            for ($i=$start;$i<=$end;$i = $i + 60*60)
            {
                $hour = date('H:i:s',$i);
                $plushour = date('H:i:s',$i + 60*60);
                $newhour = $hour .'-'. $plushour;
                $hour = "INSERT INTO tbl_court_hours VALUES(NULL, '".$last_id."','".$newhour."','".$date."','".$date."','1')";
                if ($conn->query($hour) === TRUE) {
                    $data['success'] = true;
                    $data['message'] = 'Success!';
                }
            }

        } else {
            $data['success'] = false;
        }
}

echo json_encode($data);