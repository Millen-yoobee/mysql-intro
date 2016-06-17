<?php

$dbc = new mysqli ( "localhost", "root", "", "millen-db");
// var_dump ($dbc); or print_r($dbc);

function getMovieList () {

	global $dbc;

	$sql = "SELECT id, title, description, release_date FROM movies";

	$result = $dbc -> query ($sql);
	// print_r ($result);  for debugging

	$movieArray = [];

	// $allMovies = $result -> fetch_all ();  returns all records
	// $allMovies = $result -> fetch_assoc (); // returns 1 at a time
	while ( $allMovies = $result -> fetch_assoc () )  {
		$movieArray [] = $allMovies;
	 }
	
	return $movieArray;
 }

function getSingleMovie () {
	global $dbc;

	if ( isset ($_GET ["id"]) ) {
		$id = $_GET ["id"];
	 }
	 else { 
		$id = null;
	  }

	$sql = "SELECT id, title, description, duration, release_date FROM movies WHERE id = '$id'";

	$result = $dbc -> query ($sql);

	$singleMovie = $result -> fetch_assoc ();
		// print_r( $singleMovie );  // or // var_dump ($singleMovie);	
	return $singleMovie;
 }

function deleteMovie ()  {
	global $dbc;
	if ( isset ($_GET ["id"]) ) {
		$id = $_GET ["id"];
	 }
	
	$sql = "DELETE FROM movies WHERE id = '$id'";

	$result = $dbc -> query ($sql);
	header ("Location:./");
 }

function editMovie ()  {
		// var_dump ($_POST);  // for debugging purposes
		// die ();  // for debugging purposes
	global $dbc;

	  // Obtain all input data from the superglobal var $_POST
	$id = $_POST ["id"];	
	$title = $_POST ["title"];
	$description = $_POST ["description"];
	$duration = $_POST ["duration"];
	$rating = $_POST ["rating"];
	$date = $_POST ["release_date"];
	
	$sql = "UPDATE movies SET title = '$title', description = '$description', rating = '$rating', duration = '$duration', release_date = '$date' WHERE id='$id'";

	$result = $dbc -> query ($sql);
	
	 // redirect to the browser at the specified location
	header ("Location:./?page=movie&id=$id");
 }

function addMovie () {
	global $dbc;
	// var_dump($_POST);
	// die ();
	$title = $_POST ["title"];
	$description = $_POST ["description"];
	$duration = $_POST ["duration"];
	$rating = $_POST ["rating"];
	$date = $_POST ["release_date"];

	$sql = "INSERT INTO movies(title, description, rating, duration, release_date) VALUES ('$title','$description','$rating','$duration','$date')";
	header ("Location:./?page=home");
 }

function genreList () {
	global $dbc;

	$id = isset ($_GET["id"]) ? $_GET["id"] : null;

	$sql = "SELECT id, genre FROM genre JOIN movie_genre ON id=genre_id WHERE movie_id = '$id'";

	$result = $dbc -> query ($sql);

	// $allGenres = $result -> fetch_all ();

	// // var_dump($allGenres);
	// return $allGenres;

	$genreArray = [];

	while ( $allGenres = $result -> fetch_assoc () )  
	 {
		$genreArray [] = $allGenres;
	 }
	return $genreArray;


 }




?>