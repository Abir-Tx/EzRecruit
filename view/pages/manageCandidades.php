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
</body>

</html>