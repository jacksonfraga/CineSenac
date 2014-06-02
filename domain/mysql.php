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

	
    function closeConnection(){
    	if ($this->connected)
    	{
	    	$this->connected = false;
	        return mysql_close($this->connection);	
    	}
    	
    }
}
?>