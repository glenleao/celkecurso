<?php
 session_start();
 include_once './conexao.php';
 $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
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

    <title>Editar mensagem</title>
  </head>
  <body>
    <div class="container py-5">
    <h1>Editar mensagem</h1>
    <?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
//SQL para selecionar o registro
$result_msg_cont = "SELECT * FROM mensagens_contato WHERE id=$id";

//Selecionar os registros
$result_msg_cont = $conn->prepare($result_msg_cont);
$result_msg_cont->execute();
$row_msg_cont = $result_msg_cont->fetch(PDO::FETCH_ASSOC);

    ?>
    <form method="POST" action="proc_edit_msg.php">
      <input type="hidden" name="id"  value="<?php if(isset($row_msg_cont['id'])){echo $row_msg_cont['id'];}?>">


      <label>Nome:</label>
      <input type="text" name="nome" placeholder="Inserir seu  nome" value="<?php if(isset($row_msg_cont['nome'])){echo $row_msg_cont['nome'];}?>"><br><br>
      <label>Email:</label>
      <input type="email" name="email" placeholder="Inserir seu  email" value="<?php if(isset($row_msg_cont['email'])){echo $row_msg_cont['email'];}?>"><br><br>
      <label>Assunto:</label>
      <input type="text" name="assunto" placeholder="Assunto da mensagem" vallue="<?php if(isset($row_msg_cont['assunto'])){echo $row_msg_cont['assunto'];}?>"><br><br>
      <label>Mensagem:</label>
      <textarea name="mensagem" rows="3" cols="50"><?php if(isset($row_msg_cont['mmensagem'])){echo $row_msg_cont['mmensagem'];}?></textarea><br><br>
      <input type="submit" name="SendEditCont" value="Editar">

      
    </form>
    <a href="listar-registro.php"><button class="btn btn-success mt-5">Listar registros</button></a>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>