<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard | EzRecruit </title>
	<link rel="stylesheet" href="../styles/css/commons.css">
</head>

<body>
	<?php @include "../layout/header.php" ?>
	<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	$count  = 0;
	if (isset($_SESSION['uname'])) {
		$dataFileLoc = "../../model/adminUsers.json";
		$data = json_decode(file_get_contents($dataFileLoc));
		$name =  $email = "";

		foreach ($data as $key => $obj) {
			$count++;
			// Fetch information of only the logged in user using session
			foreach ($obj as $item => $val) {
				if ($_SESSION['uname'] == $val) {
					$name = $obj->name;
					$email = $obj->email;
				}
			}
		}

		// Displaying the details


		echo "<code>logged in as " . $_SESSION['uname'] . " | </code>";
		print('<a href="../../controller/logout.php">logout</a>');


		@include "../components/subMenu.php";


		echo "<H1>Welcome " . ucwords($name) . "</H1>";

		echo "<p> There are currently  " . $count . " <b>Admin</b> accounts registered</p>";
		// Including the subpages/components
	} else {
		echo "<p> You need to be logged in to be able to view this page</p>";
		echo "<p>Please Login</p>";
	}
	?>

	<?php @include "../layout/footer.php" ?>
</body>

</html>