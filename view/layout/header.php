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
				if (isset($_SESSION['uname'])) {
					echo "<a href='/EzRecruit/view/pages/dashboard.php'>My Dashboard</a>";
				} else {
					echo "<a href='/EzRecruit/view/pages/login.php'>Login</a>";
				}
				?>
			</li>

			<?php

			if (isset($_SESSION['uname'])) {
				echo "<li><a href='/EzRecruit/view/pages/registration.php'>Sign Up</a></li>";
			} else {
				echo "";
			}
			?>
		</ul>
	</nav>
</header>