<?php

include_once 'config.php';
include_once 'autenticar.php';

include_once 'domain/class.Cliente.php';
include_once 'domain/ClientePersistencia.php';

$messageError = "";
$messageSuccess = "";

$clientePersistencia = new ClientePersistencia();

if (isset($_REQUEST["delete"]) && $_REQUEST["delete"] === "1") {

    $clientePersistencia->delete($_REQUEST["id"]);
} else {
    $cliente = new Cliente();


    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if (isset($_REQUEST["id"])) {
            $cliente = $clientePersistencia->GetById($_REQUEST["id"]);
        }
    } else {

        if (isset($_REQUEST["Id"]))
            $cliente->setId($_REQUEST["Id"]);
        if (isset($_REQUEST["Nome"]))
            $cliente->setNome($_REQUEST["Nome"]);
        if (isset($_REQUEST["Email"]))
            $cliente->setEmail($_REQUEST["Email"]);
        if (isset($_REQUEST["Telefone"]))
            $cliente->setTelefone($_REQUEST["Telefone"]);
        if (isset($_REQUEST["Cidade"]))
            $cliente->setCidade($_REQUEST["Cidade"]);
        if (isset($_REQUEST["Estado"]))
            $cliente->setEstado($_REQUEST["Estado"]);
        if (isset($_REQUEST["Endereco"]))
            $cliente->setEndereco($_REQUEST["Endereco"]);
        if (isset($_REQUEST["CPF"]))
            $cliente->setCPF($_REQUEST["CPF"]);
        if (isset($_REQUEST["RG"]))
            $cliente->setRG($_REQUEST["RG"]);
        if (isset($_REQUEST["NomePai"]))
            $cliente->setNomePai($_REQUEST["NomePai"]);
        if (isset($_REQUEST["NomeMae"]))
            $cliente->setNomeMae($_REQUEST["NomeMae"]);
        if (isset($_REQUEST["Foto"]))
            $cliente->setFoto($_REQUEST["Foto"]);                
        
        if (isset($_FILES['userfile']) and ( $_FILES['userfile']['size'] > 0)) {
            $uploaddir = 'img/fotos/';
            $ext = end((explode(".", $_FILES['userfile']['name'])));
            date_default_timezone_set('America/Sao_Paulo');
            $dataHora = date('Ymdhis', time());

            $uploadPath = $uploaddir . "/Foto_" . $cliente->getId() . "_" . $dataHora . "." . $ext;

            //if ($_FILES['userfile']['size'] > 1048576)// 1Mb
            if ($_FILES['userfile']['size'] > 524288) { // 500Kb
                $messageError = "O tamanho da foto foi excedido " . $_FILES['userfile']['size'] . "\n";
            } else if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadPath)) {
                $cliente->setFoto($uploadPath);
            } else {
                $messageError = "Não possível copiar a foto\n";
            }
        }
    }

    if (($_SERVER['REQUEST_METHOD'] == "POST") and ( $messageError == "")) {

        try {
            $id = $clientePersistencia->post($cliente);

            $redirect = "clientes.php";
            header("location:$redirect");
        } catch (Exception $e) {
            die($e->getMessage());
            $messageError = $e->getMessage();
        }
    }


    if (isset($_REQUEST["id"])) {
        $cliente = $clientePersistencia->getById($_REQUEST["id"]);
    }

    require('libs/Smarty.class.php');
    $smarty = new Smarty;

    $smarty->template_dir = 'templates/';

    $smarty->assign('nomeSistema', $nomeSistema);
    $smarty->assign('nomeEmpresa', $nomeEmpresa);
    $smarty->assign('enderecoEmpresa', $enderecoEmpresa);
    $smarty->assign('messageError', $messageError);
    $smarty->assign('messageSuccess', $messageSuccess);
    $smarty->assign('cliente', $cliente);

    $smarty->display('cliente.tpl');
}