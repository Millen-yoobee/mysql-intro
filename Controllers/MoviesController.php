<?php

require "Views/MoviesView.php";
require "Views/MovieFormView.php";

class MoviesController extends Controller {

	public function show() {
		$movie = new Movie;
		$singleMovie = $movie->find();
	
		$view = new MoviesView(compact("singleMovie"));
		$view->render();
	}

	public static function delete() {
		$movie = new Movie;          // or Movie::deleteMovie():
		$movie->deleteMovie();		// Movie::deleteMovie(); does not need this line
		header("Location:./");	
				
	}

	public static function edit() {
		$movie = new Movie;
		$singleMovie = $movie->find();
		$view = new MovieFormView(compact("singleMovie"));

		$view->render();
	
						
	}

	public static function add () {
		$view = new MovieFormView;
		// $singleMovie = $view->view();
		// $view = new MovieFormView(compact("singleMovie"));

		$view->render();
	
						
	}

}
