<?php

abstract class View  // this is going to be the parent class
{
	protected $data =[ ];

	public function __construct($data) 
	 {
	 	$this->data = $data;
	 	// var_dump($this->data);
	 }
	abstract public function render(); 

}