<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Control Panel | Recruiter</title>
	<!-- Styles -->
	<link rel="stylesheet" href="../../styles/css/commons.css">
	<link rel="stylesheet" href="../../styles/css/index.css">
</head>

<body>
	<?php
	@include "../../layout/header.php";
	@require_once "../../../model/db_connect.php";
	?>

	<div class="cpanelCon">
		<h1>Welcome <?php echo ucwords($_SESSION["user"]["name"]) ?></h1>


		<h2>
			Registered Candidates List:
		</h2>
		<table>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
			</tr>
			<tbody>
				<?php
				$conn = db_connect();
				$stmt = $conn->prepare("SELECT * FROM candidates");
				$stmt->execute();

				$candidates = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach ($candidates as $i => $cadidate) {
					echo "<tr>";
					echo "<td>" . $cadidate['lname'] . "</td>";
					echo "<td>" . $cadidate['email'] . "</td>";
					echo "<td>" . $cadidate['phone'] . "</td>";
					echo "</tr>";
				}
				?>
			</tbody>

		</table>
	</div>

	<?php @include "../../layout/footer.php" ?>
</body>



</html>