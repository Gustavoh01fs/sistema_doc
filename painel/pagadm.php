<?php 
session_start();
include("../conexao.php");
include_once('../protect.php');
include("reduser.php");

$nuser = $_SESSION['nome'];
$nid = $_SESSION['id'];
$aadm = $_SESSION['adm'];

if($aadm != 'adm'){
    echo"<script>
        alert (' Você não é um usuário de nivel admnistrador, você voltará para a página anterior!');
        window.history.back();
    </script>";
}

?>

<!DOCTYPE HTML>

<div id="body">
<link rel="stylesheet" type="text/css" href="../style/style.css">
    <a href="../cad_doc/uploadpdf.php"><button type="button" class="bottaoadm">Cadastrar</button></a><p>
    <?php echo"<a href='../historico/historico.php?nome=$nuser' ><button type='button' class='bottaoadm'>Historico</button>"; ?><p>
    <a href="../logout.php"><button type="button" class="bottaoadm">Sair</button></a>

</div>



