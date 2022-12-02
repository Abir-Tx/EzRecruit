<?php

// Edit the recruiter in the database using the id passed in the url

// Create a form to edit the recruiter details and update the database using the id passed in the url

// include the database connection file

@include_once "../../model/db_connect.php";

// get the id from the url

$id = $_GET['id'];

// connect to the database

$conn = db_connect();

// get the recruiter details from the database

$query = "SELECT * FROM recruiters WHERE id = $id";

$stmt = "";
try {
	$stmt = $conn->prepare($query);
	$stmt->execute();
} catch (PDOException $e) {
	echo $e->getMessage();
}

$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Show the form with the recruiter details

?>

<?php

// include the header file

@include_once "../../view/layout/header.php";

?>


<!-- Handle the update process -->
<?php

// if request method is post then update the recruiter details in the database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// get the recruiter details from the form

	$name = $_POST['name'];
	$email = $_POST['email'];
	$username = $_POST['uname'];
	$password = $_POST['password'];
	$id = $_POST['id'];

	// connect to the database

	$conn = db_connect();

	// update the recruiter details in the database

	$query = "UPDATE recruiters SET name = '$name', email = '$email', username = '$username', password = '$password' WHERE id = $id";



	try {
		$stmt = $conn->prepare($query);
		$stmt->execute();
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

	// redirect to the showRecruiters page

	header("Location: ../../view/pages/admin/showRecruiters.php");
}

?>


<!-- Create the form  -->

<head>
	<title>Edit Recruiter</title>

	<!-- Include the css file -->
	<link rel="stylesheet" href="../../view/styles/css/commons.css">

</head>

<div class="container">

	<div class="row">

		<div class="col-md-6 offset-md-3">

			<h2 class="text-center">Edit Recruiter</h2>

			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

				<div class="form-group">

					<label for="name">Name</label>

					<input type="text" name="name" id="name" class="form-control" value="<?php echo $row['name'] ?>">

				</div>

				<div class="form-group
				
					<label for=" email">Email</label>

					<input type="email" name="email" id="email" class="form-control" value="<?php echo $row['email'] ?>">

				</div>

				<div class="form-group">

					<label for="password">Password</label>

					<input type="password" name="password" id="password" class="form-control" value="<?php echo $row['password'] ?>">
				</div>

				<!-- username -->

				<div class="form-group">

					<label for="username">Username</label>

					<input type="text" name="username" id="username" class="form-control" value="<?php echo $row['uname'] ?>">
				</div>

				<!-- id -->

				<div class="form-group">

					<label for="id">ID</label>

					<input type="text" name="id" id="id" class="form-control" value="<?php echo $row['id'] ?>">
				</div>

				<!-- update -->

				<div class="form-group">

					<input type="submit" name="update" value="Update" class="btn btn-primary">
				</div>

			</form>


		</div>

	</div>

</div>

<?php

// include the footer file

@include_once "../../view/layout/footer.php";

?>