<?php

include_once 'config.php';
include_once 'autenticar.php';

include_once 'domain/class.Cliente.php';
include_once 'domain/ClientePersistencia.php';

$clientePersistencia = new ClientePersistencia();

$messageError = "";
$messageSuccess = "";

$clientes = $clientePersistencia->getAll();


require('libs/Smarty.class.php');
$smarty = new Smarty;

$smarty->template_dir = 'templates/';

$smarty->assign('nomeSistema',$nomeSistema);
$smarty->assign('nomeEmpresa',$nomeEmpresa);
$smarty->assign('enderecoEmpresa',$enderecoEmpresa);
$smarty->assign('messageError',$messageError);
$smarty->assign('messageSuccess',$messageSuccess);	
$smarty->assign('clientes', $clientes);

$smarty->display('clientes.tpl');
