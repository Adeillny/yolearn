<?php
//Iniciar  Sessão:
session_start();

//Conexão:
require_once 'conexao.php';

if(isset($_POST['btn-deletar'])):

	//Deletando os dados:
	$id=pg_escape_string($mysqli,$_POST['id']);
	$sql="DELETE FROM usuarios WHERE  id=$id";
	
	//Se der certo:
	if(pg_query($mysqli,$sql)):
		$_SESSION['mensagem'] = "Excluido com sucesso!";
		header('Location: menu_rodape/sucesso.php');
	//Se der errado:	
	else:
		$_SESSION['mensagem'] = "Erro ao excluir!";
		header('Location: menu_rodape/falha.php');
	endif;
endif;	
?>