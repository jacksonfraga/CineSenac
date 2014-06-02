<?php
	include 'domain/Usuario.php';
	include 'domain/UsuarioPersistencia.php';
	include 'config.php';

	$messageError = "";
	$email = "";
	$password = "";
	
	if (isset($_REQUEST["email"]) and $_REQUEST["email"] != "")
	{
		$email = $_REQUEST["email"];
		
		if (isset($_REQUEST["password"]) and $_REQUEST["password"] != "")
		{
			$password = $_REQUEST["password"];
			
			$usuario = new Usuario();
			$usuario->setEmail($email);
			$usuario->setSenha($password);
			
			$usuarioPersistencia = new UsuarioPersistencia();
			
			if ($usuarioPersistencia->validarLogin($usuario))
			{
				session_start();
				$_SESSION["authorization"] = serialize($usuario);
				// deveria fazer a validação do login
				$redirect = "admin.php";	
				header("location:$redirect");	
			}
			else
				$messageError = "Usuário ou senha inválidos";
		}
		else
			$messageError = "Informe o campo Senha";
	}
	else
		$messageError = "Informe o campo Usuário";
		
		if ($_SERVER['REQUEST_METHOD'] == "GET")
			$messageError = "";
			
	
	require('libs/Smarty.class.php');
	$smarty = new Smarty;
	
	$smarty->template_dir = 'templates/';

	$smarty->assign('nomeSistema',$nomeSistema);
	$smarty->assign('nomeEmpresa',$nomeEmpresa);
	$smarty->assign('enderecoEmpresa',$enderecoEmpresa);
	$smarty->assign('messageError',$messageError);
	$smarty->assign('email',$email);
	$smarty->assign('password',$password);

	$smarty->display('login.tpl');
?>