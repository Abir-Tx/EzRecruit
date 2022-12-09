<?php

// Edit the candidate in the database using the id passed in the url and update the database using the id passed in the url and show the form with the candidate details and handle the update process

// include the database connection file

@include_once "../../model/db_connect.php";

// get the id from the url

$id = $_GET['id'];

// connect to the database

$conn = db_connect();

// get the candidate details from the database

$query = "SELECT * FROM candidates WHERE id = $id";

$stmt = "";

try {

	$stmt = $conn->prepare($query);

	$stmt->execute();
} catch (PDOException $e) {

	echo $e->getMessage();
}

$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Show the form with the candidate details

?>

<?php

// include the header file

@include_once "../../view/layout/header.php";

?>

<!-- Include the common style css -->

<link rel="stylesheet" href="../../view/css/common.css">


<!-- Handle the update process -->

<?php

// if request method is post then update the candidate details in the database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// get the candidate details from the form

	$name = $_POST['fname'];

	$email = $_POST['email'];

	$password = $_POST['password'];

	$id = $_POST['id'];

	// update the candidate details in the database

	$query = "UPDATE candidates SET fname = '$name', email = '$email', password = '$password' WHERE id = $id";


	try {

		$stmt = $conn->prepare($query);

		$stmt->execute();
	} catch (PDOException $e) {

		echo $e->getMessage();
	}

	// redirect to the showCandidates page

	header("Location: ../../view/pages/admin/showCandidates.php");
}

?>

<!-- create the form  -->

<div class="container">

	<div class="row">

		<div class="col-md-6 offset-md-3">

			<div class="card">

				<div class="card-header">

					<h3>Edit Candidate</h3>

				</div>

				<div class="card-body">

					<form action="" method="POST">

						<div class="form-group

							<?php

							if (isset($_SESSION['errors']['name'])) {

								echo "has-error";
							}

							?>

							">

							<label for="name">Name</label>

							<input type="text" name="name" id="name" class="form-control" value="<?php echo $row['fname']; ?>">

							<?php

							if (isset($_SESSION['errors']['name'])) {

								echo "<span class='help-block'>" . $_SESSION['errors']['name'] . "</span>";
							}

							?>

						</div>

						<div class="form-group

							<?php

							if (isset($_SESSION['errors']['email'])) {

								echo "has-error";
							}

							?>

							">

							<label for="email">Email</label>

							<input type="email" name="email" id="email" class="form-control" value="<?php echo $row['email']; ?>">

							<?php

							if (isset($_SESSION['errors']['email'])) {

								echo "<span class='help-block

								'>" . $_SESSION['errors']['email'] . "</span>";
							}

							?>

						</div>

						<div class="form-group

							<?php

							if (isset($_SESSION['errors']['password'])) {

								echo "has-error";
							}

							?>

							">

							<label for="password">Password</label>

							<input type="password" name="password" id="password" class="form-control" value="<?php echo $row['password']; ?>">

							<?php

							if (isset($_SESSION['errors']['password'])) {

								echo "<span class='help-block

								'>" . $_SESSION['errors']['password'] . "</span>";
							}

							?>

						</div>

						<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

						<input type="submit" value="Update" class="btn btn-primary">

					</form>

				</div>

			</div>

		</div>

	</div>

</div>

<?php

// include the footer file

include_once "../../view/layout/footer.php";

?>