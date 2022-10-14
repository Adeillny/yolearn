<?php 
//Iniciar sessão:
if(!isset($_SESSION)) {
  session_start();
}

// Importando o menu da página usando include: -->
include_once 'menu_rodape/cabecalho.php';
      
// Imprimindo a mensagem em relação ao salvamento dos dados no banco de dados:
if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}
?> 
      
    <h1 class="center">Seja um aluno!</h1>

    </br>
    </br>
    </br>
    
	<!-- Formulário: -->
	
	<div class= "container">
	
	 <div class="row">

    <!-- Aqui nós colocamos o método post e a action "processa.php" que é o nome do nosso arquivo php onde 
    acontece a colheta dos dados e a inserção no banco de dados.-->
    <form class="col s12" method="post" action="processa.php">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Nome" id="first_name" type="text" class="validate" name="nome">
          <label for="first_name">Nome</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate" name="sobrenome">
          <label for="last_name">Sobrenome</label>
        </div>
      </div>
	  
	  <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" name="email">
          <label for="email">E-mail</label>
        </div>
      </div>
	  
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" name="senha">
          <label for="password">Senha</label>
        </div>
      </div>
	  
      <div class= "botao">
	     <button class="btn waves-effect waves-light, right" type="submit" name="action">Enviar
            <i class="material-icons right">send</i>
         </button>
	  </div>
  </form>
  </div>
  </div>
 
  
  <!-- Importando o rodapé da página usando include: --> 
  <?php include_once 'menu_rodape/rodape1.php';
    ?>
  