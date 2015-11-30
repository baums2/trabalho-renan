<?php 

//incluindo arquivo de conexão

include "../config/conexao.php";

//----------------------------

//obtendo e verificando as variaveis

if (isset($_GET['nome'])) {
	$nome = $_GET['nome'];
}

if (isset($_GET['serie'])) {
	$serie = $_GET['serie'];
}

//---------------------------------

//Edita a Turma

$sql = $con->prepare("UPDATE turmas SET nome = :nome, serie = :serie");
$sql->bindValue(":nome",$nome);
$sql->bindValue(":serie",$serie);
$sql->execute();

//-------------------

echo "	<script type='text/javascript'>alert('Editado com sucesso!'); location.href='../telas/lista_turmas.php';</script>";

$con = null;
?>