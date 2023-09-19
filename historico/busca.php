<?php
session_start();
$nid = $_SESSION['id'];

include('../include_rdc/conn.php');
if (!isset($_POST['nome_livro'])) {
	header("Location: historico.php");
	exit;
}
 
$nome = "%".trim($_POST['nome_livro'])."%";
 

$sth = $conn->prepare('SELECT * FROM `documento` WHERE `nome` LIKE :nome' );

$sth->bindParam(':nome', $nome, PDO::PARAM_STR);
$sth->execute();
 
$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
 
<!DOCTYPE html>
<html>
<head>
	<title>Resultado da busca</title>
</head>
<body>
<h2>Resultado da busca</h2>
<?php
if (count($resultados)) {
	foreach($resultados as $Resultado) {
?>
<label><?php echo $Resultado['nome']; ?> </label>
<br>
<?php
} } else {
?>
<label>Não foram encontrados resultados pelo termo buscado.</label>
<?php
}
?>
</body>
</html>