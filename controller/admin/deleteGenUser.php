<?php

// Delete the general user from the database using the id passed in the url 

// include the database connection file

@include_once "../../model/db_connect.php";

// get the id from the url

$id = $_GET['id'];

// connect to the database

$conn = db_connect();

// delete the general user from the database

$query = "DELETE FROM users WHERE id = $id";

try {
	$stmt = $conn->prepare($query);
	$stmt->execute();
} catch (PDOException $e) {
	echo $e->getMessage();
}

// redirect to the showGenUser page

header("Location: ../../view/pages/admin/showGenUser.php");
