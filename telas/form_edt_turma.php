<?php 

//incluindo arquivo de conexão

include "../config/conexao.php";

//----------------------------

//obtendo e verificando as variaveis

if (isset($_GET['nome'])) {
	$nome = $_GET['nome'];
}

//---------------------------------

//Seleciona a Turma

$sql = $con->prepare("SELECT * FROM turmas WHERE nome = :nome");
$sql->bindValue(":nome",$nome);
$sql->execute();

//-------------------

?>

<!-- Validação do Formulário -->

<script type='text/javascript'>

		function validar(){
			if (add_turma.nome.value =="") {
				alert("Insira o nome!");
				return false;
			};

			if (add_turma.serie.value =="") {
				alert("Insira a Série!");
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
			<h1 align="center" id="titulo">Editar Turma</h1>
			
				<form action="../CRUD/edt_turma.php" method="get" name="add_turma" onsubmit="return validar()">
					
					<table align="center">
						<?php while ($turma = $sql->fetch(PDO::FETCH_ASSOC)) {?>
						<tr>
							<td><strong>Nome:</strong></td>
							<td><input type="text" name="nome" value="<?php echo $turma['nome']; ?>"></td>
						</tr>
						<tr>
							<td><strong>Série:</strong></td>
							<td>
								<select name="serie">
									<option value="<?php echo $turma['serie'];?>"><?php echo $turma['serie']; ?>º Ano</option>
									<option value="1">1º Ano</option>
									<option value="2">2º Ano</option>
									<option value="3">3º Ano</option>
									<option value="4">4º Ano</option>
									<option value="5">5º Ano</option>
									<option value="6">6º Ano</option>
									<option value="7">7º Ano</option>
									<option value="8">8º Ano</option>
									<option value="9">9º Ano</option>
							</select>
						</td>
						</tr>
						<?php } ?>
					</table>
							<nav id="menu">
								<ul>
									<li><input type="image" src="../img/salvar.jpg" id="botao" title="Salvar"></li>
									<li style="margin-left: 15px"><a href="detalhes_turma.php?nome=<?php echo $nome; ?>"><img src="../img/voltar.jpg" id="botao" title="Voltar"></a></li>
								</ul>
							</nav>		
				</form>
				
		</div>

		<div id="bot">
		</div>
	</div>
</body>
</html>