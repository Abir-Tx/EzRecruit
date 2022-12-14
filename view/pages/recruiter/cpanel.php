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
	<script src="../../../scripts/recruiter/updateSelection.js"></script>
</head>

<body>
	<?php
	@include "../../layout/header.php";
	@require_once "../../../model/db_connect.php";


	if (!isset($_SESSION["user"])) {
		header("Location: ./login.php");
	}
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
				<th>Resume</th>
				<th>Profile</th>
				<th>Selected ?</th>
				<th>Update Selection</th>
			</tr>
			<tbody>
				<?php
				$conn = db_connect();
				$stmt = $conn->prepare("SELECT * FROM candidates");
				$stmt->execute();

				$candidates = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach ($candidates as $i => $candidate) {
					echo "<tr>";
					echo "<td>" . $candidate['lname'] . "</td>";
					echo "<td>" . $candidate['email'] . "</td>";
					// show phone number with a button to call
					echo "<td>" . $candidate['phone'] . "<a href='tel:" . $candidate['phone'] . "'> 📞 </a></td>";
					echo "<td><a href='" . $candidate['resume'] . "' target='_blank'>View</a></td>";
					echo "<td><img src='../candidate/profile_pics/" . $candidate['propic'] . "' alt='Profile Picture' width='100px' height='100px'></td>";
					echo $candidate['selected'] === 1 ? print("<td>Yes</td>") : print("<td>No</td>");
					echo "<td><input type='checkbox' name='select' value='" . $candidate['id'] . "' " . ($candidate['selected'] === 1 ? "checked" : "") . " onchange='updateSelection(" . $candidate['id'] . ", " . $candidate['selected'] . ")'></td>";

					echo "</tr>";
				}
				$conn = null;
				?>
			</tbody>
		</table>
	</div>

	<!-- Footer -->
	<?php @include "../../layout/footer.php" ?>
</body>

</html>