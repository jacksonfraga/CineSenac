<?php

include_once 'config.php';
include_once 'autenticar.php';

include_once 'domain/class.ingresso.php';
include_once 'domain/IngressoPersistencia.php';

$ingressoPersistencia = new IngressoPersistencia();

$messageError = "";
$messageSuccess = "";


$filmes = array();

if (isset($_REQUEST["filmeId"])) {
    $filmes = $ingressoPersistencia->getAllByFilme($_REQUEST["filmeId"]);
} elseif (isset($_REQUEST["sessaoId"])) {
    $filmes = $ingressoPersistencia->getAllBySessao($_REQUEST["sessaoId"]);
} 


require('libs/Smarty.class.php');
$smarty = new Smarty;

$smarty->template_dir = 'templates/';

$smarty->assign('nomeSistema', $nomeSistema);
$smarty->assign('nomeEmpresa', $nomeEmpresa);
$smarty->assign('enderecoEmpresa', $enderecoEmpresa);
$smarty->assign('messageError', $messageError);
$smarty->assign('messageSuccess', $messageSuccess);
$smarty->assign('ingressos', ingressos);

$smarty->display('ingressos.tpl');

?>