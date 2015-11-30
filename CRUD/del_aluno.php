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

//Deleta a Turma

	$sql = $con->prepare("DELETE FROM alunos WHERE nome = :nomea");
	$sql->bindValue(":nomea",$nomea);
	$sql->execute();
		echo "	<script type='text/javascript'>alert('Excluida com sucesso!'); location.href='../telas/detalhes_turma.php?nome=$nome';</script>";

//----------------------------------

$con = null;
 ?>