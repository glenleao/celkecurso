<?php
 session_start();
 ?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Cadastrar mensagem</title>
  </head>
  <body>
    <div class="container py-5">
    <h1>Cadastrar mensagem</h1>
    <?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
    ?>
    <form method="POST" action="proc_cad_msg.php">
      <label>Nome:</label>
      <input type="text" name="nome" placeholder="Inserir seu  nome"><br><br>
      <label>Email:</label>
      <input type="email" name="email" placeholder="Inserir seu  email"><br><br>
      <label>Assunto:</label>
      <input type="text" name="assunto" placeholder="Assunto da mensagem"><br><br>
      <label>Mensagem:</label>
      <textarea name="mensagem" rows="3" cols="50"></textarea><br><br>
      <input type="submit" name="SendCadCont" value="Cadastrar">

      
    </form>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>