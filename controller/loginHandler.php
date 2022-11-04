
<?PHP
if (isset($_SESSION['uname'])) {
	header('Location: /EzRecruit/view/pages/dashboard.php');
}
// Variables
$unameErr = $passErr = "";
$uname = $pass = "";

$loginSuccess = false;
$dataFileLoc = "../../model/adminUsers.json";

$inputOk = false;
$found = false;
$cookieTimeout = 120;

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
		echo "Cookie set successfully";
	} else {
		setcookie("uname", "");
		setcookie("password", "");
		echo "Cookie not set";
	}

	/*  matching with json data */

	// Getting the json data
	$data = json_decode(file_get_contents($dataFileLoc));

	// Compare and verify the password and username with json data
	if ($inputOk) {
		foreach ($data as $d) {
			if ($found) break;
			else {
				$d->uname == $uname ? ($loginSuccess = true) . ($found = true) : (($unameErr = "Username do not match") . ($loginSuccess = false));
				$loginSuccess ? ($d->password == $pass ? ($loginSuccess = true) . ($found = true) : (($passErr = "Password do not match!") . ($loginSuccess = false))) : null;
			}
		}
	}


	// Handle success or unsuccessfull login
	// $loginSuccess ? header("Location: ./dashboard.php") . (die()) : print("Login Failed");
	if ($loginSuccess) {
		session_start();
		header("Location: ./dashboard.php");
		$_SESSION["uname"] = $uname;
		die();
	} /* else {
			echo "Failed Login";
		} */
}
?>