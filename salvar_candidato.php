<?php

require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
 header('Location: cadastro.html');
 exit;
}

$nome = mysql_real_escape_string(trim($_POST['nome']),
$conn);
$email = mysql_real_escape_string(trim($_POST['email']),
$conn);
$telefone = mysql_real_escape_string(trim($_POST['telefone']),
$conn);
$dt_nasc =
mysql_real_escape_string(trim($_POST['data_nascimento']), $conn);
$formacao = mysql_real_escape_string(trim($_POST['formacao']),
$conn);
$experiencia=
mysql_real_escape_string(trim($_POST['experiencia']),$conn);
$habilidades=
mysql_real_escape_string(trim($_POST['habilidades']),$conn);

if (empty($nome) || empty($email)) {
 die('Erro: Nome e e-mail são obrigatórios. <a
href="cadastro.html">Voltar</a>');
}

$sql = "INSERT INTO candidatos
 (nome, email, telefone, data_nascimento,
 formacao, experiencia, habilidades)
 VALUES
 ('$nome', '$email', '$telefone', '$dt_nasc',
 '$formacao', '$experiencia', '$habilidades')";
$resultado = mysql_query($sql, $conn);
if (!$resultado) {
 die('Erro ao salvar candidato: ' . mysql_error($conn));
}
$id_inserido = mysql_insert_id($conn);

header('Location: curriculo.php?id=' . $id_inserido);
exit;
?>