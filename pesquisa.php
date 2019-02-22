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

    <title>Pesquisar assunto</title>
  </head>
  <body>
    <div class="container py-5">
    <h1>Pesquisar assunto</h1>
    <form method="POST" action="">
      <input type="text" name="assunto" id="assunto" placeholder="Pesquise pelo assunto">
      <input type="submit" name="SendPesqMsg" value="Pesquisar">
    </form>
    <?php
    $SendPesqMsg = filter_input(INPUT_POST, 'SendPesqMsg', FILTER_SANITIZE_STRING);
    if ($SendPesqMsg){
      $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);


      //SQL para selecionar os registros
$result_msg_cont = "SELECT * FROM mensagens_contato WHERE assunto LIKE '%".$assunto."%' ORDER BY assunto ASC LIMIT 7";

//seleciona os registros
$resultado_msg_cont = $conn->prepare($result_msg_cont);
$resultado_msg_cont->execute();

while ($row_msg_cont = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC)) {
  echo "ID: " . $row_msg_cont['id'] . "<br>";
      echo "Nome: " . $row_msg_cont['nome'] . "<br>";
      echo "E-mail: " . $row_msg_cont['email'] . "<br>";
      echo "Assunto: " . $row_msg_cont['assunto'] . "<br><hr>";
    }
  }
    ?>



    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script type="text/javascript">
      $("#assunto").autocomplete({
        source:'proc_pesq_msg.php'
      });
    });
    </script>
  </body>
</html>