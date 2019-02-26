<?php
include_once './conexao.php';

$cpf = filter_input(INPUT_GET, 'cpf',FILTER_SANITIZE_STRING);
if (!empty($cpf)) {
	# code...
	$limit = 1;
	$result_aluno = "SELECT * FROM alunos WHERE cpf =:cpf LIMIT :limit";

	$resultado_aluno = $conn->prepare($result_aluno);
}
?>