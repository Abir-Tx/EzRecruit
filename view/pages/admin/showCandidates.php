<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Candidates Management | EzRecruit</title>
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
		Manage Candidates
	</h1>

	<table class="table">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Profile Pic</th>
			<th>Phone</th>
			<th>Address</th>
			<th>Birth Date</th>
			<th>Bio Description</th>
			<th>Education</th>
			<th>Action</th>
		</tr>

		<?php
		$conn = db_connect();

		$query = "SELECT * FROM candidates";

		$result = $conn->query($query);

		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr>";
			echo "<td>" . $row['id'] . "</td>";
			echo "<td>" . $row['fname'] . " " . $row['lname'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
			echo "<td><img src='../../" . $row['propic'] . "' alt='Profile Pic' width='50px' height='50px'></td>";
			echo "<td><a href='tel:" . $row['phone'] . "'>" . "📞" . "</a></td>";
			echo "<td>" . $row['address'] . "</td>";
			echo "<td>" . $row['dob'] . " (" . (date("Y") - date("Y", strtotime($row['dob']))) . " years old)</td>";
			echo "<td>" . $row['bio'] . "</td>";
			echo "<td>" . $row['education'] . "</td>";



			echo "<td><a href='../../../controller/admin/deleteCandidate.php?id=" . $row['id'] . "'>Delete</a></td>";
			echo "<td><a href='../../../controller/admin/editCandidate.php?id=" . $row['id'] . "'>Edit</a></td>";
			echo "</tr>";
		}

		$conn = null;

		?>

	</table>

	<?php @include "../../layout/footer.php" ?>




</body>

</html>