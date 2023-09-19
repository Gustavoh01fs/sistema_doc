<?php 
session_start();
include("../conexao.php");
include_once ('../protect.php');
include("../include_rdc/conn.php");
?>

<!DOCTYPE HTML>
<head>
</head>
<body>
<div id="body" align="center">
<link rel="stylesheet" type="text/css" href="../style/style.css">

<form method="POST" enctype="multipart/form-data" action="uploadpdfbd.php">
    <table>    
        <select name="ljogo" required="">
        <option value="">Selecione um usuario</option>
            <?php
                $query = $conn->query("SELECT id, nome, email FROM usuarios ORDER BY nome ASC");
                $registros = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach($registros as $option) {
            ?>
                <option value="<?php echo $option['nome']?>" name="<?php echo $option['nome']?>"> <?php echo $option['nome']?>
                </option>
            <?php
            }
            ?>

    </select>
        <p><label for=""></label>
        <input name="arquivo" type="file"><p>
    </table>
    <button type="submit" name="upload" class="bottao">Enviar</button>
    <button type="reset" class="bottao">Limpar</button>
    <input type="button" value="Voltar" onClick="JavaScript: window.history.back();" class="bottao">
</div>
</form>
</body>
</html>