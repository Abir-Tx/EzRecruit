<?php
@require_once "../../../model/db_connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $email = $password = $cpassword = "";

	// Assignment
	$name = $_POST["name"];
	$email = $_POST["email"];
	$password = $_POST["pass"];

	// DB
	$conn = db_connect();
	$insertQuery = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
	try {
		$stmt = $conn->prepare($insertQuery);
		$stmt->execute([
			":name" => $name,
			":email" => $email,
			":password" => $password
		]);
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

	$conn = null;
}
