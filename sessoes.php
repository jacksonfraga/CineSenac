<?php

include 'config.php';
include 'autenticar.php';

include 'domain/class.Sessao.php';
include 'domain/SessaoPersistencia.php';

$sessaoPersistencia = new SessaoPersistencia();

$messageError = "";
$messageSuccess = "";

$sessoes = array();

try {
    $sessoes = $sessaoPersistencia->getAll();
} catch (Exception $exc) {
    $messageError = $exc->getMessage();
}


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