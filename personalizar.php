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
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/style.css">

    <title>Pesquisa personalizada</title>
  </head>
  <body>
    <div class="container py-5">
    <h1>Pesquisa personalizada</h1>
    
    <form method="POST" action="">
      <label>CPF:</label>
      <input type="text" name="cpf"><br><br>
      <label>Nome:</label>
      <input type="text" name="nome" placeholder="Inserir seu  nome"><br><br>
      <label>RG:</label>
      <input type="text" name="rg"><br><br>     
    </form>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/personalizado.js"></script>
  </body>
</html>