<?php

require "Views/View.php";
require "Views/HomeView.php";
// require "Models/Movie";

class HomeController extends Controller 
{
	public function show() {
		// echo "here";
		$movie = new Movie;
		$movies = $movie -> SelectAll();
		 //var_dump(count($movies));
		

		$view = new HomeView(compact("movies"));
		$view->render();
	}

}