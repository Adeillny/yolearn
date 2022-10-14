<?php
//Iniciar sessão: 
if(!isset($_SESSION)) {
    session_start();
}

// Arquivo de conexão com o banco de dados:
include_once("conexao.php");

// Pegando os dados digitados no formulário e utilizando sanitização:
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = $_POST['senha'];

//Validação do email:
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$errors[] = "E-mail inválido.";
}

// Criptografando a senha:
$criptografada = md5($senha);

// Inserindo os dados na tabela:
$result_usuario = "INSERT INTO usuarios (nome, sobrenome, email, senha) VALUES ('$nome','$sobrenome', '$email','$criptografada')";
$resultado_usuario = pg_query($mysqli, $result_usuario);

// Caso os dados tenham sido salvos com sucesso:
if(mysqli_insert_id($mysqli)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso.</p>";
	header("Location: aluno.php");
}
// Caso não tenham sido salvos com sucesso:
else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso.</p>";
	header("Location: aluno.php");
}