<?php

include("conexao.php");


if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo" <script>
        alert('Preencha o campo Email!! ');
        window.location.href='index.php';
        </script>";
    } else if(strlen($_POST['senha']) == 0) {
        echo" <script>
        alert('Preencha o campo Senha!! ');
        window.location.href='index.php';
        </script>";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' ";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);


        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['id'] = $usuario['id'];

            

            echo " <script>
            window.location.href='painel/redirectuser.php';
            </script>";

        } else{
            echo " <script>
            alert(' Login ou senha incorretos!! ');
            window.location.href='index.php';
            </script>";
          }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <title>Login</title>
</head>
<body>

<div id="body">
    <br><h1 class="ah1">Acesse sua conta</h1>
    <form action="" method="POST">


                <input type="text" name="email" required="" placeholder="E-mail" >
            <br><br>
                <input type="password" name="senha" required="" placeholder="Senha">
            <br><br>
            
        <p><button type="submit" class="bottao">Login</button>
        <a href="cad_user/pagcad.html"><button type="button" class="bottao">Cadastrar</button></a>
    </form>
    
</div>
</body>
</html> 
