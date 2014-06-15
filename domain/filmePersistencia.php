<?php

include("mysql.php");

/**
 * Description of filmePersistencia
 *
 * @author Jackson
 */
class FilmePersistencia {

    function fetchEntity($record)
    {
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
        /*
         * Exemplo:

            $usuario = new Usuario();
            $usuario->setId($record->Id);
            $usuario->setEmail($record->Email);
            $usuario->setNome($record->Nome);
            $usuario->setDataCriacao($record->DataCriacao);
            return $usuario;

         *
         */
    }


    function getAll()
    {
        $mysql = new HelperMySQL;

        $return = array();

        $mysql->sql_query("SET NAMES 'utf8'");
        $records = $mysql->sql_query("SELECT * FROM filmes ");


        while($row = mysql_fetch_object($records)){
            $return[] = $this->fetchEntity($row);
        }

        return $return;
    }

    function getById($id)
    {
        $mysql = new HelperMySQL;


        $records = $mysql->sql_query("SELECT * FROM filmes WHERE Id = $id ");

        while($record = mysql_fetch_object($records)){
            return $this->fetchEntity($record);
        }
    }

    function insert($entity)
    {

    }

    function update($entity)
    {

    }

    function delete($id)
    {

    }

}

?>