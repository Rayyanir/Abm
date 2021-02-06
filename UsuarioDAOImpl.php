<?php
require 'includes/DB.php';

class UsuarioDAOImpl implements UsuarioDAO
{

	public function insertUsuario(UsuarioDTO $udto)
	{

		try {
			$cnn = new ConnMySql();
			$con = $cnn->getConexion();

			$name = $udto->getName();
			$username = $udto->getUsername();
			$email = $udto->getEmail();
			$pass = $udto->getPassword();

			$pass = hash('sha256', $pass);

			$query = "INSERT INTO users(name, username, email, password) 
				VALUES('$name', '$username', '$email', '$pass');";
			mysql_query($query);
			echo "New record created successfully";
		} catch (\Throwable $e) {
			echo 'Error de conexión: ' . $e->getMessage();
			exit;
		}
	}

	public function deleteUsuario($id)
	{
		try {
			$cnn = new ConnMySql();
			$con = $cnn->getConexion();

			$query = "DELETE FROM users WHERE uid=$id";
			mysql_query($query);
		} catch (\Throwable $e) {
			echo 'Error de conexión: ' . $e->getMessage();
			exit;
		}
	}

	public function updateUsuario(UsuarioDTO $udto, $uid)
	{
		try {
			$cnn = new ConnMySql();
			$con = $cnn->getConexion();

			$name = $udto->getName();
			$username = $udto->getUsername();
			$email = $udto->getEmail();
			$pass = $udto->getPassword();
			$pass = hash('sha256', $pass);

			$query = "UPDATE users 
				SET name 	 = '$name', 
				    username = '$username',  
		            email  = '$email',
					password    = '$pass'
				WHERE uid = $uid ";
			mysql_query($query);
		} catch (\Throwable $e) {
			echo 'Error de conexión: ' . $e->getMessage();
			exit;
		}
	}

	public function getAllUsuario()
	{
		try {
			$cnn = new ConnMySql();
			$con = $cnn->getConexion();

			$query = "SELECT * FROM users ORDER BY uid DESC";
			$result = mysql_query($query);

			return $result;
		} catch (\Throwable $e) {
			echo 'Error de conexión: ' . $e->getMessage();
			exit;
		}
	}

	public function getUsuarioById($iduser)
	{
		try {
			$cnn = new ConnMySql();
			$con = $cnn->getConexion();

			$query = "SELECT * FROM users WHERE uid  = $iduser;";
			$result = mysql_query($query);

			return $result;
		} catch (\Throwable $e) {
			echo 'Error de conexión: ' . $e->getMessage();
			exit;
		}
	}
}
