<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Admin | EzRecruit</title>
</head>

<body>
	<h2>
		Add Admin
	</h2>
	<form action="../../../controller/admin/addAdmin.php" method="POST">
		<label for="uname"> User Name</label>
		<input type="text" name="uname" id="uname" placeholder="Enter your user name">
		<br>
		<label for="email">Email</label>
		<input type="email" name="email" id="email" placeholder="Enter your email">
		<br>
		<label for="password">Password</label>
		<input type="password" name="password" id="password" placeholder="Enter your password">
		<br>
		<label for="confirmPassword">Confirm Password</label>
		<input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm your password">
		<br>
		<label for="fname">First Name</label>
		<input type="text" name="fname" id="fname" placeholder="Enter your first name">
		<br>
		<label for="lname">Last Name</label>
		<input type="text" name="lname" id="lname" placeholder="Enter your last name">
		<br>
		<label for="gender" class="inpLabel">Gender: </label>
		<input type="radio" name="gender" value="female">Female
		<input type="radio" name="gender" value="male">Male
		<input type="radio" name="gender" value="other">Other
		<br>
		<label for="dob">Date of Birth</label>
		<input type="date" name="dob" id="dob">
		<br>
		<label for="profilePic">Profile Picture</label>
		<input type="file" name="profilePic" id="profilePic">
		<br>


		<input type="submit" value="Add Admin">
		<br>
	</form>


</body>

</html>