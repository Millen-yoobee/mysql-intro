<?php

abstract class Database {

	protected $dbc;

	protected $data = [];

	public function __construct($input = null) {
		//__construct runs automatically whenever an object is created in the Movie class or any children classes (tables within the DBc) of the Database class

		if ( static::$columns ) {
			foreach (static::$columns as $column) {
				$this->$column = null;
			}
		}

		if(is_numeric($input)) {
			$this->find($input);
		 }

		 if ( is_array($input) ) {
		 	foreach (static::$columns as $column) {
				$this->$column = $input[$column];
				
			}
		 }

	 }

	protected static function getDatabaseConnection() {
		$dsn = "mysql:host=localhost;dbname=millen-db;charset=utf8";
		$dbc = new PDO ($dsn, "root", "");

		$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbc->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		return $dbc; 
	 }

	public function SelectAll() {

		$dbc = static::getDatabaseConnection();
		$sql = "SELECT " . implode(",", static::$columns) . " FROM " . static::$tableName;
		// $sql = "SELECT " . implode(",", $this->columns) . " FROM " . $this->tableName;
		 // var_dump($sql);

		$statement = $dbc->prepare($sql);
		$statement -> execute();

		$Array = [];

		while ( $all = $statement -> fetch(PDO::FETCH_ASSOC) )  {
			$Array [] = $all;
		 }
	
		return $Array;
	  }

	public function find($id) {
		$dbc = static::getDatabaseConnection();

		// $id = isset( $_GET["id"]) ? $_GET["id"] : null;

		$sql = "SELECT " . implode(",", static::$columns) . " FROM " . static::$tableName . " WHERE id=:id";

		$statement = $dbc->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement -> execute();
		$singleRecord = $statement -> fetch(PDO::FETCH_ASSOC);
		$this->data = $singleRecord;
		 }

	public function insert() {

		$dbc = static::getDatabaseConnection();

		$columns = static::$columns;

		unset($columns[array_search("id", $columns)]); // removes the id because this is an insert

		$sql = "INSERT INTO " . static::$tableName . 
				" (" . implode(',', $columns) . ") VALUES (";
		$insertColumns = [];
			foreach ($columns as $column) {
				array_push($insertColumns, ":" .$column);
			 }
		$sql .= implode(",", $insertColumns);
		$sql .= ")";
		 // var_dump( $sql );

		$statement = $dbc->prepare($sql);

		foreach ( $columns as $column) {
			// var_dump( $column);
			// var_dump( $this->$column);
			$statement->bindValue(":" . $column, $this->$column);
		 }

		$result= $statement -> execute();
		$this->id = $dbc->lastInsertId();
	}	 

	public function update() {
		// echo("here now");
		$dbc = static::getDatabaseConnection();
		$columns = static::$columns;
		unset($columns[array_search("id", $columns)]); 

		$sql = "UPDATE " . static::$tableName . " SET "; 
				
		$updateColumns = [];
			foreach ($columns as $column) {
				array_push($updateColumns, $column . "=:" . $column);
			 }
		$sql .= implode(",", $updateColumns) . " WHERE id=:id";
		 // var_dump( $sql);
		$statement = $dbc->prepare($sql);

		foreach ( static::$columns as $column) {
			// var_dump( $column);
			// var_dump( $this->$column);
			$statement->bindValue(":" . $column, $this->$column);
		 }

		$result= $statement -> execute();

	}


	public function deleteMovie () {
		$dbc = static::getDatabaseConnection();

		$id = isset( $_GET["id"]) ? $_GET["id"] : null;
		
		$sql = "DELETE FROM " . static::$tableName . " WHERE id = :id";

		$statement = $dbc->prepare($sql);
		
		$statement->bindValue(":id", $id);
		
		$statement -> execute();
	 }

	public function addMovie () {
		$dbc = static::getDatabaseConnection();

		$id = isset( $_GET["id"]) ? $_GET["id"] : null;
		
		$sql = "DELETE FROM " . static::$tableName . " WHERE id = :id";

		$statement = $dbc->prepare($sql);
		
		$statement->bindValue(":id", $id);
		
		$statement -> execute();
	 }

	public function __get($name) {
		if ( in_array($name, static::$columns) ) {
			return $this->data[$name];
		} else {
			echo "Property '$name' is not found in the data variable";
		 }

	  }

	public function __set($name, $value) {
		 // setting values to the property of objects, which was initially set to null by __contruct
		if ( in_array($name, static::$columns) ) {
			$this->data[$name] = $value ;
		} else {
			echo "Property '$name' is not set with value";
		 }


	 }






 }

