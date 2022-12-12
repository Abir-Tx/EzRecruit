<?php
//  Update the ratings in the database using the id from the updateRatings function
//  Path: controller\admin\updateRatings.php

// import the db_connect.php file
require_once "../../model/db_connect.php";



if (isset($_GET['id']) && isset($_GET['ratings']) && isset($_GET['value'])) {
	$id = $_GET['id'];
	$ratings = $_GET['ratings'];
	$value = $_GET['value'];

	// check if the value is 1 or -1
	if ($value == 1) {
		// if the value is 1 then add 1 to the ratings
		$value = $ratings + 1;
	} else {
		// if the value is -1 then subtract 1 from the ratings
		$value = $ratings - 1;
	}


	// connect to the database
	$conn = db_connect();

	try {
		// Query to update the ratings using statement
		$query = "UPDATE candidates SET ratings = $value WHERE id = $id";
		// update the ratings in the database
		$conn->exec($query);
	} catch (PDOException $e) {
		echo $query . "<br>" . $e->getMessage();
	}

	// close the connection
	$conn = null;
} else {
	// return the value of the ratings
	echo "Error";
}

?>



}