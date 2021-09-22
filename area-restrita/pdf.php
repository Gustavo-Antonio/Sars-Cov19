<?php	

include_once('../Classes/Conexao.php');
include_once('../Classes/Cadastro.php');
$cadastro = new Cadastro();
$listaPessoa = $cadastro->listar();
$cor = "";
$count=1;
$html = "";
$titulo="";
$titulo.= "<center><h2>Relatório Covid-19</h2></center><br>";
foreach ($listaPessoa as $linha) { 
	if($count%2==0){
		$cor = "style='background-color: #F9AB38'>";
	}
	else{
		$cor = "style='background-color:  #87E6A6'>";
	}
	$html.= "<tr " .$cor." >";
	$html.= "<td><p>". $linha['nomePessoa']."</p></td>";
	$html.=  "<td><p>". $linha['dataNascimento']. "</p></td>";
	$html.=  "<td><p>". $linha['contaminadoPessoa']. "</p></td>";
	$html.=  "<td><p>". $linha['vacinadoPessoa']. "</p></td>";
	$html.=  "<td><p>". $linha['perdaPessoa']. "</p></td>";
	$count=$count+1;
}

$html .= '<style>
table {
	font-family: arial, sans-serif;
	border-collapse: collapse;
	width: 100%;
}

td, th {
	border: 1px solid #dddddd;
	text-align: left;
	padding: 8px;
}
h2{
	padding-top: 8%;
	font-size: 70px;
	text-transform: uppercase;
	color: #000;
}

</style>
';


	//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

	// include autoloader
require_once("../dompdf/autoload.inc.php");

	//Criando a Instancia
$dompdf = new DOMPDF();

	// Carrega seu HTML
$dompdf->load_html($titulo."<table class='table'>
	<thead>
	<tr>
	<th scope='col' style='background-color: #E67670'>Nome</th>
	<th scope='col' style='background-color: #E67670'>Data De Nascimento</th>
	<th scope='col' style='background-color: #E67670'>Contamidado</th>
	<th scope='col' style='background-color: #E67670'>Vacinado</th>
	<th scope='col' style='background-color: #E67670'>Perda</th>
	</tr>
	</thead>
	".$html."");


$dompdf->setPaper('A4', 'landscape');

	//Renderizar o html
$dompdf->render();


	//Exibibir a página
$dompdf->stream(
	"Relatório Covid-19.pdf", 
	array(
			"Attachment" => true //Para realizar o download somente alterar para true
		)
);
?>