<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title> Introduction to MySQL</title>
		<meta name="description" content="Between 150 and 160 characters">
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
		
		<h1> Movies List </h1>

		<a href="./?page=add">Add a Movie </a>
		 
		<?php
			foreach ($movies as $movie) {
			echo ' <li>
				<a href="./?page=movie&amp;id='. $movie['id'].'">' . $movie[ "id" ] . '.  '. $movie[ "title"] . ' 
				</a>
			 </li>' ;
			 }


		?>


	</body>

</html>