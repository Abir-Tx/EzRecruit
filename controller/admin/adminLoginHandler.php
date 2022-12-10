<?PHP

if (isset($_SESSION['admin'])) {
	header('Location: /EzRecruit/view/pages/admin/dashboard.php');
}
// Variables
$unameErr = $passErr = "";
$uname = $pass = "";
$loginErr = "";

$loginSuccess = false;

$inputOk = false;
$found = false;
$cookieTimeout = 120;

@require_once "../../../model/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Validate User name
	if (empty($_POST["uname"])) {
		$unameErr = "Name is required";
	} elseif (!preg_match('/^[a-zA-Z0-9 ".-_]+$/', $_POST["uname"])) {
		$unameErr = "Can only contain alpha numeric charracters, period, dash or underscore only";
	} elseif (str_word_count($_POST["uname"]) < 1) {
		$unameErr = "Must contain at least one word";
	} else {
		$uname = $_POST["uname"];
		$inputOk = true;
	}


	// Validate Password
	if (empty($_POST["password"])) {
		$passErr = "Password cannot be empty";
	} elseif (strlen($_POST["password"]) < 8) {
		$passErr = "Cannot be less than 8";
	} elseif (strlen($_POST["password"]) > 8) {
		!strpos($_POST["password"], "@" || "#" || "$" || "%") ? $passErr = "Must contain at least one special characer" : $pass = $_POST["password"];
	} else {
		$pass = $_POST["password"];
		$inputOk = true;
	}

	// Remember Me check
	if (!empty($_POST['remMe'])) {
		setcookie("uname", $uname, time() + $cookieTimeout);
		setcookie("password", $pass, time() + $cookieTimeout);
	} else {
		setcookie("uname", "");
		setcookie("password", "");
	}

	/*  matching with DB data */

	// Getting the DB data
	$conn = db_connect();
	$selectQuery = "SELECT * FROM admins WHERE uname = :uname AND password = :password";
	try {
		$stmt = $conn->prepare($selectQuery);
		$stmt->execute([
			":uname" => $uname,
			":password" => $pass
		]);

		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if (count($result) > 0) {
			$loginSuccess = true;
		}
	} catch (PDOException $e) {
		$unameErr =  "Error: " . $e->getMessage();
	}



	// Handle success or unsuccessfull login
	// $loginSuccess ? header("Location: ./dashboard.php") . (die()) : print("Login Failed");
	if ($loginSuccess) {
		session_start();
		$_SESSION["admin"] = $uname;
		header("Location: /EzRecruit/view/pages/admin/dashboard.php");
		die();
	} else {
		// echo "\nFailed Login";
		$loginErr = "Invalid Username or Password";
	}
}
