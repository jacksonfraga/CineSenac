<?php

include 'config.php';
include 'autenticar.php';

include 'domain/class.Sessao.php';
include 'domain/SessaoPersistencia.php';

$sessaoPersistencia = new FilmePersistencia();

$messageError = "";
$messageSuccess = "";

$sessoes = $sessaoPersistencia->getAll();


require('libs/Smarty.class.php');
$smarty = new Smarty;

$smarty->template_dir = 'templates/';

$smarty->assign('nomeSistema', $nomeSistema);
$smarty->assign('nomeEmpresa', $nomeEmpresa);
$smarty->assign('enderecoEmpresa', $enderecoEmpresa);
$smarty->assign('messageError', $messageError);
$smarty->assign('messageSuccess', $messageSuccess);
$smarty->assign('sessoes', $sessoes);

$smarty->display('sessoes.tpl');