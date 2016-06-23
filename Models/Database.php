<?php

abstract class Database {

	protected $dbc;


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

	public function find() {
		$dbc = static::getDatabaseConnection();

		$id = isset( $_GET["id"]) ? $_GET["id"] : null;

		$sql = "SELECT " . implode(",", static::$columns) . " FROM " . static::$tableName . " WHERE id=:id";

		$statement = $dbc->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement -> execute();
		$singleRecord = $statement -> fetch(PDO::FETCH_ASSOC);
		return $singleRecord;
	   
	   }

	public function deleteMovie () {
		$dbc = static::getDatabaseConnection();

		$id = isset( $_GET["id"]) ? $_GET["id"] : null;
		
		$sql = "DELETE FROM " . static::$tableName . " WHERE id = :id";

		$statement = $dbc->prepare($sql);
		
		$statement->bindValue(":id", $id);
		
		$statement -> execute();

		header("Location:./");

	 }




 }