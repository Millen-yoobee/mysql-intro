<?php


$dbc = new mysqli ( "localhost", "root", "", "millen-db");
// var_dump ($dbc); or print_r like below
// print_r($dbc);


function getMovieList () {

	global $dbc;

	$sql = "SELECT id, title, description, release_date FROM movies";

	$result = $dbc -> query ($sql);

	// print_r ($result);  for debugging

	// $allMovies = $result -> fetch_all ();  returns all records
	// $allMovies = $result -> fetch_assoc (); // returns 1 at a time

	$movieArray = [];

	while ( $allMovies = $result -> fetch_assoc () )  
	{
		$movieArray [] = $allMovies;
	 }
	
	return $movieArray;

 }

function getSingleMovie () {
	global $dbc;
	if ( isset ($_GET ["id"]) ) {
		$id = $_GET [ "id"];
	 }
	 else { 
		$id = 2;
	  }

	$sql = "SELECT id, title, description, release_date FROM movies WHERE id = '$id' ";

	$result = $dbc -> query ($sql);

	$singleMovie = $result -> fetch_assoc ();
	var_dump ($singleMovie);	

	return $singleMovie;


 }

?>