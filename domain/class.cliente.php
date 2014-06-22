<?php

class Cliente
{
    private $Id;
    private $Nome;
    private $Email;
    private $Telefone;
    private $Estado;
    private $Cidade;
    private $Endereco;
    private $CPF;
    private $RG;
    private $NomePai;
    private $NomeMae;
    private $Foto;
    
    public function getId() {
        return $this->Id;
    }

    public function getNome() {
        return $this->Nome;
    }

    public function getEmail() {
        return $this->Email;
    }

    public function getTelefone() {
        return $this->Telefone;
    }

    public function getEstado() {
        return $this->Estado;
    }

    public function getCidade() {
        return $this->Cidade;
    }

    public function getEndereco() {
        return $this->Endereco;
    }

    public function getCPF() {
        return $this->CPF;
    }

    public function getRG() {
        return $this->RG;
    }

    public function getNomePai() {
        return $this->NomePai;
    }

    public function getNomeMae() {
        return $this->NomeMae;
    }

    public function getFoto() {
        return $this->Foto;
    }

    public function setId($Id) {
        $this->Id = $Id;
    }

    public function setNome($Nome) {
        $this->Nome = $Nome;
    }

    public function setEmail($Email) {
        $this->Email = $Email;
    }

    public function setTelefone($Telefone) {
        $this->Telefone = $Telefone;
    }

    public function setEstado($Estado) {
        $this->Estado = $Estado;
    }

    public function setCidade($Cidade) {
        $this->Cidade = $Cidade;
    }

    public function setEndereco($Endereco) {
        $this->Endereco = $Endereco;
    }

    public function setCPF($CPF) {
        $this->CPF = $CPF;
    }

    public function setRG($RG) {
        $this->RG = $RG;
    }

    public function setNomePai($NomePai) {
        $this->NomePai = $NomePai;
    }

    public function setNomeMae($NomeMae) {
        $this->NomeMae = $NomeMae;
    }

    public function setFoto($Foto) {
        $this->Foto = $Foto;
    }



}

