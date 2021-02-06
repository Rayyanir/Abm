<?php
require 'UsuarioDAO.php';
require 'UsuarioDAOImpl.php';
require 'UsuarioDTO.php';


@$uid = $_POST['uid'];
@$name = $_POST['name']; 
@$username = $_POST['username'];
@$email = $_POST['email'];
@$password = $_POST['password'];
@$val = $_POST['1'];
@$id = $_GET['id'];
@$v2 = $_GET['v2'];
@$v3 = $_POST['v3'];

	if($val==1){
		
		$udto = new UsuarioDTO();
		$udto->setName($name);
		$udto->setUsername($username);
		$udto->setEmail($email);
		$udto->setPassword($password);
		
		
		$udao = new UsuarioDAOImpl();
		$udao->insertUsuario($udto);
		
		header('Location: http://159.203.86.158/abm/vistas/crudFormUsuario.php');
	}
	
	if($v2==2){
		
		$udao = new UsuarioDAOImpl();
		$udao->deleteUsuario($id);
		
		header('Location: http://159.203.86.158/abm/vistas/crudFormUsuario.php');
	}

	if($v3==3){
	
		$udtoUp = new UsuarioDTO();
		$udtoUp->setName($name);
		$udtoUp->setUsername($username);
		$udtoUp->setEmail($email);
		$udtoUp->setPassword($password);
	
		$udao = new UsuarioDAOImpl();
		$udao->updateUsuario($udtoUp, $uid);
	
		header('Location: http://159.203.86.158/abm/vistas/crudFormUsuario.php');
	}

function getAllFuncionario(){
	$udao = new UsuarioDAOImpl();
	return $udao->getAllUsuario();
}

?>