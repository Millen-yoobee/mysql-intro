<?php

include "database.php";

// function getMovieList ();
$movies = getMovieList();

$singleMovie = getSingleMovie();

if ( isset ($_GET["page"]) ) {

	include "movie.php";
 }	
	else {

		include "home.php";
	 }

 



?>
