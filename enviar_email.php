<?php
$email=$_POST['email'];
$assunto=$_POST['assunto'];
$mensagem= $_POST['mensagem'];
$assunto_codificado = sprintf('=?%s?%s?%s?=', 'UTF-8', 'Q', quoted_printable_encode($assunto));

include('PHPMailer/PHPMailerAutoload.php');
$mailer = new PHPMailer;

$mailer->IsSMTP();
$mailer->Host='smtp.gmail.com';
$mailer->Charset = 'UTF-8';
$mailer->SMTPAuth = true;

$mailer->Username='pimentajjoao@gmail.com';
$mailer->Password='lugarmelhor12';
$mailer->SMTPSecure = 'ssl';
$mailer->Port = 465;

$mailer->setFrom('pimentajjoao@gmail.com', 'Site Sars-Cov19');
$mailer->SingleTo = true;

$mailer->addAddress("$email");
$mailer->Subject = $assunto_codificado;
$mailer->Body =$mensagem;

if(!$mailer->Send()){
	echo "Erro Ao Enviar Email: ".$mailer->ErrorInfo;
}
else{
	$url='index.php';
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
	exit();
}
?>