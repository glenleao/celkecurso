<?php
session_start();
include_once 'conexao.php';


$SendCadPalestra = filter_input(INPUT_POST, 'SendCadPalestra', FILTER_SANITIZE_STRING);
if($SendCadPalestra){
	//recebe os dados do formulario
	$nome = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'tema', FILTER_SANITIZE_STRING);
	$assunto = filter_input(INPUT_POST, 'palestrante', FILTER_SANITIZE_STRING);

	//inserir no BD
	$result_msg_cont = "INSERT INTO palestras (data, tema, palestrante) VALUES (:data, :tema, :palestrante)";
	$insert_msg_cont = $conn->prepare($result_msg_cont);
	$insert_msg_cont->bindParam(':data', $data);
	$insert_msg_cont->bindParam(':tema', $tema);
	$insert_msg_cont->bindParam(':palestrante', $palestrante);

	if ($insert_msg_cont->execute()) {
		$_SESSION['msg'] = "<p style='color:green;'>Mensagem enviada</p>";
		header("Location: cadastro-palestras.php");
	}else{
		$_SESSION ['msg'] = "<p style='color:red;'>Mensagem nao enviada</p>";
	header("Location: cadastro-palestras.php");
	}

}else{
	$_SESSION ['msg'] = "<p style='color:red;'>Mensagem nao enviada</p>";
	header("Location: cadastro-palestras.php");
}
