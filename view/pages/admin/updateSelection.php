<?php
// Get the id and the selection status from the URL and update the database accordingly.

@require_once "../../../model/db_connect.php";

if (isset($_GET['id']) && isset($_GET['selected'])) {
	$id = $_GET['id'];
	$selected = $_GET['selected'];

	$conn = db_connect();
	$stmt = $conn->prepare("UPDATE candidates SET selected = :selected WHERE id = :id");
	$stmt->execute([
		":selected" => $selected,
		":id" => $id
	]);

	$conn = null;
}

header("Location: ./cpanel.php");
