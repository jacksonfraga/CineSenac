<?php

include 'config.php';
include 'autenticar.php';

include 'domain/Filme.php';
include 'domain/FilmePersistencia.php';

$messageError = "";
$messageSuccess = "";

$filmePersistencia = new FilmePersistencia();

if (isset($_REQUEST["delete"]) && $_REQUEST["delete"] === "1") {

    $filmePersistencia->delete($_REQUEST["id"]);
} else {
    $filme = new Filme();


    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if (isset($_REQUEST["id"])) {
            $filme = $filmePersistencia->GetById($_REQUEST["id"]);
        }
    } else {

if (isset($_REQUEST["Id"]))
            $filme->setId($_REQUEST["Id"]);
        if (isset($_REQUEST["Titulo"]))
            $filme->setTitulo($_REQUEST["Titulo"]);
        if (isset($_REQUEST["Sinopse"]))
            $filme->setSinopse($_REQUEST["Sinopse"]);
        if (isset($_REQUEST["ImageUrl"]))
            $filme->setImageUrl($_REQUEST["ImageUrl"]);
        if (isset($_REQUEST["Duracao"]))
            $filme->setDuracao($_REQUEST["Duracao"]);
        if (isset($_REQUEST["Lancamento"]))
            $filme->setLancamento($_REQUEST["Lancamento"]);
        if (isset($_REQUEST["Termino"]))
            $filme->setTermino($_REQUEST["Termino"]);
        if (isset($_REQUEST["Atores"]))
            $filme->setAtores($_REQUEST["Atores"]);
        if (isset($_REQUEST["Genero"]))
            $filme->setGenero($_REQUEST["Genero"]);
    }

    if (($_SERVER['REQUEST_METHOD'] == "POST") and ( $messageError == "")) {

        try {
            $id = $filmePersistencia->post($filme);
            $redirect = "filmes.php";
            header("location:$redirect");
        } catch (Exception $e) {
            die($e->getMessage());
            $messageError = $e->getMessage();
        }
    }


    if (isset($_REQUEST["id"])) {
        $filme = $filmePersistencia->getById($_REQUEST["id"]);
    }

    require('libs/Smarty.class.php');
    $smarty = new Smarty;

    $smarty->template_dir = 'templates/';

    $smarty->assign('nomeSistema', $nomeSistema);
    $smarty->assign('nomeEmpresa', $nomeEmpresa);
    $smarty->assign('enderecoEmpresa', $enderecoEmpresa);
    $smarty->assign('messageError', $messageError);
    $smarty->assign('messageSuccess', $messageSuccess);
    $smarty->assign('filme', $filme);

    $smarty->display('filme.tpl');
}