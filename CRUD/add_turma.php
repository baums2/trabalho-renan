<?php 

//incluindo arquivo de conex�o

include "../config/conexao.php";

//----------------------------

//obtendo e verificando as variaveis

if (isset($_POST['nome'])) {
	$nome = $_POST['nome'];
}

if (isset($_POST['serie'])) {
	$serie = $_POST['serie'];
}

//---------------------------------

//executar comando sql de inclus�o no banco de dados

$sql = $con->prepare("INSERT INTO turmas VALUES (null, :nome, :serie)");
$sql->bindValue(":nome",$nome);
$sql->bindValue(":serie",$serie);
$sql->execute();

 if ($sql->rowCount()>0) {
 	echo "<script type='text/javascript'>alert('Cadstrado com Sucesso!!!'); location.href='../telas/form_turma.html';</script>";
 }else{
 	echo "<script type='text/javascript'>alert('Turma j� Cadastrada!!!'); location.href='../telas/form_turma.html';</script>";
 }

//------------------------------------------------

 //Encerra Conex�o

$con = null;

//---------------

?>