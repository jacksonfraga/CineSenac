<?php
	include 'config.php';
	include 'autenticar.php';
	
	include 'domain/Usuario.php';
	include 'domain/UsuarioPersistencia.php';
	
	
	require('libs/Smarty.class.php');
	$smarty = new Smarty;

	$RepetirSenha;
	$messageError = "";
	$messageSuccess = "";

	$usuarioPersistencia = new UsuarioPersistencia();


	$usuarioSessao = unserialize($_SESSION["authorization"]);
	$email = $usuarioSessao->getEmail();
	$usuario = $usuarioPersistencia->getByEmail($email);	

	if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		if (isset($_REQUEST["Id"]))
			$usuario->setId($_REQUEST["Id"]);
		if (isset($_REQUEST["Senha"]))
			$usuario->setSenha($_REQUEST["Senha"]);
		if (isset($_REQUEST["RepetirSenha"]))			
			$RepetirSenha = $_REQUEST["RepetirSenha"];
		if (isset($_REQUEST["Nome"]))
			$usuario->setNome($_REQUEST["Nome"]);
		
		if ($usuario->getSenha() != $RepetirSenha)
		{
			$messageError .= "As senhas digitadas não coincidem, por favor verifique";
		}
		else
		{
			$usuarioPersistencia->update($usuario);
			$messageSuccess .= "Perfil salvo com sucesso!";
		}

	}


	

	
	$smarty->template_dir = 'templates/';

	$smarty->assign('nomeSistema',$nomeSistema);
	$smarty->assign('nomeEmpresa',$nomeEmpresa);
	$smarty->assign('enderecoEmpresa',$enderecoEmpresa);
	$smarty->assign('messageError',$messageError);
	$smarty->assign('messageSuccess',$messageSuccess);	
	$smarty->assign('usuario', $usuario);

	$smarty->display('userProfile.tpl');
?>