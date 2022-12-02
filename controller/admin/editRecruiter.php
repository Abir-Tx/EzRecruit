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

			<form action="editRecruiter.php?id=<?php echo $id ?>" method="POST">

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