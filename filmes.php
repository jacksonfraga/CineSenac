<?php

include_once 'config.php';
include_once 'autenticar.php';

include_once 'domain/class.Filme.php';
include_once 'domain/FilmePersistencia.php';

$filmePersistencia = new FilmePersistencia();

$messageError = "";
$messageSuccess = "";

$filmes = $filmePersistencia->getAll();


require('libs/Smarty.class.php');
$smarty = new Smarty;

$smarty->template_dir = 'templates/';

$smarty->assign('nomeSistema', $nomeSistema);
$smarty->assign('nomeEmpresa', $nomeEmpresa);
$smarty->assign('enderecoEmpresa', $enderecoEmpresa);
$smarty->assign('messageError', $messageError);
$smarty->assign('messageSuccess', $messageSuccess);
$smarty->assign('filmes', $filmes);

$smarty->display('filmes.tpl');

?>