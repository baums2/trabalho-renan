<?php 

//incluindo arquivo de conexão

include "../config/conexao.php";

//----------------------------

//obtendo e verificando as variaveis

if (isset($_GET['nomea'])) {
	$nomea = $_GET['nomea'];
}

if (isset($_GET['nome'])) {
	$nome = $_GET['nome'];
}
 //---------------------------------

//executando sql de busca no banco usando a vaiavel ID

$sqla = $con->prepare("SELECT * FROM alunos WHERE nome = :nomea");
$sqla->bindValue(":nomea", $nomea);
$sqla->execute();

$nalunos = $sqla->rowcount();

//----------------------------------------------------

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
							<h1 align="center">Aluno</h1>

							
							<?php $aluno = $sqla->fetch(PDO::FETCH_ASSOC); { ?>
							<h3 align="center"> 
								
								Nome:<?php echo $aluno['nome']; ?> - Idade: <?php echo $aluno['idade']; ?>  - Turma: <?php echo $aluno['turma']; ?>
								
							</h3>
								<?php } ?>

								<nav id="menu" style="margin-top: 20px;">
								<ul>
									<li style="margin-left: -50px"><a href="../CRUD/del_aluno.php?nomea=<?php echo $aluno['nome'];?>&nome=<?php echo $nome; ?>"><img src="../img/excluir.jpg" id="botao" title="Excluir turma"></a></li>
									<li><a href="form_edt_aluno.php?nomea=<?php echo $aluno['nome'];?>&nome=<?php echo $nome; ?>"><img src="../img/editar.jpg" id="botao" title="Edita turma"></a></li>
									<li><a href="detalhes_turma.php?nome=<?php echo $nome; ?>"><img src="../img/voltar.jpg" id="botao" title="Voltar"></a></li>
								</ul>
							</nav>
						</div>
						
							

		<div id="bot">
			<strong>*Clique no Aluno para mais detalhes*</strong>
		</div>
	</div>
</body>
</html>