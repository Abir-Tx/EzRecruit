<?php
$uname = $_POST['uname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$name = $_POST['name'];
$profilePic = $_POST['profilePic'];

include_once "../../model/db_connect.php";

$conn = db_connect();

$query = "SELECT * FROM recruiters WHERE uname = '$uname'";

$result = $conn->query($query);

if ($result->rowCount() > 0) {
	header("Location: ../../../view/pages/admin/createRecruiter.php?error=uname");
} else {
	$query = "SELECT * FROM recruiters WHERE email = '$email'";
	$result = $conn->query($query);

	if ($result->rowCount() > 0) {
		header("Location: ../../../view/pages/admin/createRecruiter.php?error=email");
	} else {
		if ($password == $confirmPassword) {
			// Insert the recruiter to the database
			$query = "INSERT INTO recruiters (uname, email, password, name, propic) VALUES ('$uname', '$email', '$password', '$name', '$profilePic')";
			$result = $conn->query($query);

			if ($result) {
				// The recruiter is added to the database
				// Redirect to the dashboard page with a success message
				header("Location: ../../../view/pages/admin/dashboard.php?success=createRecruiter");
			} else {
				// The recruiter is not added to the database
				// Redirect to the create recruiter page with an error message
				header("Location: ../../../view/pages/admin/createRecruiter.php?error=insert");
			}
		} else {
			// The password and confirm password are not same
			// Redirect to the create recruiter page with an error message
			header("Location: ../../../view/pages/admin/createRecruiter.php?error=password");
		}
	}
}
