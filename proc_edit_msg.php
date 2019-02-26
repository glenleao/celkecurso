<?php
session_start();
include_once 'conexao.php';


$SendEditCont = filter_input(INPUT_POST, 'SendEditCont', FILTER_SANITIZE_STRING);
if($SendEditCont){
	//recebe os dados do formulario
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);
	$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);

	//inserir no BD
	$result_msg_cont = "UPDATE mensagens_contato SET nome=:nome, email=:email, assunto=:assunto, mensagem=:mensagem WHERE id=$id";
	$update_msg_cont = $conn->prepare($result_msg_cont);
	$update_msg_cont->bindParam(':nome', $nome);
	$update_msg_cont->bindParam(':email', $email);
	$update_msg_cont->bindParam(':assunto', $assunto);
	$update_msg_cont->bindParam(':mensagem', $mensagem);

	if ($update_msg_cont->execute()) {
		$_SESSION['msg'] = "<p style='color:green;'>Mensagem editada</p>";
		header("Location: index.php");
	}else{
		$_SESSION ['msg'] = "<p style='color:red;'>Mensagem nao editada</p>";
	header("Location: index.php");
	}

}else{
	$_SESSION ['msg'] = "<p style='color:red;'>Mensagem nao ediiada</p>";
	header("Location: index.php");
}
