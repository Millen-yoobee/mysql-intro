<?php


$dbc = new mysqli ( "localhost", "root", "", "millen-db");
// var_dump ($dbc); or print_r like below
// print_r($dbc);


function getMovieList () {

	global $dbc;

	$sql = "SELECT id, title, description, release_date FROM movies";

	$result = $dbc -> query ($sql);

	$allMovies = $result -> fetch_all ();
	print_r ($allMovies);
	return $allMovies;

 }
?>