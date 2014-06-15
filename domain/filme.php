<?php

class Filme {

    protected $Id;
    protected $Titulo;
    protected $Lancamento;
    protected $Termino;
    protected $Duracao;
    protected $Atores;
    protected $Genero;
    protected $ImageUrl;
    protected $Sinopse;

    public function getTermino() {
        return $this->Termino;
    }

    public function setTermino($Termino) {
        $this->Termino = $Termino;
    }

    public function getId() {
        return $this->Id;
    }

    public function getTitulo() {
        return $this->Titulo;
    }

    public function getLancamento() {
        return $this->Lancamento;
    }

    public function getDuracao() {
        return $this->Duracao;
    }

    public function getAtores() {
        return $this->Atores;
    }

    public function getGenero() {
        return $this->Genero;
    }

    public function getImageUrl() {
        return $this->ImageUrl;
    }

    public function getSinopse() {
        return $this->Sinopse;
    }

    public function setId($Id) {
        $this->Id = $Id;
    }

    public function setTitulo($Titulo) {
        $this->Titulo = $Titulo;
    }

    public function setLancamento($Lancamento) {
        $this->Lancamento = $Lancamento;
    }

    public function setDuracao($Duracao) {
        $this->Duracao = $Duracao;
    }

    public function setAtores($Atores) {
        $this->Atores = $Atores;
    }

    public function setGenero($Genero) {
        $this->Genero = $Genero;
    }

    public function setImageUrl($ImageUrl) {
        $this->ImageUrl = $ImageUrl;
    }

    public function setSinopse($Sinopse) {
        $this->Sinopse = $Sinopse;
    }

}

?>