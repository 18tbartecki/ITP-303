<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Sign In</title>
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="starter.css" type="text/css">
		<link rel="stylesheet" href="footer.css" type="text/css">
		<script src="https://kit.fontawesome.com/b4b2d9549e.js" crossorigin="anonymous"></script>
		<script src="login.js"></script>
	</head>
	<body>
		<!-- Header -->
		<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">
			<a class="navbar-brand ml-5" href="search.php">
				<h4>Application Name <i class="ml-2 fas fa-wind"></i></h4> 
			</a>
		</nav>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<h1 class="text-center">Sign In</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-1 col-md-3"> </div>
				<div class="col-10 col-md-6" id="login">
					<form id="login" onsubmit="checkLogin(event)">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" placeholder="Username" name="username">
						</div>
						<div class="form-group">
							<label for="password">Password </label>
							<input type="password" class="form-control" id="password" placeholder="Password" name="password">
						</div>
						<div class="form-group">
							<label for="submit"></label>
							<button type="submit" class="btn btn-block" id="submit">Sign In</button>
						</div>
						<div class="form-group">
							<label for="signup"></label>
							<button onclick="location.href = 'signup.php';" type="submit" class="btn btn-block" id="signup">Sign Up for an Account</button>
						</div>
						<div class="form-group text-danger text-center" id="errorMessage"></div>
					</form>
				</div>
			</div>
		</div>
	<?php include 'footer.php' ?>
	
	</body>
</html>