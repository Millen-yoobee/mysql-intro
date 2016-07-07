<?php

require "Views/MoviesView.php";
require "Views/MovieFormView.php";

class MoviesController extends Controller {

	public function show() {
		 // $movie = new Movie;
		 // $singleMovie = $movie->find();
		$id = isset($_GET["id"]) ? ($_GET["id"]) : null;   // replaces about 2 statements

		$singleMovie = new Movie($id);       // replaces about 2 statements
		var_dump($singleMovie);

		$view = new MoviesView(compact("singleMovie"));
		$view->render();
	}

	public static function delete() {
		$movie = new Movie;          // or Movie::deleteMovie():
		$movie->deleteMovie();		// Movie::deleteMovie(); does not need this line
		header("Location:./");	
				
	}

	public static function edit() {
		$movie = new Movie;  // __construct automatically runs
		$singleMovie = $movie->find();
		$view = new MovieFormView(compact("singleMovie"));

		$view->render();
	
						
	}

	public static function add () {
		$singleMovie = new Movie;    // creates an object with all the field names with null values
		$view = new MovieFormView(compact("singleMovie"));
		// $singleMovie = $view->view();
		// $view = new MovieFormView(compact("singleMovie"));
		$view->render();
	}

	public function insert() {
		$movie = new Movie($_POST);
		
		$movie->insert();
	 }

}
