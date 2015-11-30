<?php 

//incluindo arquivo de conexão

include "../config/conexao.php";

//----------------------------

//obtendo e verificando as variaveis

if (isset($_GET['nome'])) {
	$nome = $_GET['nome'];
}

if (isset($_GET['nalunos'])) {
	$nalunos = $_GET['nalunos'];
}
 //---------------------------------

//verifica se a turma está vazia

	if ($nalunos == 0) {

		//Deleta a Turma

		$sql = $con->prepare("DELETE FROM turmas WHERE nome = :nome");
		$sql->bindValue(":nome",$nome);
		$sql->execute();

		echo "	<script type='text/javascript'>alert('Excluida com sucesso!'); location.href='../telas/lista_turmas.php';</script>";

	}else{
		echo "<script type='text/javascript'>alert('Turma não pode ser excluida enquanto tiver Alunos!'); location.href='../telas/detalhes_turma.php?nome=$nome';</script>";
	}


//----------------------------------

$con = null;
 ?>