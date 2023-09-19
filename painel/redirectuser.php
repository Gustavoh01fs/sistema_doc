<?php 
session_start();
include("../conexao.php");
include_once('../protect.php');
include("reduser.php");

$nuser = $_SESSION['nome'];
$nid = $_SESSION['id'];
$aadm = $_SESSION['adm'];


if($aadm == 'adm'){
    echo "<script>
                alert(' Login efetuado com sucesso!!');
                window.location.href='pagadm.php';
                </script>";
}
else{
    echo "<script>
              alert('Login Efetuado com sucesso bem vindo usuario');
              window.location.href='paguser.php';
              </script>";
}
?>




