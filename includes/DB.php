<?php

	class ConnMySql  
{
	var $con;
	
	function __construct()
	{
		$conection['user']="root";        
		$conection['pass']="password";            
		$this->con = new PDO('mysql:host=localhost;dbname=test_abm', $conection['user'], $conection['pass']);
	
	}
	
	function getConexion()
	{	
		return $this->con;
	}

	function Close()
	{
		$this->con = null;
	}	
}
?>