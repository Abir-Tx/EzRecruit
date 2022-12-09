<?php

// Edit the general user details in the database using the id passed in the url and show the form with the general user details and handle the update process 

// include the database connection file

@include_once "../../model/db_connect.php";

// get the id from the url

$id = $_GET['id'];

// connect to the database

$conn = db_connect();

// get the general user details from the database

$query = "SELECT * FROM users WHERE id = $id";

$stmt = "";

try {

	$stmt = $conn->prepare($query);

	$stmt->execute();
} catch (PDOException $e) {

	echo $e->getMessage();
}

$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Show the form with the general user details

?>

<?php

// include the header file

@include_once "../../view/layout/header.php";

?>

<!-- Include the common style css -->

<link rel="stylesheet" href="../../view/css/common.css">

<!-- Handle the update process -->


<?php

// if request method is post then update the general user details in the database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// get the general user details from the form

	$name = $_POST['name'];

	$email = $_POST['email'];

	$password = $_POST['password'];

	$confirmPassword = $_POST['confirmPassword'];

	// validate the form

	$errors = [];

	if (empty($name)) {

		$errors[] = "Name is required";
	}

	if (empty($email)) {

		$errors[] = "Email is required";
	}

	if (empty($password)) {

		$errors[] = "Password is required";
	}

	if (empty($confirmPassword)) {

		$errors[] = "Confirm Password is required";
	}

	if ($password != $confirmPassword) {

		$errors[] = "Password and Confirm Password must be same";
	}

	// if there are no errors then update the general user details in the database

	if (count($errors) == 0) {

		// update the general user details in the database

		$query = "UPDATE users

		SET name = :name, email = :email, password = :password

		WHERE id = :id";

		$stmt = "";

		try {

			$stmt = $conn->prepare($query);

			$stmt->bindParam(':name', $name);

			$stmt->bindParam(':email', $email);

			$stmt->bindParam(':password', $password);

			$stmt->bindParam(':id', $id);

			$stmt->execute();
		} catch (PDOException $e) {

			echo $e->getMessage();
		}

		// redirect to the general users page

		header("Location: ../../view/pages/admin/showGenUser.php");

		exit();
	}
}

?>

<!-- Show the form with the general user details -->

<div class="container">

	<div class="row">

		<div class="col-md-6 offset-md-3">

			<div class="card">

				<div class="card-header">

					<h3>Edit General User</h3>

				</div>

				<div class="card-body">

					<!-- Show the form -->

					<form action="" method="post">

						<div class="form-group">

							<label for="name">Name</label>

							<input type="text" name="name" id="name" class="form-control" value="<?php echo $row['name']; ?>">

						</div>

						<div class="form-group
						
							<label for=" email">Email</label>

							<input type="email" name="email" id="email" class="form-control" value="<?php echo $row['email']; ?>">

						</div>

						<div class="form-group">

							<label for="password">Password</label>

							<input type="password" name="password" id="password" class="form-control" value="<?php echo $row['password']; ?>">

						</div>

						<div class="form-group">

							<label for="confirmPassword">Confirm Password</label>

							<input type="password" name="confirmPassword" id="confirmPassword" class="form-control" value="<?php echo $row['password']; ?>">

						</div>

						<div class="form-group">

							<input type="submit" value="Update" class="btn btn-primary">

						</div>

					</form>

				</div>

			</div>

		</div>

	</div>

</div>

<?php

// include the footer file

@include_once "../../view/layout/footer.php";

?>