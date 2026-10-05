<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];

    if(file_exists("usuarios.txt")) {
        $arq_usuario = fopen("usuarios.txt", "r");
        $novo = "";

        while(($linha = fgets($arq_usuario)) !== false) {
            if(trim($linha) != "") {
                $alterar = explode(";", trim($linha));
                
                if($alterar[1] == $cpf) {
                    $linha_nova = $nome . ";" . $cpf . "\n";
                    $novo .= $linha_nova;
                } else {
                    $novo .= $linha;
                }
            }
        }
        fclose($arq_usuario);

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
    <title>Alterar Usuários</title>
</head>
<body>
    <h1><center>Alterar Usuários</center></h1>

    <form action="alterar_usuario.php" method="POST">
        CPF do usuario: <input type="text" name="cpf"><br>
        Novo Nome: <input type="text" name="nome"><br>
        <br><input type="submit" value="Alterar">
    </form>

    <br><a href="criar_usuario.php">Voltar</a>
</body>
</html>
