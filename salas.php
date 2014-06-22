<?php

include 'config.php';
include 'autenticar.php';

include 'domain/class.Sala.php';
include 'domain/SalaPersistencia.php';

$salaPersistencia = new SalaPersistencia();

$messageError = "";
$messageSuccess = "";

$salas = $salaPersistencia->getAll();


require('libs/Smarty.class.php');
$smarty = new Smarty;

$smarty->template_dir = 'templates/';

$smarty->assign('nomeSistema',$nomeSistema);
$smarty->assign('nomeEmpresa',$nomeEmpresa);
$smarty->assign('enderecoEmpresa',$enderecoEmpresa);
$smarty->assign('messageError',$messageError);
$smarty->assign('messageSuccess',$messageSuccess);	
$smarty->assign('salas', $salas);

$smarty->display('salas.tpl');
