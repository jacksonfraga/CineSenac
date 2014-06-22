<?php

include_once 'config.php';
include_once 'autenticar.php';

include_once 'domain/class.Sessao.php';
include_once 'domain/SessaoPersistencia.php';

$messageError = "";
$messageSuccess = "";

$sessaoPersistencia = new SessaoPersistencia();

if (isset($_REQUEST["delete"]) && $_REQUEST["delete"] === "1") {

    $sessaoPersistencia->delete($_REQUEST["id"]);
} else {
    $sessao = new Sessao();


    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if (isset($_REQUEST["id"])) {
            $sessao = $sessaoPersistencia->GetById($_REQUEST["id"]);
        }
    } else {
        if (isset($_REQUEST["Id"]))
            $sessao->setId($_REQUEST["Id"]);
        if (isset($_REQUEST["Inicio"]))
            $sessao->setInicio($_REQUEST["Inicio"]);
        if (isset($_REQUEST["Fim"]))
            $sessao->setFim($_REQUEST["Fim"]);
        if (isset($_REQUEST["Data"]))
            $sessao->setData($_REQUEST["Data"]);
        if (isset($_REQUEST["FilmeId"]))
            $sessao->setFilmeId($_REQUEST["FilmeId"]);
        if (isset($_REQUEST["SalaId"]))
            $sessao->setSalaId($_REQUEST["SalaId"]);
        if (isset($_REQUEST["Valor"]))
            $sessao->setValor($_REQUEST["Valor"]);
    }

    if (($_SERVER['REQUEST_METHOD'] == "POST") and ( $messageError == "")) {

        try {
            $sessaoPersistencia->post($sessao);
            
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
    $smarty->assign('sessao', $sessao);

    $smarty->display('sessao.tpl');
}