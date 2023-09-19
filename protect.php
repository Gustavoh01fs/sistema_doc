<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id'])) {

    echo " <script>
    alert(' Você não pode acessar esta página pois não esta logado, você sera redirecionado a tela de login ');
    window.location.href='../index.php';
    </script> ";
}
?>