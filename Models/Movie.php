<?php

class Movie extends Database {
	
	protected static $tableName = "movies";
	protected static $columns = ["id", "title", "description", "rating", "duration", "release_date"];

}