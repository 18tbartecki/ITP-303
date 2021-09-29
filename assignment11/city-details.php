<?php
	session_start();
	$_SESSION["logged_in"] = false;
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>City Information</title>
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="city-details.css" type="text/css">
		<link rel="stylesheet" href="footer.css" type="text/css">
		<script src="https://kit.fontawesome.com/b4b2d9549e.js" crossorigin="anonymous"></script>

	</head>
	<body>
		<?php include 'nav.php' ?>

		<div class="container">
			<div class="row" id="location">
				<h1 class="col-12 mt-2"><a href="search.php"><i class="fas fa-chevron-left mr-4"></i></a> Location</h1>
			</div> <!-- .row -->
		</div> <!-- .container -->
	<div class="container">
		<div class="row mt-4">
			<div class="col-12">

			</div> <!-- .col -->
		</div> <!-- .row -->
		<div class="row mt-3 mb-4">
			<div class="col-12 col-lg-3">
				<div class="metric-heading my-2">Air Quality Index</div>
				<div class="index">#</div>
			</div> <!-- .col -->
			<div class="col-12 col-lg-3">
				<div class="metric-heading my-2">Environmental Quality</div>
				<div class="index">#</div>
			</div>
			<div class="col-12 col-lg-6">
				<div class="graph">Graph</div>
			</div>
		</div> <!-- .row -->
		<div class="row mt-3 mb-4">
			<div class="col-12 col-lg-6">
				<div class="graph">Graph</div>
			</div>
			<div class="col-12 col-lg-6">
				<div class="graph">Graph</div>
			</div>
		</div>
	</div> <!-- .container -->

		<?php include 'footer.php' ?>

	</body>
</html>