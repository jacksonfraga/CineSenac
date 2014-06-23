<?php

include_once 'config.php';
include_once 'autenticar.php';

include_once 'domain/class.ingresso.php';
include_once 'domain/ingressoPersistencia.php';
include_once 'domain/class.sessao.php';
include_once 'domain/sessaoPersistencia.php';
include_once 'domain/class.cliente.php';
include_once 'domain/clientePersistencia.php';

$messageError = "";
$messageSuccess = "";

$ingressoPersistencia = new IngressoPersistencia();
$sessaoPersistencia = new SessaoPersistencia();
$clientePersistencia = new ClientePersistencia();

$sessoes = $sessaoPersistencia->getAll();
$clientes = $clientePersistencia->getAll();

if (isset($_REQUEST["delete"]) && $_REQUEST["delete"] === "1") {

    $ingressoPersistencia->delete($_REQUEST["id"]);
} else {
    $ingresso = new Ingresso();


    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if (isset($_REQUEST["id"])) {
            $ingresso = $ingressoPersistencia->GetById($_REQUEST["id"]);
        }
    } else {
        if (isset($_REQUEST["Id"]))
            $ingresso->setId($_REQUEST["Id"]);
        if (isset($_REQUEST["ClienteId"]))
            $ingresso->setClienteId($_REQUEST["ClienteId"]);
        if (isset($_REQUEST["SessaoId"]))
            $ingresso->setSessaoId($_REQUEST["SessaoId"]);        
    }

    if (($_SERVER['REQUEST_METHOD'] == "POST") and ( $messageError == "")) {

        try {
            $ingressoPersistencia->post($ingresso);
            
            $redirect = "sessoes.php";
            header("location:$redirect");
            
        } catch (Exception $e) {
            $messageError = $e->getMessage();
        }
    }

    require('libs/Smarty.class.php');
    $smarty = new Smarty;

    $smarty->template_dir = 'templates/';

    $smarty->assign('nomeSistema', $nomeSistema);
    $smarty->assign('nomeEmpresa', $nomeEmpresa);
    $smarty->assign('enderecoEmpresa', $enderecoEmpresa);
    $smarty->assign('messageError', $messageError);
    $smarty->assign('messageSuccess', $messageSuccess);
    $smarty->assign('ingresso', $ingresso);
    $smarty->assign('sessoes', $sessoes);
    $smarty->assign('clientes', $clientes);

    $smarty->display('ingresso.tpl');
}