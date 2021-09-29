<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow container-fluid">
	<div class="row">
		<a class="ml-5 mr-3 navbar-brand" href="search.php">
			<h4>Application Name <i class="ml-2 fas fa-wind"></i></h4>
		</a>
		<?php if(!isset($_SESSION["logged_in"]) || empty($_SESSION["logged_in"])): ?>
			<a class="p-2 text-right ml-5" href="login.php" id="login">Login</a>
			<a class="p-2 text-right" href="signup.php" id="signup">Sign up</a>
		<?php else: ?>
			<a class="p-2 text-right ml-4" href="favorites.php" id="favorites">Favorites</a>
			<a class="p-2 text-right" href="logout.php" id="logout">Logout</a>
		<?php endif; ?>
	</div>
</nav>