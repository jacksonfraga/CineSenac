<?php

class Usuario {
	
	private $id, $email, $senha, $nome, $dataCriacao;

	public function setId($value)
	{
		$this->id = $value;
	}
	public function getId()
	{
		return $this->id;
	}
	public function setEmail($value)
	{
		$this->email = $value;
	}
	public function getEmail()
	{
		return $this->email;
	}
	public function setSenha($value)
	{
		$this->senha = $value;
	}
	public function getSenha()
	{
		return $this->senha;
	}
	public function setNome($value)
	{
		$this->nome = $value;
	}
	public function getNome()
	{
		return $this->nome;
	}
	public function setDataCriacao($value)
	{
		$this->dataCriacao = $value;
	}
	public function getDataCriacao()
	{
		return $this->dataCriacao;
	}
}

?>