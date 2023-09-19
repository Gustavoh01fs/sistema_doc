<?php

$usuario = 'root';
$senha = '';
$database = 'login';
$host = 'localhost';

$mysqli = mysqli_connect($host, $usuario, $senha, $database);

if($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}

$nid = $_SESSION['id'];
$nuser = $_SESSION['nome'];

$sql_consulta=mysqli_query($mysqli , "SELECT *FROM usuarios WHERE nome = '$nuser'" );
$TOTAL = mysqli_num_rows($sql_consulta);
while($dados=mysqli_fetch_array($sql_consulta)){

    $url = $dados[4];
}
$_SESSION['adm'] = $url;




?>
