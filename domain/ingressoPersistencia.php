<?php

include_once 'mysql.php';
include_once 'sessaoPersistencia.php';
include_once 'clientePersistencia.php';
include_once 'class.sessao.php';

/**
 * Description of ingressoPersistencia
 *
 * @author Jackson
 */
class IngressoPersistencia {

    private $tableName;

    function __construct() {
        $this->tableName = "ingressos";
    }

    function fetchEntity($record) {
        $ingresso = new Ingresso();

        $ingresso->setId($record->Id);
        $ingresso->setSessaoId($record->SessaoId);
        $ingresso->setClienteId($record->ClienteId);
        $ingresso->setDataHora($record->DataHora);

        $clientePersis = new ClientePersistencia();
        $ingresso->setCliente($clientePersis->getById($ingresso->getClienteId()));

        $sessaoPersis = new SessaoPersistencia();
        $ingresso->setSessao($sessaoPersis->getById($ingresso->getSessaoId()));

        return $ingresso;
    }

    private function getDataValues($entity) {
        return array(
            'ClienteId' => $entity->getClienteId(),
            'SessaoId' => $entity->getSessaoId());
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
            $this->update($entity);
        } else {
            $this->insert($entity);
        }
    }


    private function insert($entity) {
        $oMySQL = new HelperMySQL();
        
        $sessaoPersis = new SessaoPersistencia();
        $sessao = $sessaoPersis->getById($entity->getSessaoId());
        
        if ($sessao->isLotado())
        {
            throw new Exception("Não é possível efetuar a venda do ingresso, capacidade excedida desta sessão.");
        }

        $dt = new DateTime();
        $dataHora = array('DataHora' => $dt->format('Y-m-d H:i:s'));
        $data = array_merge($this->getDataValues($entity), $dataHora);

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
