<?php
// Usuário e senha padrões do USBWebserver:
$usuario = 'zqlewxrs';
$senha = 'yARTYmme4tFpKqPdD50pflUcTtiW9hrD'; 

// Nome do banco de dados:
$database = 'zqlewxrs';

// Endereço de onde está o banco de dados que nesse caso está no nosso próprio
// computador (localhost):
$host = 'mouse.db.elephantsql.com';

//Criação da conexão: 
$mysqli = pg_connect($host, $usuario, $senha, $database);

// Caso haja algum erro a conexão irá 'morrer', irá nos mostrar uma mensagem 
// e informar qual foi o erro:
if($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}
?>
