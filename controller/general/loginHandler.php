<?php
@require_once "../../../model/db_connect.php";

$email = $password = "";
$pass = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Assignment
	$email = $_POST["email"];
	$password = $_POST["pass"];


	// DB
	$conn = db_connect();
	$selectQuery = "SELECT * FROM users WHERE email = :email AND password = :password";
	try {
		$stmt = $conn->prepare($selectQuery);
		$stmt->execute([
			":email" => $email,
			":password" => $password
		]);

		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if (count($result) > 0) {
			$pass = true;
		}
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

	$conn = null;

	if ($pass) {
		session_start();
		/* Store the whole user info into an array in session */
		$_SESSION["user"] = $result[0];
		$_SESSION["user"]["type"] = "guest";
		header("Location: ../../index.php");
	} else {
		echo "Login failed";
	}
}
