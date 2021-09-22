<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

</body>
</html>
<?php
	$login = $_POST['login'];
	$senha = $_POST['senha'];

	if(($login == 'adm') && ($senha == '123')){
		session_start();
		$_SESSION['login-session'] = $login;
		$_SESSION['senha-session'] = $senha;
		header("Location: area-restrita/index-restrito.php");
	}
	else{	
		 setcookie('erro', 1, time()+1);
		header("Location: login.php");	
	}
?>