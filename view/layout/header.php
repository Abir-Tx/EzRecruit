<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
?>

<header>
	<nav>
		<a href="/EzRecruit/view/index.php">
			<h1>EzRecruit</h1>
		</a>

		<ul>
			<li>
				<a href="/EzRecruit/view/index.php">Home</a>
			</li>

			<li>
				<?php
				if (isset($_SESSION['user'])) {
					echo "<a href='/EzRecruit/view/pages/admin/login.php'>Admin</a>";
				} else {
					echo "<a href='/EzRecruit/view/pages/general/signup.php'>Sign Up</a>";
				}
				?>
			</li>

			<li>
				<?php
				if (isset($_SESSION['user'])) {
					echo "<a href='/EzRecruit/view/pages/candidate/'>Candidate</a>";
				} else {
					echo "<a href='/EzRecruit/view/pages/general/about.php'></a>";
				}
				?>
			</li>

			<li>
				<?php
				if (isset($_SESSION['user'])) {
					echo "<a href='/EzRecruit/view/pages/recruiter/login.php'>Recruiter</a>";
				} else {
					echo "<a href='/EzRecruit/view/pages/general/about.php'></a>";
				}
				?>
			</li>

			<li>
				<?php
				if (isset($_SESSION['user'])) {
					echo "<a href='/EzRecruit/view/pages/logout.php'>Logout</a>";
				} else {
					echo "<a href='/EzRecruit/view/pages/general/login.php'>Login</a>";
				}
				?>
			</li>
		</ul>
	</nav>
</header>