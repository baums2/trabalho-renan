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

//Procura e Lista as turmas

$sql = $con->prepare("SELECT * FROM turmas ORDER BY nome ASC");
$sql->execute();

//----------------------------------------------------

//Procura o registro do aluno

$sqla = $con->prepare("SELECT * FROM alunos WHERE nome = :nomea");
$sqla->bindValue(":nomea",$nomea);
$sqla->execute();

//---------------------------------------
 ?>

<!-- Validação do formulário -->

	<script type='text/javascript'>
		function validar(){
			if (add_aluno.nomea.value =="") {
				alert("Insira o nome!");
				return false;
			};

			if (add_aluno.idade.value =="") {
				alert("Insira a Idade!");
				return false;
			};

			if (add_aluno.nome.value =="") {
				alert("Insira a Turma!");
				return false;
			};
		}

	</script>

<!-- FIM -->

<!DOCTYPE html>
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
			<h1 align="center" id="titulo">Editar Aluno</h1>
					<form action="../CRUD/edt_aluno.php" method="get" onsubmit="return validar()" name="add_aluno">
						<table align="center">
							<?php $aluno = $sqla->fetch(PDO::FETCH_ASSOC) ?>
							<tr>
								<td><strong>Nome:</strong></td>
								<td><input type="text" name="nomea" value="<?php echo $aluno['nome']; ?>"></td>
							</tr>
							<tr>
								<td><strong>Idade:</strong></td>
								<td><input type="number" name="idade"  value="<?php echo $aluno['idade']; ?>"</td>
							</tr>
							<tr>
							 	
								<td><strong>Turma:</strong></td>
								<td><select name="nome">
									<option value="<?php echo $aluno['turma'];?>"><?php echo $aluno['turma'];?></option>
									?>
									<?php  while ($turmas = $sql->fetch(PDO::FETCH_ASSOC)){?>
									<option value="<?php echo $turmas['nome'] ?>"><?php echo $turmas['nome'];?></option>
									<?php } ?>
								</select></td>
							</tr>
								
						</table>
							<nav id="menu">
								<ul>
									<li><input type="image" src="../img/salvar.jpg" id="botao" title="Salvar"></li>
									<li style="margin-left: 15px"><a href="detalhes_aluno.php?nomea=<?php echo $aluno['nome'];?>&nome=<?php echo $nome; ?>"><img src="../img/voltar.jpg" id="botao" title="Voltar"></a></li>
								</ul>
							</nav>	
				</form>
		</div>

		<div id="bot">
		</div>
	</div>
</body>
</html>