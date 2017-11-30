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
    $id = $_POST['id'];
    $barangay = $_POST['barangay'];
    $court_name = $_POST['court_name'];
    $status = $_POST['status'];
    $date = date("Y-m-d h:i:sa");

    $sql = "UPDATE tbl_court SET barangay = '".$barangay."', court_name = '".$court_name."', status = '".$status."', timestamp_updated = '".$date."' WHERE court_id = '".$id."'";
        if ($conn->query($sql) === TRUE) {
            $data['success'] = true;
            $data['message'] = 'Success!';
        } else {
            $data['success'] = false;
        }
}

echo json_encode($data);