<?php
session_start();
include("../conexao.php");

if(isset($_FILES['arquivo'])) {
    $arquivo = $_FILES['arquivo'];

    if($arquivo['error'])
    die("Falha ao enviar arquivo");

    if($arquivo['size'] > 10485760)
        die("Arquivo muito grande MAX: 10MB");

    $pasta = "arquivos/";
    $filename = $arquivo['name'];
    $newfilename = uniqid(); 
    $extensao = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
    $cpf = $_POST['ljogo'];

    if($extensao != "pdf")
        die("Tipo de arquivo incompativel");

    $path =  $pasta . $newfilename . "." .$extensao;
    $sucesso = move_uploaded_file($arquivo["tmp_name"], $path);
    if($sucesso){
        $mysqli->query("INSERT INTO documento (path, nome, usuario, data_upload) VALUES ('$path', '$filename', '$cpf', NOW())") or die($mysqli->error);

        echo "<script>
        alert('Sucesso ao cadastrar documento!');
        window.location.href='../painel/pagadm.php';
        </script>";
    }
    else
    echo "<p>Falha ao enviar arquivo</p>";
}


?>