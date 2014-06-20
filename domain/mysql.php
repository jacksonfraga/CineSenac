<?php


class HelperMySQL {

    var $host = "localhost";
    var $user = "root"; # Usuário do MySQL
    var $senha = "usbw"; # Senha do MySQL
    var $dbase = "cinemaSenac"; # Nome do Banco de Dados


    var $connected = false;
    var $connection;
        
    function connect(){
    	$this->connected = false;
        $this->connection = @mysql_connect($this->host,$this->user,$this->senha);
		// Conecta ao Banco de Dados
        if(!$this->connection){
			// Caso ocorra um erro, exibe uma mensagem com o erro
            print "Ocorreu um Erro na conexão MySQL:";
			print "<b>".mysql_error()."</b>";
			die();
        }elseif(!mysql_select_db($this->dbase,$this->connection)){
			// Seleciona o banco após a conexão
			// Caso ocorra um erro, exibe uma mensagem com o erro
            print "Ocorreu um Erro em selecionar o Banco:";
			print "<b>".mysql_error()."</b>";
			die();
        } else {
        	$connected = true;
        }
    }


	
    function sql_query($query){
    	if (!$this->connected)
        	$this->connect();        

    	$result;
		// Conecta e faz a query no MySQL
        if($this->result = mysql_query($query)){
            $this->closeConnection();
            return $this->result;
        }else{
			// Caso ocorra um erro, exibe uma mensagem com o Erro
            print "Ocorreu um erro ao executar a Query MySQL: <b>$query</b>";
			print "<br><br>";
			print "Erro no MySQL: <b>".mysql_error()."</b>";
			die();
            $this->closeConnection();
        }        
    }
    
    function sql_multi_query($query){
    	if (!$this->connected)
        	$this->connect();        

    	$result;
		// Conecta e faz a query no MySQL
        if($this->result = multi_query($query)){
            $this->closeConnection();
            return $this->result;
        }else{
			// Caso ocorra um erro, exibe uma mensagem com o Erro
            print "Ocorreu um erro ao executar a Query MySQL: <b>$query</b>";
			print "<br><br>";
			print "Erro no MySQL: <b>".mysql_error()."</b>";
			die();
            $this->closeConnection();
        }        
    }

	
    function closeConnection(){
    	if ($this->connected)
    	{
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

        echo $query;
        return $this->sql_query($query);
        
    }
    
    public function insert($table, $values)
    {
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
        

        echo $query;
        return $this->sql_query($query);
    }
    
    public function delete($table, $where)
    {
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