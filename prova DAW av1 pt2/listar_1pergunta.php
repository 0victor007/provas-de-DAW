<?php
$listar_usuario = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["id"];

    if(file_exists("perguntas.txt")) {
        $arq_listar = fopen("perguntas.txt", "r");

        while(($linha = fgets($arq_listar)) !== false) {
            if(trim($linha) != "") {
                $listar = explode(";", trim($linha));
                
                if($listar[0] == $id) {
                    $listar_usuario .= "ID:" . $listar[0] . "<br>";
                    $listar_usuario .= "Pergunta:" . $listar[1] . "<br>";
                    $listar_usuario .= "1) " . $listar[2] . "<br>";
                    $listar_usuario .= "2) " . $listar[3] . "<br>";
                    $listar_usuario .= "3) " . $listar[4] . "<br>";
                    $listar_usuario .= "4) " . $listar[5] . "<br>";        
                    break; 
                }
            }
        }
        fclose($arq_listar);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Uma Pergunta</title>
</head>
<body>
    <h1><center>Listar uma Pergunta</center></h1>

    <form action="listar_1pergunta.php" method="POST">
        ID da Pergunta: <input type="text" name="id">
        <input type="submit" value="Buscar">
    </form>

    <?php 
    echo $listar_usuario; 
    ?>

    <br>
    <a href="criar_perguntas.php">Voltar</a>
</body>
</html>
