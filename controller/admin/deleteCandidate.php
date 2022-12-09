<?php

// Delete the candidate from the database using the id passed in the url

// include the database connection file

@include_once "../../model/db_connect.php";

// get the id from the url

$id = $_GET['id'];

// connect to the database

$conn = db_connect();

// delete the candidate from the database

$query = "DELETE FROM candidates WHERE id = $id";

try {
	$stmt = $conn->prepare($query);
	$stmt->execute();
} catch (PDOException $e) {
	echo $e->getMessage();
}

// redirect to the showCandidates page

header("Location: ../../view/pages/admin/showCandidates.php");
