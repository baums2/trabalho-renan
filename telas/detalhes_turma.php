<?php 

//incluindo arquivo de conexão

include "../config/conexao.php";

//----------------------------

//obtendo e verificando as variaveis

if (isset($_GET['nome'])) {
	$nome = $_GET['nome'];
}
 //---------------------------------

//executando sql de busca no banco usando a vaiavel ID

$sql = $con->prepare("SELECT * FROM turmas WHERE nome = :nome");
$sql->bindValue(":nome", $nome);
$sql->execute();

//----------------------------------------------------


//executando sql de busca no banco usando a vaiavel ID

$sqla = $con->prepare("SELECT * FROM alunos WHERE turma = :nome ORDER BY nome ASC");
$sqla->bindValue(":nome", $nome);
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
				
						<?php $turma  = $sql->fetch(PDO::FETCH_ASSOC); { ?>
							<h1 align="center" >Detalhes da Turma</h1>
							<h3 align="center" >Nome: <?php echo $turma['nome'];?> - Série: <?php echo $turma['serie']."ºAno";?>
							- Nº de Alunos: <?php echo $nalunos; ?>
							</h3>
						<?php } ?>
						<h1 align="center" >Alunos:</h1>
						
						<div id="divlista">
						<table align="center" cellspacing="0" border="solid" width="200px">
	
								<?php while ($aluno = $sqla->fetch(PDO::FETCH_ASSOC)) {?>
							<tr>
								<td align="center"><a href="detalhes_aluno.php?nomea=<?php echo $aluno['nome']; ?>&nome=<?php echo $nome; ?>"><?php echo $aluno['nome'];?></a></td>
							</tr>
								<?php } ?>
						</table>
						
						</div>
						
						<nav id="menu" style="margin-top: 20px;">
								<ul>
									<li style="margin-left: -50px"><a href="../CRUD/del_turma.php?nome=<?php echo $nome; ?>&nalunos=<?php echo $nalunos; ?>"><img src="../img/excluir.jpg" id="botao" title="Excluir turma"></a></li>
									<li><a href="form_edt_turma.php?nome=<?php echo $nome; ?>"><img src="../img/editar.jpg" id="botao" title="Edita turma"></a></li>
									<li><a href="lista_turmas.php"><img src="../img/voltar.jpg" id="botao" title="Voltar"></a></li>
								</ul>
							</nav>
							
						
		</div>

		<div id="bot">
			<strong>*Clique no Aluno para mais detalhes*</strong>
		</div>
	</div>
</body>
</html>