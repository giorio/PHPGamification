<!DOCTYPE html>
<html>
<head>
	<title>TI Gamification</title>
        <link rel="stylesheet" type="text/css" href="_css/estilo_gamification.css">
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
            <table>
                <tr>
                    <th>#</th>
                    <th>Participante</th>
                    <th>Pontos</th>
                    <th>Nível</th>
                </tr>
                
		<?php
			/*Pega o último id de usário ou faz a contagem de registro e coloca o total na variavel*/
			$user = 10;
			/*Gera as linhas para nome e pontuação de forma dinamica, ambos os campos não tem permissão de edição*/
			for ($i = 0; $i < $user ; $i++) { 
				print "<tr><td><b>$i<b/></td><td>Nome do jogador com link para um perfil</td><td>Pontuação total</td><td>Rank</td></tr>";
			}
		?>
            </table>
	</div>
</body>
</html>
