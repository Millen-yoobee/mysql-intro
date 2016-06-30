<?php

require "Controllers/Controller.php";
require "Controllers/HomeController.php";
require "Controllers/MoviesController.php";


 // ternary operator to get page information, replacing lines 10 to 14
$page = isset( $_GET ["page"] ) ? $_GET ["page"] : "home";

// switch to the page according to values in url
switch ($page) {
	case "home":
		// include "home.php";
		$controller = new HomeController;
		$controller->show();
		break;

	case "movie":
		 //include "movie.php";
		$controller = new MoviesController;
		$controller->show();		
		break;

	// case "movieForm":
	// 	include "movieForm.php";
	// 	break;

	case "add":
		// var_dump($_POST);
		$controller = new MoviesController;
		$controller->add ();
		break;

	case "edit":
		$controller = new MoviesController;
		$controller->edit();			// instead of editMovie ();
		break;

	case "delete":
		 // Movie::deleteMovie ();   // refers to the Movie class
		$controller = new MoviesController;
		$controller->delete();			
		break;

	default:
		echo "Error 404! Page not found.";
		break;

}

?>

