<?php
$listar_usuarios = "";

if(file_exists("usuarios.txt")) {
    $arq_usuarios = fopen("usuarios.txt", "r") or die("Não foi possível abrir o arquivo.");

    while(($linha = fgets($arq_usuarios)) !== false) {
        if(trim($linha) != "") {
            $listar = explode(";", trim($linha));
            
            $listar_usuarios .= "Nome:" . $listar[0] . "<br>";
            $listar_usuarios .= "CPF:" . $listar[1] . "<br>";
        }
    }
    fclose($arq_usuarios);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários</title>
</head>
<body>
    <h1><center>Lista de Usuários</center></h1>

    <?php 
    echo $listar_usuarios; 
    ?>

    <br><a href="criar_usuario.php">Voltar</a>
</body>
</html>
