<?php

include_once 'mysql.php';
include_once 'filmePersistencia.php';
include_once 'salaPersistencia.php';
include_once 'class.sessao.php';

/**
 * Description of SessaoPersistencia
 *
 * @author Jackson
 */
class SessaoPersistencia {

    private $tableName;

    function __construct() {
        $this->tableName = "sessoes";
    }

    function fetchEntity($record) {
        $sessao = new Sessao();

        $sessao->setId($record->Id);    
        $sessao->setInicio($record->Inicio);
        $sessao->setFim($record->Fim);
        $sessao->setData($record->Data);
        $sessao->setFilmeId($record->FilmeId);
        $sessao->setSalaId($record->SalaId);
        $sessao->setValor($record->Valor); 
        
        $sessao->setTotalVendido($this->getTotalVendido($record->Id));        
        
        $filmePersis = new FilmePersistencia();        
        $sessao->setFilme($filmePersis->getById($sessao->getFilmeId()));
        
        $salaPersis = new SalaPersistencia();
        $sessao->setSala($salaPersis->getById($sessao->getSalaId()));

        return $sessao;
    }

    private function getDataValues($entity) {
        return array(
            'Inicio' => $entity->getInicio(),
            'Fim' => $entity->getFim(),
            'Data' => $entity->getData(),
            'FilmeId' => $entity->getFilmeId(),
            'SalaId' => $entity->getSalaId(),
            'Valor' => $entity->getValor());
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
    
    function getTotalVendido($sessaoId)
    {
        $oMySQL = new HelperMySQL();
        

        $rs = $oMySQL->sql_query("SELECT COUNT(1) FROM ingressos WHERE SessaoId = $sessaoId ");
        
        $r = mysql_fetch_row($rs);
        mysql_free_result($rs);        
        return $r[0];
    }

}
