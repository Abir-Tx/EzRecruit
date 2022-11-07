<?php
@require_once "../../../model/db_connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $email = $password = $cpassword = "";
	$pass = false;

	// Assignment
	$name = $_POST["name"];
	$email = $_POST["email"];
	$password = $_POST["pass"];
	$cpassword = $_POST["cpass"];

	// Check both the password
	if ($password === $cpassword) {
		$pass = true;
	}

	// DB
	$conn = db_connect();
	$insertQuery = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
	try {
		$stmt = $conn->prepare($insertQuery);
		if ($pass) {
			$stmt->execute([
				":name" => $name,
				":email" => $email,
				":password" => $password
			]);

			echo "User added successfully";
		}
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

	$conn = null;
}
