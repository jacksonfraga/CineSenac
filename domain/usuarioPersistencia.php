<?php
include("mysql.php");

class UsuarioPersistencia {
	
	function validarLogin($usuario)
	{	
		$email = $usuario->getEmail();
		$strMD5 = md5("jacksonf" . $usuario->getSenha() . "user" . $email);


		$mysql = new HelperMySQL;
		
		$usuarios = $mysql->sql_query("select * from usuarios where email = '$email' and senha = '$strMD5' ");	

		
		while($registro = mysql_fetch_object($usuarios)){			
			return $usuario->getEmail() == $registro->Email;	
		}
		
		//return $usuario->getEmail() == "admin@admin" and $usuario->getSenha() == "123";		
	}


	function getByEmail($email)
	{
		$mysql = new HelperMySQL;
		
		$usuarios = $mysql->sql_query("SELECT * FROM usuarios WHERE Email = '{$email}'");	

		
		while($registro = mysql_fetch_object($usuarios)){
			$usuario = new Usuario();
			$usuario->setId($registro->Id);
			$usuario->setEmail($registro->Email);
			$usuario->setNome($registro->Nome);
			$usuario->setDataCriacao($registro->DataCriacao);
			return $usuario;	
		}		
	}

	function getAll()
	{
		$mysql = new HelperMySQL;
		$return = array();
		$usuarios = $mysql->sql_query("SELECT * FROM usuarios ");

		
		while($registro = mysql_fetch_object($usuarios)){
			$usuario = new Usuario();
			$usuario->setId($registro->Id);
			$usuario->setEmail($registro->Email);
			$usuario->setNome($registro->Nome);
			$usuario->setDataCriacao($registro->DataCriacao);
			$return[] = $usuario;
		}

		return $return;
	}

	
	function insert($usuario)
	{
		
	}

	function delete($id)
	{
				
	}

	function update($usuario)
	{
		
		$mysql = new HelperMySQL;
		
		$id = $usuario->getId();
		$nome = $usuario->getNome();

		$senha = $usuario->getSenha();
		if ($senha != "")
		{
			$strMD5 = md5("jacksonf" . $senha . "user" . $usuario->getEmail());
			$mysql->sql_query("UPDATE usuarios SET Nome = '$nome', Senha = '$strMD5' WHERE Id = $id ");
		} else {
			$mysql->sql_query("UPDATE usuarios SET Nome = '$nome' WHERE Id = $id ");
		}
		
	}
}

?>