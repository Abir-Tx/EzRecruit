<?php
	$currPassErr = $newPassErr = $conPassErr = "";
	$currPass = $details[4];
	$newPass = $conPass = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["currPass"])) {
			$currPassErr = "Current Password is required";
		} elseif ($_POST["currPass"] != $currPass) {
			$currPassErr = "Password does not match";
		} else {
			if (empty($_POST["newPass"]) || empty($_POST["conPass"])) {
				$newPassErr = $conPassErr = "This field can not be empty";
			}

			if ($_POST["newPass"] === $_POST["conPass"]) {
				if ($_POST["newPass"] === $currPass) {
					$newPassErr = "The new password can not be same as current password";
				} else {
					$newPass = $_POST["newPass"];
					echo "Password Updated Successfully";
				}
			} else $newPassErr = "The new password do not match with the retyped password";
		}
	}
