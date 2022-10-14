<?php
// Importando o arquivo de conexão ao banco de dados:
include_once('conexao.php');

//Verificação se há uma variável email e uma variável senha:
if(isset($_POST['email']) || isset($_POST['senha'])) {

    // Caso o email for deixado em branco:
     if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail!";

    // Caso a senha for deixada em branco:
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha!";
    }  
    
    // Caso os dois não tenham sido deixados em branco: 
  else {
       // Dados do formulário:
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    // Criptografando a senha para comparar com a do banco de dados:
    $criptografada = md5($senha);

    // Consultando o email e a senha que foram digitados no banco de dados:
    $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$criptografada'";
    
    //Caso haja algum erro a conexão "morre" e uma mensagem é mostrada junto com o erro:
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    // Quantas linhas a consulta retornou: 
    $quantidade = $sql_query->num_rows;

    // Verificando se a quantidade de registros que a consulta retornou 
    // é igual a 1, ou seja, se o email e a senha digitados existem no
    // banco de dados:
    if($quantidade == 1) {
            
        //Dados do usuário:
        $usuario = $sql_query->fetch_assoc();

        //Se não existir sessão, a sessão será inicida:
        if(!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['id'] = $usuario['id']; 
        $_SESSION['nome'] = $usuario['nome'];

        // Página que a pessoa será redirecionada após logar:
        header("Location: painel.php");

        } 
        // Caso a consulta não retorne nenhum registro:
        else {
            echo "<p class= 'center' style='color:red; font-size:large;'> Falha ao logar! Usuário ou senha incorretos.</p>";
        }
   }
}

//Importando o menu da página usando include: 
include_once 'menu_rodape/cabecalho.php';

?>

    <!-- Formulário de login: -->
    <div class="section"></div>
  <main>
    <center>
      <img class="center" style="width: 250px;" img src="img/logo.png" />

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
         
        <!-- Aqui nós colocamos o método post e a action "login.php" que é o nome do nosso arquivo php onde 
        acontece a colheta dos dados e a comparação com o banco de dados, nesse caso aqui mesmo.-->
          <form class="col s12" method="post" action="login.php">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='email' name='email' id='email' />
                <label for='email'>Enter your email</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='senha' id='senha' />
                <label for='senha'>Enter your password</label>
              </div>
            </div>

            <br />
            <center>
              <div class='row'>
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Login</button>
              </div>
            </center>
          </form>
        </div>
      </div>
    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>
  
  <!-- Importando o rodapé da página usando include: --> 
  <?php include_once 'menu_rodape/rodape1.php';
    ?>

