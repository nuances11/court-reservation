<?php
/*
	Sample Processing of Register form via ajax
	Page: extra-register.html
*/

include_once '../config/constants.php';
include_once '../config/db.php';

$errors = array();      // array to hold validation errors
$data = array();

if($_POST['password'] != $_POST['cpassword']){
	$errors['notmatch'] = 'Password did not matched';
}

if ( ! empty($errors)) {
	
			// if there are items in our errors array, return those errors
			$data['success'] = false;
			$data['errors']  = $errors;
		}else{
			// Fields Submitted
			$name       = $_POST["name"];
			$phone      = $_POST["phone"];
			$birthdate  = $_POST["birthdate"];
			$username   = $_POST["username"];
			$email      = $_POST["email"];
			$password   = md5($_POST["password"]);
			$cpassword  = $_POST["cpassword"];
			$md5_hash = md5(time() + mt_rand(1, 99999999));
			$date = date("Y-m-d h:i:sa");

			$sql = "INSERT INTO `tbl_user` VALUES (NULL,'".$username."','".$password."','".$name."','".$phone."','".$email."','','','".$md5_hash."','".$date."','1','0')";
			if ($conn->query($sql) === TRUE) {
				$data['success'] = true;
				$data['message'] = 'Success!';
			} else {
				$data['success'] = false;
				$data['message'] = 'error adding';
			}
		}



// This array of data is returned for demo purpose, see assets/js/neon-register.js

echo json_encode($data);