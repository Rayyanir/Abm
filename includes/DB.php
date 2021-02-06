<?php
date_default_timezone_set('America/Caracas');
//phpinfo();
	class ConnMySql  // se declara una clase para hacer la conexion con la base de datos
{
	var $con;
	
	function __construct()
	{
		// se definen los datos del servidor de base de datos 
		$conection['server']="localhost";  //host
		$conection['user']="root";         //  usuario
		$conection['pass']="";             //password
		$conection['base']="test";          //base de datos
		
		// crea la conexion pasandole el servidor , usuario y clave
		$conect= mysql_connect($conection['server'],$conection['user'],$conection['pass']);

		// si la conexion fue exitosa , selecciona la base
		if ($conect) 
		{	
			mysql_select_db($conection['base']);			
			$this->con=$conect;
		}
	}
	
	// devuelve la conexion
	function getConexion()
	{	
		return $this->con;
	}

	// cierra la conexion
	function Close()
	{
		mysql_close($this->con);
	}	
}
