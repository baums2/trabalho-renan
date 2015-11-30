<?php 

//incluindo arquivo de conexão

include "../config/conexao.php";

//----------------------------

//obtendo e verificando as variaveis

if (isset($_POST['nome'])) {
	$nome = $_POST['nome'];
}

if (isset($_POST['idade'])) {
	$idade = $_POST['idade'];
}

if (isset($_POST['turma'])) {
	$turma = $_POST['turma'];
}

//--------------------------------

//executar comando sql de inclusão no banco de dados

$sql = $con->prepare("INSERT INTO alunos VALUES (null,:nome,:idade,:turma)"); //null serve para ignorar o primeiro campo da tabela que é o ID(AI)
$sql->bindValue(":nome",$nome);
$sql->bindValue(":idade",$idade);
$sql->bindValue(":turma",$turma);
$sql->execute();

//---------------------------------------------------

//Verificação da inclusão do registro no Bando de dados

if ($sql->rowCount() > 0) {
	echo "<script type='text/javascript'>alert('Cadastrado com Sucesso!!!'); location.href='../telas/form_aluno.php';</script>";
}else{
	echo "<script type='text/javascript'>alert('Aluno já cadastrado!!!'); location.href='../telas/form_aluno.php';</script>";
}

//-----------------------------------------------------

//Encerra Conexão

$con = null;

//---------------
?>