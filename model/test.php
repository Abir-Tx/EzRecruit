<?php
require_once "../model/db_connect.php";
$conn = db_connect();
$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $i => $user) {
	echo $user['name'];
}
