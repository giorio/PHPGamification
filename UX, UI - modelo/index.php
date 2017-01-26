<!DOCTYPE html>
<html>
<head>
	<title>TI Gamification</title>
	<link rel="stylesheet" type="text/css" href="estilo_gamification.css">
</head>
<body>
	<div id="pagina_pontuacao">
		<header>
			
		</header>
		<nav>
			<a href="index.php">Rank Geral</a>
			<a href="">Suas medalhas e seus feitos</a>
		</nav>
	</div>
	<div>
		<form>
		<?php
			/*Pega o último id de usário ou faz a contagem de registro e coloca o total na variavel*/
			$user = $_GET[""];
			/*Gera as linhas para nome e pontuação de forma dinamica, ambos os campos não tem permissão de edição*/
			for ($i = 0; $i > $user ; $i++) { 
				print "<input type="text" name="nome$i" readonly><input type="number" name="pontos$i" readonly>"
			}
		?>
		</form>
	</div>
</body>
</html>