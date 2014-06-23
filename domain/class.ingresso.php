<?php

class Ingresso {
    
    private $Id;
    private $Sessao;
    private $SessaoId;
    private $Cliente;
    private $ClienteId;
    private $DataHora;
    
    public function getId() {
        return $this->Id;
    }

    public function getSessao() {
        return $this->Sessao;
    }

    public function getSessaoId() {
        return $this->SessaoId;
    }

    public function getCliente() {
        return $this->Cliente;
    }

    public function getClienteId() {
        return $this->ClienteId;
    }

    public function getDataHora() {
        return $this->DataHora;
    }

    public function setId($Id) {
        $this->Id = $Id;
    }

    public function setSessao($Sessao) {
        $this->Sessao = $Sessao;
    }

    public function setSessaoId($SessaoId) {
        $this->SessaoId = $SessaoId;
    }

    public function setCliente($Cliente) {
        $this->Cliente = $Cliente;
    }

    public function setClienteId($ClienteId) {
        $this->ClienteId = $ClienteId;
    }

    public function setDataHora($DataHora) {
        $this->DataHora = $DataHora;
    }

   
}