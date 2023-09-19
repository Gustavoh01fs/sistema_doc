<?php
session_start();

if(isset($_POST['submit']))
{ 
  include("../conexao.php");
  
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $consenha = $_POST['consenha'];

    $_SESSION['nome'] = $nome = $_POST['nome'];
    $_SESSION['email'] = $email = $_POST['email'];

    $include = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome' , '$email' , '$senha')";

    $QueryPesquisa = "SELECT email  FROM usuarios WHERE email = '". $email. "'";
    $result0 = mysqli_query ($mysqli, $QueryPesquisa);

    if($result0 -> lengths != NULL){
      echo "<script>
		  alert('Email já cadastrado!');
		  window.location.href='pagcad.html';
		  </script>";
    }
    elseif($senha != $consenha){
      echo "<script>
		  alert('As senhas devem ser iguais!');
		  window.location.href='pagcad.html';
		  </script>";
    }
    else {
      $result = mysqli_query($mysqli, $include);
		  echo "<script>
	    alert('Cadastro realizado com sucesso!');
	    window.location.href='../index.php';
	    </script>";
    }


}
?>