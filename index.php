<?php

include "database.php";

// function getMovieList ();
$movies = getMovieList();

$singleMovie = getSingleMovie();

// if ( isset( $_GET ["page"]) ) {
// 	$page = $_GET ["page"];
//  } else {
//  	$page = "home";
//  }

 // ternary operator to get page information, replacing lines 10 to 14
$page = isset( $_GET ["page"] ) ? $_GET ["page"] : "home";

// switch to the page according to values in url
switch ($page) {
	case "home":
		include "home.php";
		break;

	case "movie":
		include "movie.php";
		break;

	case "movieForm":
		include "movieForm.php";
		break;

	case "add":
		// var_dump($_POST);
		addMovie ();
		break;

	case "edit":
		
		
		editMovie ();
		break;

	case "delete":
		deleteMovie ();
		break;

	default:
		echo "Error 404! Page not found.";
		break;

}






?>
