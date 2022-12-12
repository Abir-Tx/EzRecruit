<?php
//  Update the ratings in the database using the id from the updateRatings function
//  Path: controller\admin\updateRatings.php

// import the db_connect.php file
require_once "../../model/db_connect.php";



if (isset($_GET['id']) && isset($_GET['ratings']) && isset($_GET['value'])) {
	$id = $_GET['id'];
	$ratings = $_GET['ratings'];
	$value = $_GET['value'];


	// connect to the database
	$conn = db_connect();

	try {
		// update the ratings in the database
		$query = "UPDATE candidates SET $ratings = $value WHERE id = $id";
		$conn->exec($query);
	} catch (PDOException $e) {
		echo $query . "<br>" . $e->getMessage();
	}

	// close the connection
	$conn = null;



	// return the value of the ratings
	echo $value;
} else {

	// return the value of the ratings
	echo "Error";
}

?>



}