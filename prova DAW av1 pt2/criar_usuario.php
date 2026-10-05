<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];

    if(!file_exists("usuarios.txt")) {
        $arq_usuarios = fopen("usuarios.txt", "w") or die("Não foi possível criar o arquivo.");
        $linha = $nome . ";" . $cpf . "\n";
        fwrite($arq_usuarios, $linha);
        fclose($arq_usuarios);
    } else {
        $arq_usuarios = fopen("usuarios.txt", "a") or die("Não foi possível abrir o arquivo.");
        $linha = $nome . ";" . $cpf . "\n";
        fwrite($arq_usuarios, $linha);
        fclose($arq_usuarios);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuários</title>
</head>
<body>
    <h1><center>Criar Usuários</center></h1>

    <form action="criar_usuario.php" method="POST">
        Nome: <input type="text" name="nome"><br>
        CPF: <input type="text" name="cpf"><br>
        <br><input type="submit" value="Criar">
    </form>

    <br><a href="listar_usuarios.php">Listar Usuarios</a>
    <br><a href="alterar_usuario.php">Alterar Usuarios</a>
    <br><a href="excluir_usuario.php">Excluir Usuarios</a>
    <br><a href="../criar_perguntas.php">Voltar</a>
</body>
</html>
