<?php

include 'config.php';
include 'autenticar.php';

include 'domain/class.Sala.php';
include 'domain/SalaPersistencia.php';

$messageError = "";
$messageSuccess = "";

$salaPersistencia = new SalaPersistencia();

if (isset($_REQUEST["delete"]) && $_REQUEST["delete"] === "1") {

    $salaPersistencia->delete($_REQUEST["id"]);
} else {
    $sala = new Sala();


    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if (isset($_REQUEST["id"])) {
            $sala = $salaPersistencia->GetById($_REQUEST["id"]);
        }
    } else {

        if (isset($_REQUEST["Id"]))
            $sala->setId($_REQUEST["Id"]);
        if (isset($_REQUEST["Nome"]))
            $sala->setNome($_REQUEST["Nome"]);
        if (isset($_REQUEST["Capacidade"]))
            $sala->setCapacidade($_REQUEST["Capacidade"]);       
    }

    if (($_SERVER['REQUEST_METHOD'] == "POST") and ( $messageError == "")) {

        try {
            $id = $salaPersistencia->post($sala);

            $redirect = "salas.php";
            header("location:$redirect");
        } catch (Exception $e) {
            die($e->getMessage());
            $messageError = $e->getMessage();
        }
    }


    if (isset($_REQUEST["id"])) {
        $sala = $salaPersistencia->getById($_REQUEST["id"]);
    }

    require('libs/Smarty.class.php');
    $smarty = new Smarty;

    $smarty->template_dir = 'templates/';

    $smarty->assign('nomeSistema', $nomeSistema);
    $smarty->assign('nomeEmpresa', $nomeEmpresa);
    $smarty->assign('enderecoEmpresa', $enderecoEmpresa);
    $smarty->assign('messageError', $messageError);
    $smarty->assign('messageSuccess', $messageSuccess);
    $smarty->assign('sala', $sala);

    $smarty->display('sala.tpl');
}