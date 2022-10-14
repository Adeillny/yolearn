<?php

// Iniciar sessão:
if(!isset($_SESSION)) {
    session_start();
} 

// "Destruir" sessão:
session_destroy();

// Redirecionando o usuário para a página de login:
header("Location: login.php");

?>