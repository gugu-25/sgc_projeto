<?php
// listar_candidatos.php 4 SGC
require_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <title>SGC 4 Lista de Candidatos</title>
</head>
<body>
<h1>Candidatos Cadastrados</h1>
<a href="cadastro.html">+ Novo Candidato</a>
<?php
$sql = "SELECT id, nome, email, telefone FROM candidatos ORDER BY nome ASC";
$res = mysql_query($sql, $conn);
if (!$res) {
 die('Erro na consulta: ' . mysql_error($conn));
}
$total = mysql_num_rows($res);
echo "<p>Total de candidatos: <b>$total</b></p>";
if ($total === 0) {
 echo '<p>Nenhum candidato cadastrado ainda.</p>';
} else {
 echo '<table border="1" cellpadding="6">';
 echo '<tr><th>#</th><th>Nome</th><th>E-mail</th><th>Telefone</th><th>Ações</th></tr>';
 while ($linha = mysql_fetch_array($res, MYSQL_ASSOC)) {
 $id = (int) $linha['id'];
 $nome = htmlspecialchars($linha['nome']);
 $email = htmlspecialchars($linha['email']);
 $tel = htmlspecialchars($linha['telefone']);
 echo "<tr>
 <td>$id</td>
 <td>$nome</td>
 <td>$email</td>
 <td>$tel</td>
 <td>
 <a href='curriculo.php?id=$id'>Ver Currículo</a> |
 <a href='editar_candidato.php?id=$id'>Editar</a> |
 <a href='excluir_candidato.php?id=$id'
 onclick='return confirm(\"Excluir $nome?\")'>Excluir</a>
 </td>
 </tr>";
 }
 echo '</table>';
}
?>
</body>
</html>