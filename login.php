<html>
<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<title>Scars-Cov19</title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel='stylesheet' type='text/css' media='screen' href='css/estilo.css'>
	<link rel='stylesheet' type='text/css' media='screen' href='css/login.css'>
	<script src="js/echarts-5.1.2/dist/echarts.js"></script>
	<link rel="shortcut icon" href="img/favicon.ico"/>
</head>
<body>

	<div class="caixa" >
		<div class="a">
			<img src="img/06.png">
			<center><b><i><p style="color: white; max-width: 300px;">Faça Login Para Administrar & Analisar Os Dados Da População</p></i></b></center>
		</div>
		<div class="b">
			<h2>LOGIN</h2><br>
			<form method="post" action="valida.php">
				<input class="inputa" type="text" name="login" placeholder="Login"><br><br>
				<input class="inputa" type="text" name="senha" placeholder="Senha"><br><br>
				<input class="button" type="submit" value="Entrar">
			</form>
		</div>
	</div>
</body>
</html>

</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

<?php
if(isset($_COOKIE['erro'])){
	if($_COOKIE['erro'] == 1){ 
		include("elementos/erro.php");
	}
}
?>
