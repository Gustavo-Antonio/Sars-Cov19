<?php 

require_once('Conexao.php');
class Cadastro{

	private $idPessoa;
	private $nomePessoa;
	private $dataNascimentoPessoa;
	private $contaminado;
	private $vacinado;
	private $morte;


	public function setIdPessoa($idPessoa){
		$this->idPessoa = $idPessoa;
		return $this;
	}
	public function getIdPessoa(){
		return $this->idPessoa;
	}
	public function setNomePessoa($nomePessoa){
		$this->nomePessoa = $nomePessoa;
		return $this;
	}
	public function getNomePessoa(){
		return $this->nomePessoa;
	}
	public function getDataNascimentoPessoa(){
		return $this->dataNascimentoPessoa;
	}
	public function setDataNascimentoPessoa($dataNascimentoPessoa){
		$this->dataNascimentoPessoa = $dataNascimentoPessoa;
		return $this;
	}
	public function getContaminado(){
		return $this->contaminado;
	}
	public function setContaminado($contaminado){
		$this->contaminado = $contaminado;
		return $this;
	}
	public function getVacinado(){
		return $this->vacinado;
	}
	public function setVacinado($vacinado){
		$this->vacinado = $vacinado;
		return $this;
	}
	public function getMorte(){
		return $this->morte;
	}
	public function setMorte($morte){
		$this->morte = $morte;
		return $this;
	}
	
	public function cadastrar($Pessoa){
		$conexao= Conexao::pegarConexao();
		$stmt =$conexao->prepare("INSERT INTO tbpessoa(nomePessoa,dataNascimento,contaminadoPessoa,vacinadoPessoa,perdaPessoa)
			VALUES(?,?,?,?,?)");


		$stmt->bindParam(1,$Pessoa->getNomePessoa());
		$stmt->bindParam(2,$Pessoa->getDataNascimentoPessoa());
		$stmt->bindParam(3,$Pessoa->getContaminado());
		$stmt->bindParam(4,$Pessoa->getVacinado());
		$stmt->bindParam(5,$Pessoa->getMorte());
		$stmt->execute();
		return 'cadastro realizado com sucesso';
	}
	public function excluir($Pessoa){
		$conexao= Conexao::pegarConexao();
		$id= $Pessoa->getIdPessoa();
		$stmt =$conexao->prepare("DELETE FROM tbpessoa WHERE idPessoa LIKE '$id'");
		$stmt->execute();
	}
	public function alterar($Pessoa){
		$conexao= Conexao::pegarConexao();
		$id= $Pessoa->getIdPessoa();
		$nome = $Pessoa->getNomePessoa();
		$data = $Pessoa->getDataNascimentoPessoa();
		$contaminado = $Pessoa->getContaminado();
		$vacinado = $Pessoa->getVacinado();
		$perda = $Pessoa->getMorte();
		$stmt =$conexao->prepare("UPDATE tbpessoa SET nomePessoa='$nome',dataNascimento='$data',contaminadoPessoa='$contaminado',vacinadoPessoa='$vacinado',perdaPessoa='$perda' WHERE idPessoa LIKE '$id'");
		$stmt->execute();
	}
	public function count(){
		$conexao = Conexao::pegarConexao();
		$querySelect = "SELECT COUNT(idPessoa) FROM tbpessoa WHERE contaminadoPessoa LIKE 'Sim'";
		$resultado = $conexao->query($querySelect);
		$lista = $resultado->fetch();
		return $lista;
	}
	public function countId(){
		$conexao = Conexao::pegarConexao();
		$querySelect = "SELECT COUNT(idPessoa) FROM tbpessoa WHERE vacinadoPessoa LIKE'Não'";
		$resultado = $conexao->query($querySelect);
		$lista = $resultado->fetch();
		return $lista;
	}
	public function countVacinado1(){
		$conexao = Conexao::pegarConexao();
		$querySelect = "SELECT COUNT(idPessoa) FROM tbpessoa WHERE vacinadoPessoa LIKE'Apenas A Primeira Dose'";
		$resultado = $conexao->query($querySelect);
		$lista = $resultado->fetch();
		return $lista;
	}
	public function countVacinado2(){
		$conexao = Conexao::pegarConexao();
		$querySelect = "SELECT COUNT(idPessoa) FROM tbpessoa WHERE vacinadoPessoa LIKE'As Duas Doses'";
		$resultado = $conexao->query($querySelect);
		$lista = $resultado->fetch();
		return $lista;
	}
	public function countMortos(){
		$conexao = Conexao::pegarConexao();
		$querySelect = "SELECT SUM(perdaPessoa) FROM tbpessoa";
		$resultado = $conexao->query($querySelect);
		$lista = $resultado->fetch();
		return $lista;
	}
	public function listar(){
		$conexao = Conexao::pegarConexao();
		$querySelect = "SELECT idPessoa,nomePessoa,dataNascimento,contaminadoPessoa,vacinadoPessoa,perdaPessoa FROM tbpessoa";
		$resultado = $conexao->query($querySelect);
		$lista = $resultado->fetchAll();
		return $lista;
	}
}
?>