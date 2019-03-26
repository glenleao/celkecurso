<?php
 include_once './conexao.php';
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

    <title>Listar palestras</title>
  </head>
  <body>
    <div class="container py-5">
    <h1>Listar palestras</h1>
    <?php
    //SQL para selecionar os registros
    $result_msg_cont = "SELECT * FROM palestras ORDER BY id ASC";

    //seleciona os registros
    $resultado_msg_cont = $conn->prepare($result_msg_cont);
    $resultado_msg_cont->execute();

    while ($row_msg_cont = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC)){
      echo "ID: " . $row_msg_cont['id'] . "<br>";
      echo "Nome: " . $row_msg_cont['nome'] . "<br>";
      echo "E-mail: " . $row_msg_cont['email'] . "<br>";
      echo "Assunto: " . $row_msg_cont['assunto'] . "<br><hr>";
    }

    ?>
    
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>