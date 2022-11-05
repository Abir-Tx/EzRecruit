<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Manage Candidades</title>
	<link rel="stylesheet" href="../styles/css/commons.css">
</head>

<body>
	<?php
	@include "../layout/header.php";
	@include "../../controller/util.php";


	$details  =  fetch("../../model/adminUsers.json", "../../controller/logout.php");
	@include "../components/subMenu.php";
	?>

	<h2>Manage Candidades</h2>

	<h4>Registered Candidades</h4>

	<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if (isset($_SESSION['uname'])) {
		$dataFileLoc = "../../model/candidades.json";
		$data = json_decode(file_get_contents($dataFileLoc));

		foreach ($data as $key => $obj) {
			echo "<h6> Candidade " . ($key + 1) . "</h6>";
			echo "<li> <b>Name:</b> " . $obj->name . "</li>";
			echo "<li> <b>Email:</b> " . $obj->email . "</li>";
		}
	}

	?>
</body>

</html>