<?php
function fetch($dataLoc, $logoutUrl)
{
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	$details[] = array();
	if (isset($_SESSION['uname'])) {
		$dataFileLoc = $dataLoc;
		$data = json_decode(file_get_contents($dataFileLoc));
		// $name =  $email = "";

		foreach ($data as $key => $obj) {
			// Fetch information of only the logged in user using session
			foreach ($obj as $item => $val) {
				if ($_SESSION['uname'] == $val) {
					// $name = $obj->name;
					// $email = $obj->email;
					$details = array($obj->name, $obj->email, $obj->gender, $obj->dob, $obj->password, $obj->imageFile);
				}
			}
		}
		// Displaying the details
		echo "<div class='con'>";
		echo "<code>Logged in as " . $_SESSION['uname'] . " | </code>";
		print('<a href=' . $logoutUrl . '>logout</a>');
		echo "</div>";
	} else {
		echo "<p> You need to be logged in to be able to view this page</p>";
		echo "<p>Please <a href='/webtech/lab4/recruiterx/pages/login.php'>Login</a></p>";
		exit;
	}

	// print(var_dump($details));
	return $details;
}
