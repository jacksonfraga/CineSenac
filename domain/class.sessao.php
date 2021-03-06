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
    private $TotalVendido;

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

    public function getTotalVendido() {
        return $this->TotalVendido;
    }

    public function setTotalVendido($TotalVendido) {
        $this->TotalVendido = $TotalVendido;
    }

    public function getCapacidade() {


        $totalVendido = $this->getTotalVendido();

        $capacidadeSala = $this->getSala()->getCapacidade();
        
        $result = round(100 * $totalVendido / $capacidadeSala);
        
        if (($result == 100) and ($totalVendido < $capacidadeSala))
        {
            $result = 99;
        }
        
        return $result;
    }
    
    public function isLotado()
    {
        $totalVendido = $this->getTotalVendido();
        $capacidadeSala = $this->getSala()->getCapacidade();
        
        return $totalVendido >= $capacidadeSala;
    }

    public function getDisplay() {
        $date = date_create($this->getData() . " " . $this->getInicio());
        return $this->getFilme()->getTitulo() . " " . date_format($date, '(d/m/Y H:i)');
    }

}
