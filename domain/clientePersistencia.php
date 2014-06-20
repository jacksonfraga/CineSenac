<?php

include_once('mysql.php');

/**
 * Description of clientePersistencia
 *
 * @author Jackson
 */
class clientePersistencia {

    private function fetchEntity($record) {

        $cliente = new Cliente();
        $cliente->setId($record->Id);
        $cliente->setNome($record->Nome);
        $cliente->setEmail($record->Email);
        $cliente->setTelefone($record->Telefone);
        $cliente->setEstado($record->Estado);
        $cliente->setCidade($record->Cidade);
        $cliente->setEndereco($record->Endereco);
        $cliente->setCPF($record->CPF);
        $cliente->setRG($record->RG);
        $cliente->setNomePai($record->NomePai);
        $cliente->setNomeMae($record->NomeMae);
        $cliente->setFoto($record->Foto);
        return $cliente;
    }

    function getAll() {
        $oMySQL = new HelperMySQL();
        $return = array();

        $records = $oMySQL->select('clientes');

        while ($registro = mysql_fetch_object($records)) {
            $return[] = $this->fetchEntity($registro);
        }

        return $return;
    }

    function getById($id) {
        $oMySQL = new HelperMySQL();
        $return = new Cliente;

        $where = array('Id' => $id);

        $records = $oMySQL->select('clientes', $where);

        while ($registro = mysql_fetch_object($records)) {
            $return = $this->fetchEntity($registro);
            break;
        }

        return $return;
    }

    function post($entity) {
        
        if ($entity->getId() > 0) {
            print_r($entity);
            echo 'UPDATE';
            $this->update($entity);
        } else {
            echo 'INSERT';
            $this->insert($entity);
        }
        
    }

    private function insert($entity) {
        $oMySQL = new HelperMySQL();

        $data = array(//'Id' => $entity->getId(),
            'Nome' => $entity->getNome(),
            'Email' => $entity->getEmail(),
            'Telefone' => $entity->getTelefone(),
            'Estado' => $entity->getEstado(),
            'Cidade' => $entity->getCidade(),
            'Endereco' => $entity->getEndereco(),
            'CPF' => $entity->getCPF(),
            'RG' => $entity->getRG(),
            'NomePai' => $entity->getNomePai(),
            'NomeMae' => $entity->getNomeMae(),
            'Foto' => $entity->getFoto());

        $oMySQL->insert('clientes', $data);
    }

    private function update($entity) {
        $oMySQL = new HelperMySQL();

        $set = array(
            'Nome' => $entity->getNome(),
            'Email' => $entity->getEmail(),
            'Telefone' => $entity->getTelefone(),
            'Estado' => $entity->getEstado(),
            'Cidade' => $entity->getCidade(),
            'Endereco' => $entity->getEndereco(),
            'CPF' => $entity->getCPF(),
            'RG' => $entity->getRG(),
            'NomePai' => $entity->getNomePai(),
            'NomeMae' => $entity->getNomeMae(),
            'Foto' => $entity->getFoto());
        

        $where = array('Id' => $entity->getId());
                

        $oMySQL->update('clientes', $set, $where);
    }

    function delete($id) {
        $oMySQL = new HelperMySQL();
        $where = array('Id' => $id);
        $oMySQL->delete('clientes', $where);
    }

}
