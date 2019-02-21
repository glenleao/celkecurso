<?php
session_start();
include_once 'conexao.php';


$SendCadCont = filter_input(INPUT_POST, 'SendCadCont', FILTER_SANITIZE_STRING);
if($SendCadCont){
	//recebe os dados do formulario
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);
	$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);

	//inserir no BD
	$result_msg_cont = "INSERT INTO mensagens_contato (nome, email, assunto, mensagem) VALUES (:nome, :email, :assunto, :mensagem)";
	$insert_msg_cont = $conn->prepare($result_msg_cont);
	$insert_msg_cont->bindParam(':nome', $nome);
	$insert_msg_cont->bindParam(':email', $email);
	$insert_msg_cont->bindParam(':assunto', $assunto);
	$insert_msg_cont->bindParam(':mensagem', $mensagem);

	if ($insert_msg_cont->execute()) {
		$_SESSION['msg'] = "<p style='color:green;'>Mensagem enviada</p>";
		header("Location: index.php");
	}else{
		$_SESSION ['msg'] = "<p style='color:red;'>Mensagem nao enviada</p>";
	header("Location: index.php");
	}

}else{
	$_SESSION ['msg'] = "<p style='color:red;'>Mensagem nao enviada</p>";
	header("Location: index.php");
}
