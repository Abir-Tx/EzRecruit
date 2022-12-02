<?php

// Add the admin to the database
// Get the data from the form
$uname = $_POST['uname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$profilePic = $_POST['profilePic'];


// connect to the database
include_once "../../model/db_connect.php";

$conn = db_connect();

// Check if the user name is already taken
$query = "SELECT * FROM admins WHERE uname = '$uname'";
$result = $conn->query($query);

if ($result->rowCount() > 0) {
	// The user name is already taken
	// Redirect to the create admin page with an error message
	header("Location: ../../../view/pages/admin/createAdmin.php?error=uname");
} else {
	// The user name is not taken
	// Check if the email is already taken
	$query = "SELECT * FROM admins WHERE email = '$email'";
	$result = $conn->query($query);

	if ($result->rowCount() > 0) {
		// The email is already taken
		// Redirect to the create admin page with an error message
		header("Location: ../../../view/pages/admin/createAdmin.php?error=email");
	} else {
		// The email is not taken
		// Check if the password and confirm password are same
		if ($password == $confirmPassword) {
			// The password and confirm password are same
			// Encrypt the password
			// $password = md5($password);

			// Insert the admin to the database
			$query = "INSERT INTO admins (uname, email, password, fname, lname, gender, dob, propic) VALUES ('$uname', '$email', '$password', '$fname','lname', '$gender', '$dob', '$profilePic')";
			$result = $conn->query($query);

			if ($result) {
				// The admin is added to the database
				// Redirect to the dashboard page with a success message
				header("Location: ../../../view/pages/admin/dashboard.php?success=createAdmin");
			} else {
				// The admin is not added to the database
				// Redirect to the create admin page with an error message
				header("Location: ../../../view/pages/admin/createAdmin.php?error=insert");
			}
		} else {
			// The password and confirm password are not same
			// Redirect to the create admin page with an error message
			header("Location: ../../../view/pages/admin/createAdmin.php?error=password");
		}
	}
}

$conn = null;
