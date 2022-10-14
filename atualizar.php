<?php
//Iniciar  Sessão:
session_start();

//Conexão:
require_once 'conexao.php';

// Dados a serem editados:
if(isset($_POST['btn-editar'])):
	$nome=pg_escape_string($mysqli,$_POST['nome']);
	$sobrenome=pg_escape_string($mysqli,$_POST['sobrenome']);
	$email=pg_escape_string($mysqli,$_POST['email']);
	$senha=pg_escape_string($mysqli,$_POST['senha']);
	$id=pg_escape_string($mysqli,$_POST['id']);
	
	// Update dos dados:
	$sql="UPDATE usuarios SET nome='$nome', sobrenome='$sobrenome', email='$email', senha =$senha WHERE  id=$id";
	echo $sql;

	//Se der certo:
	if(pg_query($mysqli,$sql)):
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: menu_rodape/sucesso.php');

	//Se der errado:	
	else:
		$_SESSION['mensagem'] = "Erro ao atualizar!";
		header('Location: menu_rodape/falha.php');
	endif;
endif;	



?>