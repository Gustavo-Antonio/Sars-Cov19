<?php


require_once '../Classes/Cadastro.php';
try{
	$pessoa= new Cadastro();
	$id = $_GET['id'];
	$pessoa->setIdPessoa($id);
	echo($pessoa->excluir($pessoa));


}catch(Exception $e){
	echo '<pre>';
	print_r($e);
	echo '</pre';
	echo $e->getMessage();
}


?>

