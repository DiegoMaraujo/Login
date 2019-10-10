<!DOCTYPE html>
<html>
<head>
	<title>Revisão de php</title>
	<link rel="stylesheet" type="text/css" href="css/revisao.css">
</head>
<body>
	<div class="topo">
		<div class="data verde">
		
			<script>
				var data  = new Date()
				var dias  = data.getDay()
				var mes   = data.getMonth()
				var ano   = data.getFullYear()
				var meses = new Array(
					'Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'
				)
				var diaSemana = new Array(
					'Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'
				)
				var hoje    = data.getDate()
				var hora    = data.getHours()
				var min     = data.getMinutes()
				var sec     = data.getSeconds()
				var strHora = hora + ":" + min + ":"+ sec
				var strData = diaSemana[dias]+", "+ hoje + " de "+ meses[mes]+ " de " + ano + ", "+ strHora
				document.write(strData)

			</script>
			
		</div>
		<span class="fonte">
			Logomarca
			
		</span>
	</div>
		<div class="centraliza">
			<div class="formulario interna">
				<form class="form" method="POST">
					Nome:<br/>
					<input type="text" name="nome"><br/><br/>
					Email:<br/>
					<input type="text" name="email"><br/><br/>
					Senha: <br/>
					<input type="password" name="senha"><br/><br/>
					<p>
						<a href="forgotpass.html" class="esqueceu">Esqueceu a senha ?</a>

					</p>
					<input type="submit" value="enviar"name="enviar">
				</form>
			</div>			
		</div>
</body>
</html>


<?php
session_start();
require'config.php';
if (isset($_POST['email']) && !empty($_POST['email'])){ 
	 /*aqui eu pego o que o usuario digitou e coloco na variavel $email, usando addslashes que coloca uma barra invertida antes de cada caracter perigoso.*/
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	$senha = md5(addslashes($_POST['senha']));
	
		$db = new PDO($dns, $dbuser,$dbpass);		
		$sql = $db->query("SELECT * FROM usuario WHERE nome = '$nome' AND email = '$email' AND senha = '$senha'");

		//essa query vai na tabela usuarios e localiza o email e senha e confere se sao iguais aos digitados pelo usuario
	

		if($sql->rowCount() > 0) { //se achar um usuario a variavel $dado é carregada com todos os 
			$dado = $sql->fetch();
			$_SESSION['idUsuario']=$dado['idUsuario'];
			$_SESSION['nome']=$dado['nome'];
			
			
			header("location:index.php");
			exit;
		}

} 

?>