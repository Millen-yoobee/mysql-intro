<?php
	// $genres = genreList();

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title> Introduction to MySQL</title>
		<meta name="description" content="Between 150 and 160 characters">
		<link rel="stylesheet" type = "text/css" href="css/styles.css">
	</head>
	<body>
		
		<h1>  <?=$singleMovie["title"]?> </h1>
		<p> Release Year - <?=$singleMovie["release_date"]?> </p>
		<p> <?= $singleMovie["description"]?> </p>
		<p> <?= $singleMovie["duration"]?> </p>
		<?php
		 	foreach ($genres as $genre) {
		 		echo "<strong><span>". $genre["genre"] . "&nbsp; </span> </strong>";
		 	}

		?>

		<a href="./?page=movieForm&amp;id=<?=$singleMovie['id']?>">Edit Movie</a>
		<br>
		<a href="./?page=delete&amp;id=<?=$singleMovie['id']?>">Delete Movie </a>
		<br>
		<a href="./"> Back to Movie List </a>
		

	</body>

</html>