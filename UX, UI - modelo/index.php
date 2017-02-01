<!DOCTYPE html>
<html>
<head>
	<title>TI Gamification</title>
        <link rel="stylesheet" type="text/css" href="_css/estilo_gamification.css">
        <meta charset="utf-8">
</head>
<body>
    <div id="menu">
	<header>
            <h1>Gamification</h1>		
	<nav>
            <span id="rank_geral" class="botao"><a href="index.php">Rank Geral</a></span>
            <span id="myAvatar" class="botao"><a href="">Seu Avatar e feitos</a></span>
	</nav>
        </header>
    </div>
    <div id="pagina_pontuacao">
        <table id="rank">
            <tr>
                <th>#</th>
                <th>Participante</th>
                <th>Pontos</th>
                <th>Nível</th>
            </tr>
                
            <?php
                /*Pega o último id de usário ou faz a contagem de registro e coloca o total na variavel*/
                $user = 25;
                /*Gera as linhas para nome e pontuação de forma dinamica, ambos os campos não tem permissão de edição*/
		for ($i = 1; $i <= $user ; $i++) { 
		print "<tr><td><b>$i<b/></td><td>Nome do jogador com link para um perfil</td><td>Pontuação total</td><td>Rank</td></tr>";
		}
            ?>
        </table>
    </div>
    <footer>
        <table id="rodape">
            <tr>
                <td class="lateral"><img src="_imagens/logo_TI.png" id="logo_ti" class="rodape"></td>
                <td class="central"><span class="rodape">Superintendência de Tecnologia da informação e Telecomunicação</span></td>
                <td class="lateral"><img src="_imagens/CEMIG.png" id="logo_cemig" class="rodape"></td>
            </tr>
        </table>
    </footer>
</body>
</html>
