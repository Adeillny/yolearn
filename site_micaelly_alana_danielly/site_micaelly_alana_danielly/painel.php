<?php
// Iniciar sessão:
if(!isset($_SESSION)) {
    session_start();
}

// Caso a pessoa não esteja logada:
if(!isset($_SESSION['id'])) {
    die("Você não pode acessar esta página porque não está logado.<p><a href=\"login.php\">Fazer login</a></p>");
} 

// Importando o arquivo de conexão com o banco de dados.
include_once("conexao.php")

?>

<?php
// Importando o menu da página usando include: -->
include_once 'menu_rodape/cabecalho.php';
?>

 <!-- Usando o nome da pessoa que logou para ficar mais personalizado: -->
<h3 class="center"> Bem vindo(a), <?php echo $_SESSION['nome']."! Aqui estão os usuários cadastrados:"; ?> </h3>

<p class="center" style="font-size: X-large;">
<!-- Link para deslogar: -->
<a href="logout.php">Sair</a> 
</p>

<!-- Tabela com função de edição, exclusão e cadastro de usuários: -->
<div class="row">
	<div class="col s12 m6 push-m3 ">
	<table class="striped">
		<thead>
			<tr>
				<th>Nome:</th>
				<th>Sobrenome:</th>
				<th>Email:</th>
				<th>Senha:</th>
			</tr>
		</thead>
	
		<tbody>

			<?php
			// Pegando os dados: 
			$sql="SELECT * FROM usuarios";
			$resultado= pg_query($mysqli,$sql);
			
			if (pg_num_rows($resultado)>0):
			
			while($dados =pg_fetch_array($resultado)):	
			?>

			<!-- Mostrando os dados: -->
			<tr>
				<td><?php echo $dados['nome'];?></td>
				<td><?php echo $dados['sobrenome'];?></td>
				<td><?php echo $dados['email'];?></td>
				<td><?php echo $dados['senha'];?></td>
				<!-- Botão de edição: -->
				<td><a href="editar.php?id=<?php echo $dados['id'];?>" class="btn-floating light blue"><i class="material-icons">edit</i></a> </td>

				<!-- Botão de exclusão: -->
				<td><a href="#modal<?php echo $dados['id'];?>" class="btn-floating pink modal-trigger"><i class="material-icons">delete</i></a> </td>
				
				<!-- Caixinha para confirmar a exclusão: -->
				  <div id="modal<?php echo $dados['id'];?>" class="modal">
					<div class="modal-content">
					  <h3>Atenção!</h3>
					  <p>Deseja excluir esse usuário?</p>
					</div>
					<div class="modal-footer">
					  
					  <form action="deletar.php" method="POST">
						<input type="hidden" name="id" value="<?php echo $dados['id'];?>">
						<button type="submit" name="btn-deletar" class="btn pink">Sim, quero deletar</button>
						<a href="#!" class="modal-close waves-effect light blue btn-flat">Cancelar</a>
					  
					  </form>
					  
					</div>
				  </div>
			</tr>
			<?php 
			endwhile; 
			else: ?>
				<tr>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
				</tr>
			<?php
			endif;
			?> 
		</tbody>
	</table>
	
	<br>
	<!-- Botão add usuário: -->
	<a href="addusuario.php" class="btn light blue"> Adicionar usuário</a>
	</div>
</div>	  

<!-- Importando o rodapé da página usando include (em desenvolvimento para melhorar o design da página):--> 
<?php include_once 'menu_rodape/rodape1.php';
    ?>
