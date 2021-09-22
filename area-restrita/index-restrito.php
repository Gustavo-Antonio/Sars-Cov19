<?php 
include_once('sentinela.php');
try{
	require_once('../Classes/Cadastro.php');
	$cadastro = new Cadastro();
	
}
catch(PDOException $e){
	echo "Erro: ".$e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<title>Sars-Cov19</title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel='stylesheet' type='text/css' media='screen' href='../css/estilo.css'>
	<script src="js/echarts-5.1.2/dist/echarts.js"></script>
	<link rel="shortcut icon" href="../img/favicon.ico"/>
</head>
<body>
	<header>
		<div class="wrapper">
			<div class="logo">
				<center>
					<a href="../logout.php">Home</a>
				</center>
			</div>
			<nav>
				<a href="#dados">Dados</a>
				<a href="#cadastro">Cadastros</a>
				<a href="#pdf">PDF</a>
				<a href="../logout.php">Sair</a>
	
			</nav>
		</div>
	</header>
	<section id="home">
		<div class="plano0">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
						<center>
							<h2 style="color: #000">Bem Vindo</h2>
							<p style="max-width: 50%;">Nessa Página Você Poderá Analisar,Cadastrar,Alterar E Deletar Dados Sobre AS Vítimas Do Novo Corana Vírus, Além De Poder Exportar As Informações Para Um PDF.</p>
							<hr class="linha">
						</center>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="dados">
		<div class="plano1">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 ">
						<center>
							<h2 style="color: #000">Cadaste</h2>
							<p style="max-width: 75%;">Aqui você cadastrar os dados do usuário do site, castrando, seu nome, idade, se já foi vacinado e/ou contaminado e se já perdeu entes queridos</p>
						</center>
					</div>
					<div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 ">
						<form>
							<center>
								<br>
								<h3 style="color: #000">Dados</h3>
								<input style="width: 50%;" type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?php echo @$_GET['nomePessoa'];?>">
								<br>
								<input  style="width: 50%;" placeholder="Data De Nascimento" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="data" name="data" value="<?php echo @$_GET['dataNascimento'];?>" /><br>
								<select style="width: 50%;" name="contaminado" id="contaminado" class="form-select">
									<option value="<?php echo @$_GET['contaminadoPessoa'];?>">Já Foi Contamiado Pelo Vírus Sars-Cov-19</option>
									<option value="Sim">Sim</option>
									<option value="Não">Não</option>
								</select><br>
								<select style="width: 50%;" name="vacinado" id="vacinado" class="form-select">
									<option value="<?php echo @$_GET['vacinadoPessoa'];?>">Já Foi Vacinado Contra O Vírus Sars-Cov-19</option>
									<option value="Apenas A Primeira Dose">Sim, apenas primeira Dose</option>
									<option value="As Duas Doses">Sim, as duas Doses</option>
									<option value="Não Vacinado">Não</option>
								</select><br>
								<input style="width: 50%;" type="text" class="form-control" id="numero" name="numero" placeholder="Quantas Entes Queridos Você Já Perdeu Em Decorrência Do Sars-Cov19"value="<?php echo @$_GET['perdaPessoa'];?>" >
								<input type="hidden" name="txtPegaId" id="txtPegaId" value="<?php echo @$_GET['idPessoa'];?>"/>
								<br>
								<input  class="button" type="submit" name="salvar" id="salvar" value="Enviar">
								<input  class="button" type="reset" name="cancelar" id="cancelar" value="Apagar"><br><br>
								<div class="msg" style="display: none;"><p class="msgajax"></p></div>
							</center>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="cadastro">
		<div class="plano0">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
						<center>
							<h2 style="color: #000">CADASTROS</h2>
							<p style="max-width: 75%;">Aqui você pode visualizar todos os usuários cadastrados, pode exlcuir os dados de algum em especial ou até mesmo alteralos, tanto para fins de equivoco quanto para fins de atualização</p>
						</center>
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
						<center>		
							<table class="table">
								<thead>
									<tr >
										<th scope="col">Nome</th>
										<th scope="col">Data De Nascimento</th>
										<th scope="col">Contamidado</th>
										<th scope="col">Vacinado</th>
										<th scope="col">Perda</th>
										<th scope="col">Excluir</th>
										<th scope="col">Alterar</th>
									</tr>
								</thead>
								<?php
								
								try{
									$listaPessoa = $cadastro->listar();
									foreach ($listaPessoa as $linha) { 
										echo "<tr>";
										echo "<td><p>". $linha['nomePessoa']."</p></td>";
										echo "<td><p>". $linha['dataNascimento']. "</p></td>";
										echo "<td><p>". $linha['contaminadoPessoa']. "</p></td>";
										echo "<td><p>". $linha['vacinadoPessoa']. "</p></td>";
										echo "<td><p>". $linha['perdaPessoa']. "</p></td>";
										echo "<td><a href='javascript:void(0)' class='excluir' id='$linha[idPessoa]'>";
										echo "Excluir";
										echo "</a></td>";
										echo "<td><a href=?idPessoa={$linha['idPessoa']}&dataNascimento={$linha['dataNascimento']}&perdaPessoa={$linha['perdaPessoa']}&nomePessoa={$linha['nomePessoa']}&contaminadoPessoa={$linha['contaminadoPessoa']}&vacinadoPessoa={$linha['vacinadoPessoa']}>";
										echo "Alterar";
										echo "</a></td>";
									}
								}	
								catch(PDOException $e){
									echo "Erro: ". $e ->getMessage();
								}
								?>
							</table>
						</center>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="pdf">
		<div class="plano1">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 ">
						<center>
							<img class="img22" src="../img/3675555-removebg-preview.png">
						</center>
					</div>
					<div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 ">
						<center>
							<h2>Informação</h2>
							<i><p>Baixe um pdf contendo as informações cadastradas no banco de dados para ter uma portablidade e acesso mais fácil e rápido</p></i>
							<hr class="linha">
							<a href="pdf.php"><button class="button">Baixar pdf</button></a><br>
							
						</center>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
</section>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
	jQuery('#salvar').click(function(){
		var idorigal = jQuery('#txtPegaId').val();
		
		var dadosajax = {
			'id': jQuery('#txtPegaId').val(),
			'nome':jQuery('#nome').val(),
			'data':jQuery('#data').val(),
			'contaminado':jQuery('#contaminado').val(),
			'vacinado':jQuery('#vacinado').val(),
			'numero':jQuery('#numero').val(),
		};
		if(idorigal>0){
			pegarUrl = 'valAlterar.php';
			jQuery.ajax({
				url:pegarUrl,
				data:dadosajax,
				type:'POST',
				success:function(html){
					jQuery('.msg').show();
					jQuery('.msgajax').html("Dados alterados com sucesso");
					jQuery('html body').animate({scrollTop:0},500);
					jQuery('.msg').fadeOut(3000);
					setTimeout(function(){
						location.href="index-restrito.php";
					},3000);
				}

			});
		}else{
			pegarUrl = 'val.php';
			jQuery.ajax({
				url:pegarUrl,
				data:dadosajax,
				type:'POST',
				success:function(html){
					jQuery('.msg').show();
					jQuery('.msgajax').html("Dados inseridos com sucesso");
					jQuery('html body').animate({scrollTop:0},500);
					jQuery('.msg').fadeOut(3000);
					setTimeout(function(){
						location.href="index-restrito.php";
					},3000);
				}

			});

		}

	});


	jQuery('.excluir').click(function(){
		var elemento = $(this);
		var id = elemento.attr("id");
		var info = 'id='+id;

		if(confirm("Deseja Realmente Excluir ?")){
			$.ajax({
				type:"GET",
				url:"valExcluir.php?id="+id,
				data:info,
				success:function(){
					jQuery('.msg').show();
					jQuery('.msgajax').html("Dados excluidos com sucesso");
					jQuery('html body').animate({scrollTop:0},500);
					jQuery('.msg').fadeOut(3000);
					setTimeout(function(){
						window.location.reload(1);
					},3000);
				}
			})
		}
	});


	jQuery('#cancelar').click(function(){
		location.href="index-restrito.php"
	});



	jQuery('form').on('submit',function(e){
		e.preventDefault();
	});
</script>