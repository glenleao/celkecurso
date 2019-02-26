<?php
session_start();
include_once './conexao.php';


$SendCadImg = filter_input(INPUT_POST, 'SendCadImg', FILTER_SANITIZE_STRING);
if ($SendCadImg){
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$nome_imagem = $_FILES['imagem']['name'];
	// var_dump($_FILES['imagem']);

	//inseri no banco de dados
	$result_img = "INSERT INTO imagens (nome, imagem) VALUES (:nome, :imagem)";
	$insert_msg = $conn->prepare($result_img);
	$insert_msg->bindParam(':nome', $nome);
	$insert_msg->bindParam(':imagem', $nome_imagem);

//verifica se os dados foram inseridos com sucesso
	if ($insert_msg->execute()){
		//recuperar ultimo ID inserido no BD
		$ultimo_id = $conn->lastInsertId();

		//diretorio onde o arquivo vai ser salvo
		$diretorio = 'imagens/'. $ultimo_id.'/';

		//criar pasta de  fotos
		mkdir($diretorio, 0755);

		if(move_uploaded_file($_FILES ['imagem']['tmp_name'], $diretorio.$nome_imagem)){
			$_SESSION['msg'] = "<p style='color:green;'>Dados salvo com sucesso e upload da imagem realizado com sucesso</p>";
			header("Location: cadastrar.php");
		}else{
			$_SESSION['msg'] = "<p><span style='color:green;'>Dados salvo com sucesso</span><span style='color:red;'>Erro ao fazer upload da imagem</span></p>";
			header("Location: cadastrar.php");
			}
		}else{
			$_SESSION['msg'] = "<p style='color:red;'>Erro</p>";
			header("Location: cadastrar.php");
			}
		}else{
			$_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar</p>";
			header("Location: cadastrar.php");
		}
