<?php
// atualizar_candidato.php 4 SGC
require_once 'conexao.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
 header('Location: listar_candidatos.php');
 exit;
}
// Valida o ID oculto
if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
 die('ID inválido.');
}
$id = (int) $_POST['id'];
// Sanitiza os campos recebidos
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
$experiencia = mysql_real_escape_string(trim($_POST['experiencia']),
$conn);
$habilidades = mysql_real_escape_string(trim($_POST['habilidades']),
$conn);
// Validação mínima
if (empty($nome) || empty($email)) {
 die('Erro: Nome e e-mail são obrigatórios. <a
href="javascript:history.back()">Voltar</a>');
}
// Monta e executa a query UPDATE
$sql = "UPDATE candidatos SET
 nome = '$nome',
 email = '$email',
 telefone = '$telefone',
 data_nascimento = '$dt_nasc',
 formacao = '$formacao',
 experiencia = '$experiencia',
 habilidades = '$habilidades'
 WHERE id = $id";
$resultado = mysql_query($sql, $conn);
if (!$resultado) {
 die('Erro ao atualizar: ' . mysql_error($conn));
}
// Verifica se alguma linha foi realmente alterada
$linhas_afetadas = mysql_affected_rows($conn);
// Redireciona para o currículo atualizado
header('Location: curriculo.php?id=' . $id);
exit;
?>