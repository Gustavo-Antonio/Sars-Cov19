<?php


require_once '../Classes/Cadastro.php';
try{
	$cadastro = new Cadastro();
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$data = date('Y-m-d',strtotime($_POST['data']));
	$contaminado = $_POST['contaminado'];
	$vacinado = $_POST['vacinado'];
	$numero = $_POST['numero'];
	$cadastro->setIdPessoa($id);
	$cadastro->setNomePessoa($nome);
	$cadastro->setDataNascimentoPessoa($data);
	$cadastro->setContaminado($contaminado);
	$cadastro->setVacinado($vacinado);
	$cadastro->setMorte($numero);
	echo($cadastro->alterar($cadastro));



}catch(Exception $e){
	echo '<pre>';
	print_r($e);
	echo '</pre';
	echo $e->getMessage();
}

?>



