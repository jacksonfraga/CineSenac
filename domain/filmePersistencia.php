<?php

include("mysql.php");

/**
 * Description of filmePersistencia
 *
 * @author Jackson
 */
class FilmePersistencia {

    private $tableName;

    function __construct() {
        $this->tableName = "filmes";
    }

    function fetchEntity($record) {
        $filme = new Filme();

        $filme->setId($record->Id);
        $filme->setSinopse($record->Sinopse);
        $filme->setTitulo($record->Titulo);
        $filme->setImageUrl($record->ImageUrl);
        $filme->setDuracao($record->Duracao);
        $filme->setLancamento($record->Lancamento);
        $filme->setTermino($record->Termino);
        $filme->setAtores($record->Atores);
        $filme->setGenero($record->Genero);

        return $filme;
    }

    private function getDataValues($entity) {
        return array(
            'Sinopse' => $entity->getSinopse(),
            'Titulo' => $entity->getTitulo(),
            'ImageUrl' => $entity->getImageUrl(),
            'Duracao' => $entity->getDuracao(),
            'Lancamento' => $entity->getLancamento(),
            'Termino' => $entity->getTermino(),
            'Atores' => $entity->getAtores(),
            'Genero' => $entity->getGenero());
    }

    function getAll() {
        $oMySQL = new HelperMySQL();
        $return = array();

        $records = $oMySQL->select($this->tableName);

        while ($registro = mysql_fetch_object($records)) {
            $return[] = $this->fetchEntity($registro);
        }

        return $return;
    }

    function getById($id) {
        $oMySQL = new HelperMySQL();

        $where = array('Id' => $id);

        $records = $oMySQL->select($this->tableName, $where);

        while ($registro = mysql_fetch_object($records)) {
            return $this->fetchEntity($registro);
        }

        return false;
    }

    function post($entity) {

        if ($entity->getId() > 0) {
            print_r($entity);
            $this->update($entity);
        } else {
            $this->insert($entity);
        }
    }

    private function insert($entity) {
        $oMySQL = new HelperMySQL();
        $data = $this->getDataValues($entity);
        $oMySQL->insert($this->tableName, $data);
    }

    private function update($entity) {
        $oMySQL = new HelperMySQL();

        $set = $this->getDataValues($entity);
        $where = array('Id' => $entity->getId());
        $oMySQL->update($this->tableName, $set, $where);
    }

    function delete($id) {
        $oMySQL = new HelperMySQL();
        $where = array('Id' => $id);
        $oMySQL->delete($this->tableName, $where);
    }

}
