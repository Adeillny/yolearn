<?php

//Conexão:
include_once 'conexao.php';

// Importando o menu da página usando include: -->
include_once 'menu_rodape/cabecalho.php';

//Select com o id que veio da URL:
if(isset($_GET['id'])):
	$id =pg_escape_string($mysqli, $_GET['id']);
	
	$sql="SELECT * FROM usuarios WHERE id =  '$id'";
	$resultado = pg_query($mysqli, $sql);
	$dados = pg_fetch_array($resultado);
endif;
 
 ?>

<!-- Formulário:--> 
<div class="row">
	<div class="col s12 m6 push-m3 ">
	<h3 class="light"> Editar Usuário </h3>
	<form action="atualizar.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
		<div class="input-field col s12">
			<input type="text" name="nome" id="nome" value="<?php echo $dados['nome']; ?>">
			<label for="nome"> Nome</label>
		</div>
	
		<div class="input-field col s12">
			<input type="text" name="sobrenome" id="sobrenome" value="<?php echo $dados['sobrenome']; ?>">
			<label for="sobrenome"> Sobrenome</label>
		</div>
		
		<div class="input-field col s12">
			<input type="text" name="email" id="email" value="<?php echo $dados['email']; ?>" >
			<label for="email"> Email</label>
		</div>
			
		<div class="input-field col s12">
			<input type="text" name="senha" id="senha" value="<?php echo $dados['senha']; ?>">
			<label for="senha"> Senha </label>
		</div>
		<button type="submit" name="btn-editar" class="btn">Atualizar</button>
		<a href="painel.php" type="submit" class="btn pink">Lista de clientes</button>
	</form>
	
	</div>
</div>

<!-- Importando o rodapé da página usando include (em desenvolvimento para melhorar o design da página):--> 
<?php include_once 'menu_rodape/rodape1.php';
?>