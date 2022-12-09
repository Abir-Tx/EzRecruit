<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Show Admins | EzRecruit</title>
</head>

<body>
	<link rel="stylesheet" href="../../styles/css/commons.css">

	<?php @include "../../layout/header.php" ?>
	<?php @include "../../../model/db_connect.php" ?>

	<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	?>

	<h1 class="heading">
		Admins
	</h1>

	<div class="table-con">
		<table>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Gender</th>
			</tr>

			<?php
			$conn = db_connect();

			$query = "SELECT * FROM admins";

			$result = $conn->query($query);

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				echo "<tr>";
				echo "<td>" . $row['id'] . "</td>";
				// show the name of the admin by concatenating the first name and last name
				echo "<td>" . $row['fname'] . " " . $row['lname'] . "</td>";
				echo "<td>" . $row['uname'] . "</td>";
				echo "<td>" . $row['email'] . "</td>";
				echo "<td>" . $row['gender'] . "</td>";
				echo "</tr>";
			}

			?>

		</table>

		<a href="addAdmin.php" class="btn">Add Admin</a>

	</div>



</body>

</html>