<?php
@require_once "../../../model/db_connect.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = $_POST['email'];
	$password = $_POST['password'];


	// DB
	$conn = db_connect();
	$selectQuery = "SELECT * FROM candidates WHERE email = :email AND password = :password";
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
		header("Location: ./status.php");
		// echo $_SESSION["user"]["name"];
	} else {
		echo "Login failed";
	}
}
