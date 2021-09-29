<?php
	if(isset($_GET["title"]) && !empty(trim($_GET["title"]))) {
		$title = $_GET["title"];
		$titleSQL = "AND title LIKE \"%$title%\"";
	}
	else {
		$titleSQL = "";
	}

	if(isset($_GET["genre"]) && !empty($_GET["genre"])) {
		$genre = $_GET["genre"];
		$genreSQL = "AND g.genre_id = $genre";
	}
	else {
		$genreSQL = "";
	}

	if(isset($_GET["rating"]) && !empty($_GET["rating"])) {
		$rating = $_GET["rating"];
		$ratingSQL = "AND r.rating_id = $rating";
	}
	else {
		$ratingSQL = "";
	}

	if(isset($_GET["label"]) && !empty($_GET["label"])) {
		$label = $_GET["label"];
		$labelSQL = "AND l.label_id = $label";
	}
	else {
		$labelSQL = "";
	}

	if(isset($_GET["sound"]) && !empty($_GET["sound"])) {
		$sound = $_GET["sound"];
		$soundSQL = "AND s.sound_id = $sound";
	}
	else {
		$soundSQL = "";
	}

	if(isset($_GET["format"]) && !empty(trim($_GET["format"]))) {
		$format = $_GET["format"];
		$formatSQL = "AND f.format_id = $format";
	}
	else {
		$formatSQL = "";
	}

	if(isset($_GET["award"]) && !empty($_GET["award"])) {
		$award = $_GET["award"];
		if($award == "any") {
			$award = "";
		}
		else if($award == "yes") {
			$award = "AND award IS NOT NULL";
		}
		else {
			$award = "AND award IS NULL";
		}
	}
	else {
		$award = "";
	}

	if(isset($_GET["release_date_from"]) && !empty($_GET["release_date_from"])) {
		$release_date_from = $_GET["release_date_from"];
		$release_date_fromSQL = "AND release_date >= \"$release_date_from\"";
	}
	else {
		$release_date_fromSQL = "";
	}

	if(isset($_GET["release_date_to"]) && !empty($_GET["release_date_to"])) {
		$release_date_to = $_GET["release_date_to"];
		$release_date_toSQL = "AND release_date <= \"$release_date_to\"";
	}
	else {
		$release_date_toSQL = "";
	}

	// If impossible dates--accept all or accept none?
	if($release_date_fromSQL != "" && $release_date_toSQL != "") {
		if(strcmp($release_date_from, $release_date_to) > 0) {
			$release_date_fromSQL = "";
			$release_date_toSQL = "";
		}
	}


	$host = "303.itpwebdev.com";
	$user = "bartecki";
	$pass = "TestPasswordITP303";
	$db = "bartecki_dvd_db";

	$mysqli = new mysqli($host, $user, $pass, $db);

	if($mysqli->connect_errno) {
		echo "MYSQL Connection Error:" . $mysqli->connect_error;
		exit();
	}


	$sql = "SELECT title, release_date, genre, rating 
			FROM dvd_titles dt
				JOIN genres g
					ON dt.genre_id = g.genre_id
				JOIN ratings r
					ON dt.rating_id = r.rating_id
				JOIN labels l
					ON dt.label_id = l.label_id
				JOIN formats f
					ON dt.format_id = f.format_id
				JOIN sounds s
					ON dt.sound_id = s.sound_id
			WHERE 1=1 $titleSQL $genreSQL $ratingSQL $labelSQL $soundSQL $formatSQL $award $release_date_fromSQL $release_date_toSQL;";
	
	$results = $mysqli->query($sql);
	if(!$results) {
		echo "SQL Error: " . $mysqli->error;
		exit();
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DVD Search Results</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="search_form.php">Search</a></li>
		<li class="breadcrumb-item active">Results</li>
	</ol>
	<div class="container-fluid">
		<div class="row">
			<h1 class="col-12 mt-4">DVD Search Results</h1>
		</div> <!-- .row -->
	</div> <!-- .container-fluid -->
	<div class="container-fluid">
		<div class="row mb-4">
			<div class="col-12 mt-4">
				<a href="search_form.php" role="button" class="btn btn-primary">Back to Form</a>
			</div> <!-- .col -->
		</div> <!-- .row -->
		<div class="row">
			<div class="col-12">

				Showing <?php echo mysqli_num_rows($results); ?> result(s).

			</div> <!-- .col -->
			<div class="col-12">
				<table class="table table-hover table-responsive mt-4">
					<thead>
						<tr>
							<th>DVD Title</th>
							<th>Release Date</th>
							<th>Genre</th>
							<th>Rating</th>
						</tr>
					</thead>
					<tbody>

						<?php 
							while($row = $results->fetch_assoc()) {
								echo "<tr> <td>" . $row["title"] . "</td><td>" . $row["release_date"] . "</td><td> " . $row["genre"] . "</td><td> " . $row["rating"] . "</td></tr>";				
							}
						?>

					</tbody>
				</table>
			</div> <!-- .col -->
		</div> <!-- .row -->
		<div class="row mt-4 mb-4">
			<div class="col-12">
				<a href="search_form.php" role="button" class="btn btn-primary">Back to Form</a>
			</div> <!-- .col -->
		</div> <!-- .row -->
	</div> <!-- .container-fluid -->
</body>
</html>