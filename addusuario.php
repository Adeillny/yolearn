<?php // Importando o menu da página usando include: 
include_once 'menu_rodape/cabecalho.php';

?>

<!-- Formulário: -->
<div class="row">
	<!--https://materializecss.com/grid.html-->
	<div class="col s12 m6 push-m3 ">
	<h3 class="light"> Novo Usuário </h3>
	<form action="create.php" method="POST">
		<div class="input-field col s12">
			<input type="text" name="nome" id="nome">
			<label for="nome"> Nome</label>
		</div>
	
		<div class="input-field col s12">
			<input type="text" name="sobrenome" id="sobrenome">
			<label for="sobrenome"> Sobrenome</label>
		</div>
		
		<div class="input-field col s12">
			<input type="text" name="email" id="email" >
			<label for="email"> Email</label>
		</div>
			
		<div class="input-field col s12">
			<input type="text" name="senha" id="senha">
			<label for="senha"> Senha</label>
		</div>
		<button type="submit" name="btn-cadastrar" class="btn">Cadastrar</button>
		<a href="painel.php" type="submit" class="btn pink">Lista de clientes</a>
	</form>
	
	</div>
</div>