<?php
 session_start();
 include('../conexao.php');

 $user = $_SESSION['nome'];
?>

<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../style/style.css">
        <title>Documentos Atribuidos</title>
    </head>
<body>    
    <div id="body">
    <h1 align="center"> Documentos Recebidos </h1>
    <hr>

	
	<form action="busca.php" method="POST">
		<label>Pesquisa de Documentos</label>
		<input type="text" name="nome_livro" size="50" placeholder="Insira o nome do Documento">
		<button style="width:100px;" class="bottaop">Buscar</button>

<br><br><table TABLE WIDTH="50%"  BORDER="5" CELLPADDING="5" bgcolor="#b0b0b0" align="center">
    <thead>
        <tr>
            <font size="15px">
            <th>Arquivo</th>
            <th>Data de Envio</th>
        </tr>
    </thead>
<tbody>

<?php

$sql_consulta=mysqli_query($mysqli , "SELECT *FROM documento WHERE usuario = '". $user. "'");
$TOTAL =mysqli_num_rows($sql_consulta);
    while($dados=mysqli_fetch_array($sql_consulta)){
        $data = $dados[2];
        $camin = $dados[3];
        $data_att = strtotime($data);
        $dma_br = date("d/m/Y ", $data_att);
        $hms_br = date("H:i:s ", $data_att);

?>

<tr>
    <td><a href="baixar.php?arquivo=../cad_doc/<?= $dados[1] ?>" class="classe" ><?php echo($camin)?></td>
    <td><?php echo($dma_br . "as " . $hms_br)?></td>
</tr>

<?php   }?>

    <tr><td>    Total: <?=$TOTAL ?></td></tr>
</tbody>
    </center>
</table>

<input type="button" value="Voltar" onClick="JavaScript: window.history.back();" class="bottao">

</body>
</html>
</div>