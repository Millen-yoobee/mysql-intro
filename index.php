<?php

include "database.php";

// function getMovieList ();
$movies = getMovieList();



?>

<html lang="en">

	<head>
		<meta charset="utf-8">

		<title> Introduction to MySQL</title>
		<meta name="description" content="Between 150 and 160 characters">
		<link rel="stylesheet" href="css/styles.css">

	</head>

	<body>
		


		<h1> Movies List </h1>
		<?php
			foreach ($movies as $movie) {

			echo " <li>" . $movie[0] . ". " . $movie[1] . "</li>";
			 }


		?>


	</body>

</html>