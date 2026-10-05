<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cpf = $_POST["cpf"];

    if(file_exists("usuarios.txt")) {
        $arq_excluir = fopen("usuarios.txt", "r");
        $novo = "";

        while(($linha = fgets($arq_excluir)) !== false) {
            if(trim($linha) != "") {
                $excluir = explode(";", trim($linha));
                
                if($excluir[1] != $cpf) {
                    $novo .= $linha;
                }
            }
        }
        fclose($arq_excluir);

        $arq_usuarios = fopen("usuarios.txt", "w");
        fwrite($arq_usuarios, $novo);
        fclose($arq_usuarios);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Usuário</title>
</head>
<body>
    <h1><center>Excluir Usuário</center></h1>

    <form action="excluir_usuario.php" method="POST">
        CPF do usuario: <input type="text" name="cpf"><br>
        <br><input type="submit" value="Excluir">
    </form>

    <br><a href="criar_usuario.php">Voltar</a>
</body>
</html>
