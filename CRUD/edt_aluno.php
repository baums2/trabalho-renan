<?php 

//incluindo arquivo de conexão

include "../config/conexao.php";

//----------------------------

//obtendo e verificando as variaveis

if (isset($_GET['nomea'])) {
	$nomea = $_GET['nomea'];
}

if (isset($_GET['idade'])) {
	$idade = $_GET['idade'];
}

if (isset($_GET['nome'])) {
	$nome = $_GET['nome'];
}

//---------------------------------

//Edita a Turma

$sql = $con->prepare("UPDATE alunos SET nome = :nomea, idade = :idade, turma = :nome");
$sql->bindValue(":nomea",$nomea);
$sql->bindValue(":idade",$idade);
$sql->bindValue(":nome",$nome);
$sql->execute();

//-------------------

echo "	<script type='text/javascript'>alert('Editado com sucesso!'); location.href='../telas/detalhes_aluno.php?nomea=$nomea&nome=$nome';</script>";

$con = null;
?>