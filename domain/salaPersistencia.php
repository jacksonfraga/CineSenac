<?php

include_once('mysql.php');
include_once "class.sala.php";

/**
 * Description of SalaPersistencia
 *
 * @author Jackson
 */
class SalaPersistencia {

    private function fetchEntity($record) {

        $sala = new Sala();
        $sala->setId($record->Id);
        $sala->setNome($record->Nome);        
        $sala->setCapacidade($record->Capacidade);
        return $sala;
    }

    function getAll() {
        $oMySQL = new HelperMySQL();
        $return = array();

        $records = $oMySQL->select('salas');

        while ($registro = mysql_fetch_object($records)) {
            $return[] = $this->fetchEntity($registro);
        }

        return $return;
    }

    function getById($id) {
        $oMySQL = new HelperMySQL();
        $return = new Sala;

        $where = array('Id' => $id);

        $records = $oMySQL->select('salas', $where);

        while ($registro = mysql_fetch_object($records)) {
            $return = $this->fetchEntity($registro);
            break;
        }

        return $return;
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

        $data = array(//'Id' => $entity->getId(),
            'Nome' => $entity->getNome(),
            'Capacidade' => $entity->getCapacidade());

        $oMySQL->insert('salas', $data);
    }

    private function update($entity) {
        $oMySQL = new HelperMySQL();

        $set = array(
            'Nome' => $entity->getNome(),
            'Capacidade' => $entity->getCapacidade());
        

        $where = array('Id' => $entity->getId());
                

        $oMySQL->update('salas', $set, $where);
    }

    function delete($id) {
        $oMySQL = new HelperMySQL();
        $where = array('Id' => $id);
        $oMySQL->delete('salas', $where);
    }

}
