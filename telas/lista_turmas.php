<?php 
//incluindo arquivo de conexão

include "../config/conexao.php";

//----------------------------

//Executa pesquisa das turmas no banco de dados

$sql = $con->prepare("SELECT * FROM turmas ORDER BY nome ASC");
$sql->execute();

//-------------------------------------------

//Encerra Conexão

$con = null

//---------------
 ?>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
	<div id="fundo">
		<div id="top">
			<table align="center">
				<tr>
					<td><img src="../img/logo.jpg" id="logo"></td>
					<td><h1>Gerenciador Escolar</h1></td>
				</tr>
			</table>
		</div>

		<div id="mid">
			<h1 align="center" id="titulo">Lista de Turmas</h1>
			<div id="divlista">
			<table align="center" cellspacing="0" border="solid" width="200px">
					
				<tr>
					<?php while ($turmas = $sql->fetch(PDO::FETCH_ASSOC)) { ?>   <!-- busca no banco e bota os resultados em uma array -->
					<td align="center"><a href="detalhes_turma.php?nome=<?php echo $turmas['nome'] ?>"><?php echo $turmas['nome'];?></a></td> <!--Ao clicar no Link manda o id da turma como parâmetro / imprime o campo da array indicado na variavel turma -->
				</tr>
				<?php } ?>
			</table>
			</div>
				<nav id="menu" style="margin-left: -60px;">
								<ul>
									<li><a href="../index.html"><img src="../img/voltar.jpg" id="botao" title="Voltar"></a></li>
								</ul>
							</nav>
		</div>

		<div id="bot">
			<strong>*Clique na Turma para mais detalhes*</strong>
		</div>
	</div>
</body>
</html>