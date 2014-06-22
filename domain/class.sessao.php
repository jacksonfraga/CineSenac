<?php

class Sessao {

    private $Id;
    private $Inicio;
    private $Fim;
    private $Data;
    private $FilmeId;
    private $SalaId;
    private $Valor;
    
    private $Filme;
    private $Sala;

    public function getId() {
        return $this->Id;
    }

    public function getInicio() {
        return $this->Inicio;
    }

    public function getFim() {
        return $this->Fim;
    }

    public function getData() {
        return $this->Data;
    }

    public function getFilmeId() {
        return $this->FilmeId;
    }

    public function getSalaId() {
        return $this->SalaId;
    }

    public function setId($Id) {
        $this->Id = $Id;
    }

    public function setInicio($Inicio) {
        $this->Inicio = $Inicio;
    }

    public function setFim($Fim) {
        $this->Fim = $Fim;
    }

    public function setData($Data) {
        $this->Data = $Data;
    }

    public function setFilmeId($FilmeId) {
        $this->FilmeId = $FilmeId;
    }

    public function setSalaId($SalaId) {
        $this->SalaId = $SalaId;
    }

    public function getValor() {
        return $this->Valor;
    }

    public function setValor($Valor) {
        $this->Valor = $Valor;
    }

    public function getFilme() {
        return $this->Filme;
    }

    public function getSala() {
        return $this->Sala;
    }

    public function setFilme($Filme) {
        $this->Filme = $Filme;
    }

    public function setSala($Sala) {
        $this->Sala = $Sala;
    }


}
