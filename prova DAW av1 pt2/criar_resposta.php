<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $IDperg = $_POST["IDperg"];
    $IDresp = $_POST["IDresp"];

    if(!file_exists("respostas.txt")) {
        $arq_respostas = fopen("respostas.txt", "w")or die("Não foi possível criar o arquivo.");
        $linha = $IDperg . ";" . $IDresp . "\n";
        fwrite($arq_respostas, $linha);
        fclose($arq_respostas);
    } else {
        $arq_respostas = fopen("respostas.txt", "a")or die("Não foi possível abrir o arquivo.");
        $linha = $IDperg . ";" . $IDresp . "\n";
        fwrite($arq_respostas, $linha);
        fclose($arq_respostas);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Resposta</title>
</head>
<body>
    <h1><center>Cadastrar Resposta</center></h1>

    <form action="criar_resposta.php" method="POST">
        ID da pergunta: <input type="text" name="IDperg"><br>
        ID da resposta: <input type="text" name="IDresp"><br>
        <br><input type="submit" value="Registrar">
    </form>

    <br><a href="criar_perguntas.php">Voltar</a>
</body>
</html>
