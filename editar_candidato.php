<?php
// editar_candidato.php 4 SGC
require_once 'conexao.php';
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
 <title>SGC 4 Editar Candidato</title>
</head>
<body>
<h1>Editar Candidato</h1>
<form action="atualizar_candidato.php" method="post">
 <input type="hidden" name="id" value="<?php echo $c['id']; ?>">
 <fieldset>
 <legend>Dados Pessoais</legend>
 <label>Nome:
 <input type="text" name="nome"
 value="<?php echo htmlspecialchars($c['nome']); ?>"
 required maxlength="100">
 </label><br>
 <label>E-mail:
 <input type="email" name="email"
 value="<?php echo htmlspecialchars($c['email']); ?>"
 required maxlength="100">
 </label><br>
 <label>Telefone:
 <input type="text" name="telefone"
 value="<?php echo htmlspecialchars($c['telefone']); ?>"
 maxlength="20">
 </label><br>
 <label>Data de nascimento:
 <input type="date" name="data_nascimento"
 value="<?php echo htmlspecialchars($c['data_nascimento']);
?>">
 </label>
 </fieldset>
 <fieldset>
 <legend>Formação e Experiência</legend>
 <label>Formação acadêmica:<br>
 <textarea name="formacao" rows="4" cols="50"><?php
 echo htmlspecialchars($c['formacao']); ?></textarea>
 </label><br>
 <label>Experiência profissional:<br>
 <textarea name="experiencia" rows="4" cols="50"><?php
 echo htmlspecialchars($c['experiencia']); ?></textarea>
 </label><br>
 <label>Habilidades:<br>
 <textarea name="habilidades" rows="3" cols="50"><?php
 echo htmlspecialchars($c['habilidades']); ?></textarea>
 </label>
 </fieldset>
 <button type="submit">Salvar Alterações</button>
 <a href="curriculo.php?id=<?php echo $id; ?>">Cancelar</a>
</form>
</body>
</html>