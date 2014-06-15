<?php

include 'config.php';
include 'autenticar.php';

include 'domain/Filme.php';
include 'domain/FilmePersistencia.php';

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