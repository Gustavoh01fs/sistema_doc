<?php 
session_start();
include("../conexao.php");
include_once('../protect.php');
include("reduser.php");

$nuser = $_SESSION['nome'];
$nid = $_SESSION['id'];
$aadm = $_SESSION['adm'];

?>

<!DOCTYPE HTML>

<link rel="stylesheet" type="text/css" href="../style/style.css">
<div id="body">
    <?php echo"<a href='../historico/historico.php?nome=$nuser'><button type='button' class='bottaoadm'>Historico</button></a>"; ?><p>
    <a href="../logout.php"><button type="button" class="bottaoadm">Sair</button></a>
</div>





