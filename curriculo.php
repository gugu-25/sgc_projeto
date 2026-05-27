<?php
// curriculo.php 4 SGC
require_once 'conexao.php';
// Valida o parâmetro ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
 die('ID inválido. <a href="listar_candidatos.php">Voltar</a>');
}
$id = (int) $_GET['id'];
$sql = "SELECT * FROM candidatos WHERE id = $id LIMIT 1";
$res = mysql_query($sql, $conn);
if (!$res || mysql_num_rows($res) === 0) {
 die('Candidato não encontrado. <a
href="listar_candidatos.php">Voltar</a>');
}
$c = mysql_fetch_array($res, MYSQL_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <title>Currículo 4 <?php echo htmlspecialchars($c['nome']); ?>
</title>
</head>
<body>
 <h1>Currículo</h1>
 <h2><?php echo htmlspecialchars($c['nome']); ?></h2>
 <p><b>E-mail:</b> <?php echo htmlspecialchars($c['email']); ?>
</p>
 <p><b>Telefone:</b> <?php echo htmlspecialchars($c['telefone']); ?
></p>
 <p><b>Data de Nascimento:</b>
 <?php echo htmlspecialchars($c['data_nascimento']); ?></p>
 <h3>Formação Acadêmica</h3>
 <p><?php echo nl2br(htmlspecialchars($c['formacao'])); ?></p>
 <h3>Experiência Profissional</h3>
 <p><?php echo nl2br(htmlspecialchars($c['experiencia'])); ?></p>
 <h3>Habilidades</h3>
 <p><?php echo nl2br(htmlspecialchars($c['habilidades'])); ?></p>
 <hr>
 <a href="editar_candidato.php?id=<?php echo $id; ?>">Editar</a> |
 <a href="listar_candidatos.php">Voltar à lista</a>
</body>
</html>