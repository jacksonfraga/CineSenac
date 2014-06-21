<?php

class Sala
{
    private $Id;
    private $Nome;
    private $Capacidade;
    
    public function getId() {
        return $this->Id;
    }

    public function getNome() {
        return $this->Nome;
    }

    public function getCapacidade() {
        return $this->Capacidade;
    }

    public function setId($Id) {
        $this->Id = $Id;
    }

    public function setNome($Nome) {
        $this->Nome = $Nome;
    }

    public function setCapacidade($Capacidade) {
        $this->Capacidade = $Capacidade;
    }
}

