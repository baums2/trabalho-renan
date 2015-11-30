<?php 

include "../config/conexao.php";
$sql = $con->prepare("SELECT * FROM turmas ORDER BY nome ASC");
$sql->execute();
?>

	<script type='text/javascript'>
		function validar(){
			if (add_aluno.nome.value =="") {
				alert("Insira o nome!");
				return false;
			};

			if (add_aluno.idade.value =="") {
				alert("Insira a Idade!");
				return false;
			};

			if (add_aluno.turma.value =="") {
				alert("Insira a Turma!");
				return false;
			};
		}


	</script>

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
			<h1 align="center" id="titulo">Adicionar Aluno</h1>
					<form action="../CRUD/add_aluno.php" method="post" onsubmit="return validar()" name="add_aluno">
						<table align="center">
							<tr>
								<td><strong>Nome:</strong></td>
								<td><input type="text" name="nome"></td>
							</tr>
							<tr>
								<td><strong>Idade:</strong></td>
								<td><input type="number" name="idade"></td>
							</tr>
							<tr>
								
								<td><strong>Turma:</strong></td>
								<td><select name="turma">
									<option value="">Selecionar</option>
									<?php  while ($turmas = $sql->fetch(PDO::FETCH_ASSOC)){?>
									<option value="<?php echo $turmas['nome'] ?>"><?php echo $turmas['nome'];?></option>
									<?php } ?>
								</select></td>
							</tr>
								
						</table>
							<nav id="menu">
								<ul>
									<li><input type="image" src="../img/salvar.jpg" id="botao" title="Salvar"></li>
									<li style="margin-left: 15px"><a href="../index.html"><img src="../img/voltar.jpg" id="botao" title="Voltar"></a></li>
								</ul>
							</nav>	
				</form>
		</div>

		<div id="bot">
		</div>
	</div>
</body>
</html>