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

    <title>upload imagem</title>
  </head>
  <body>
    <div class="container py-5">
    <h1>Upload imagem</h1>
    <?php
    if(isset($_SESSION['msg'])){
      echo $_SESSION['msg'];
      unset ($_SESSION['msg']);
    }
    ?>
    <form method="POST" action="proc_cad_img.php" enctype="multipart/form-data">
      <label>Nome:</label>
      <input type="text" name="nome" placeholder="Inserir seu  nome"><br><br>
      <label>Imagem:</label>
      <input type="file" name="imagem"><br><br>
      <input type="submit" name="SendCadImg" value="Cadastrar">

      
    </form>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>