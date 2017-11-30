<?php
/*
	Sample Processing of Forgot password form via ajax
	Page: extra-register.html
*/
include_once '../config/constants.php';
include_once '../config/db.php';
# Response Data Array
$data = array();
$errors = array();


// Fields Submitted
$username = $_POST["username"];
$password = $_POST["password"];


// This array of data is returned for demo purpose, see assets/js/neon-forgotpassword.js
$data['submitted_data'] = $_POST;


// Login success or invalid login data [success|invalid]
// Your code will decide if username and password are correct
$login_status = 'invalid';

if(!empty($_POST['username']) && !empty($_POST['password'])){
	$sql = "SELECT * FROM tbl_user WHERE username = '".$_POST['username']."' AND password = '".md5($_POST['password'])."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			$row = $result->fetch_assoc();
				session_start();
				$_SESSION['id'] = $row['id'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['user_type'] = $row['user_type'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['full_name'] = $row['full_name'];
				$login_status = 'success';
				if ($row['user_type'] == '0') {
					$data['user'] = 'User';
					//$data['redirect_url'] = BASE_URL . 'user/';
					//header("Location: " . BASE_URL . "/farmer/index.php");
				}

				if ($row['user_type'] == '1') {
					$data['user'] = 'Admin';
					//$data['redirect_url'] = BASE_URL . 'admin/';
					//header("Location: " . BASE_URL . "/owner/index.php");
				}
			
		} else {
			$errors['login'] = 'Username or Password incorrect';

			
		}
}


$data['login_status'] = $login_status;
// Login Success URL
if($login_status == 'success')
{
	// If you validate the user you may set the user cookies/sessions here
		#setcookie("logged_in", "user_id");
		#$_SESSION["logged_user"] = "user_id";
	
	// Set the redirect url after successful login
	$data['redirect_url'] = '';
}


echo json_encode($data);