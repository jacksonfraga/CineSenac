<?php

class HelperMySQL {

    var $host = "localhost";
    var $user = "root"; # Usuário do MySQL
    var $senha = "usbw"; # Senha do MySQL
    var $dbase = "cinemaSenac"; # Nome do Banco de Dados
    var $connected = false;
    var $connection;

    function connect() {
        $this->connected = false;
        $this->connection = @mysql_connect($this->host, $this->user, $this->senha);
        // Conecta ao Banco de Dados
        if (!$this->connection) {
            // Caso ocorra um erro, exibe uma mensagem com o erro
            throw new Exception("Ocorreu um Erro na conexão MySQL:"
            . "<b>" . mysql_error() . "</b>");
        } elseif (!mysql_select_db($this->dbase, $this->connection)) {
            // Seleciona o banco após a conexão
            // Caso ocorra um erro, exibe uma mensagem com o erro
            throw new Exception("Ocorreu um Erro em selecionar o Banco:"
            . "<b>" . mysql_error() . "</b>");
        } else {
            $this->connected = true;
        }
    }

    function sql_query($query) {
        if (!$this->connected) {
            $this->connect();
        }

        $result = mysql_query($query);

        if ($result) {
            $this->closeConnection();
            return $result;
        } else {
            // Caso ocorra um erro, exibe uma mensagem com o Erro
            $error = mysql_error();
            $this->closeConnection();
            throw new Exception("Ocorreu um erro ao executar a Query MySQL: <b>$query</b>"
            . "<br><br>"
            . "Erro no MySQL: <b>" . $error . "</b>");
        }
    }

    function sql_multi_query($query) {
        if (!$this->connected)
            $this->connect();

        $result = multi_query($query);

        if ($result) {
            $this->closeConnection();
            return $result;
        } else {
            // Caso ocorra um erro, exibe uma mensagem com o Erro
             $error = mysql_error();
            $this->closeConnection();
            throw new Exception("Ocorreu um erro ao executar a Query MySQL: <b>$query</b>"
            . "<br><br>"
            . "Erro no MySQL: <b>" . $error . "</b>");
        }
    }

    function closeConnection() {
        if ($this->connected) {
            $this->connected = false;
            return mysql_close($this->connection);
        }
    }

    public function select($from, $where = '', $orderBy = '', $limit = '', $like = false, $operand = 'AND', $cols = '*') {
        // Catch Exceptions
        if (trim($from) == '') {
            return false;
        }

        $query = "SELECT {$cols} FROM `{$from}` WHERE ";

        if (is_array($where) && $where != '') {
            // Prepare Variables

            foreach ($where as $key => $value) {
                if ($like) {
                    $query .= "`{$key}` LIKE '%{$value}%' {$operand} ";
                } else {
                    $query .= "`{$key}` = '{$value}' {$operand} ";
                }
            }

            $query = substr($query, 0, -(strlen($operand) + 2));
        } else {
            $query = substr($query, 0, -6);
        }

        if ($orderBy != '') {
            $query .= ' ORDER BY ' . $orderBy;
        }

        if ($limit != '') {
            $query .= ' LIMIT ' . $limit;
        }


        return $this->sql_query($query);
    }

    public function update($table, $set, $where) {

// Catch Exceptions
        if (trim($table) == '' || !is_array($set) || !is_array($where)) {
            return false;
        }


        // SET
        $query = "UPDATE `{$table}` SET ";

        $separador = "";
        foreach ($set as $key => $value) {
            $query .= $separador . "`{$key}` = '{$value}' ";
            $separador = ", ";
        }

        // WHERE

        $query .= ' WHERE (1=1) ';

        foreach ($where as $key => $value) {
            $query .= " AND `{$key}` = '{$value}'";
        }

        return $this->sql_query($query);
    }

    public function insert($table, $values) {
// Catch Exceptions
        if (trim($table) == '' || !is_array($values)) {
            return false;
        }


        // SET
        $query = "INSERT INTO `{$table}` (";

        $separador = "";
        foreach ($values as $key => $value) {
            $query .= $separador . "`{$key}`";
            $separador = ", ";
        }

        // WHERE

        $query .= ' ) VALUES (';

        $separador = "";
        foreach ($values as $key => $value) {
            $query .= $separador . "'{$value}'";
            $separador = ", ";
        }

        $query .= ")";

        return $this->sql_query($query);
    }

    public function delete($table, $where) {
        $query = "DELETE FROM `{$table}` WHERE ";
        if (is_array($where) && $where != '') {

            foreach ($where as $key => $value) {
                $query .= "`{$key}` = '{$value}' AND ";
            }

            $query = substr($query, 0, -5);
        }

        return $this->sql_query($query);
    }

}

?>