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
        if (isset($_REQUEST["Titulo"]))
            $sessao->setTitulo($_REQUEST["Titulo"]);
        if (isset($_REQUEST["Sinopse"]))
            $sessao->setSinopse($_REQUEST["Sinopse"]);
        if (isset($_REQUEST["ImageUrl"]))
            $sessao->setImageUrl($_REQUEST["ImageUrl"]);
        if (isset($_REQUEST["Duracao"]))
            $sessao->setDuracao($_REQUEST["Duracao"]);
        if (isset($_REQUEST["Lancamento"]))
            $sessao->setLancamento($_REQUEST["Lancamento"]);
        if (isset($_REQUEST["Termino"]))
            $sessao->setTermino($_REQUEST["Termino"]);
        if (isset($_REQUEST["Atores"]))
            $sessao->setAtores($_REQUEST["Atores"]);
        if (isset($_REQUEST["Genero"]))
            $sessao->setGenero($_REQUEST["Genero"]);
    }

    if (($_SERVER['REQUEST_METHOD'] == "POST") and ( $messageError == "")) {

        try {
            $id = $sessaoPersistencia->post($sessao);
            $redirect = "sessoes.php";
            header("location:$redirect");
        } catch (Exception $e) {
            die($e->getMessage());
            $messageError = $e->getMessage();
        }
    }


    if (isset($_REQUEST["id"])) {
        $sessao = $sessaoPersistencia->getById($_REQUEST["id"]);
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