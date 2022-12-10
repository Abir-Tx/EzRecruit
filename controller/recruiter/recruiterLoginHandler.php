<?php
@require_once "../../../model/db_connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$uname = $_POST['uname'];
	$password = $_POST['pass'];


	// DB
	$conn = db_connect();
	$selectQuery = "SELECT * FROM recruiters WHERE uname = :uname AND password = :password";
	try {
		$stmt = $conn->prepare($selectQuery);
		$stmt->execute([
			":uname" => $uname,
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
		$_SESSION["user"]["type"] = "recruiter";
		header("Location: ./cpanel.php");
		// echo $_SESSION["user"]["name"];
	} else {
		echo "Login failed";
	}
}
