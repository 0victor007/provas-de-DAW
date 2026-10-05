<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["id"];
    $pergunta = $_POST["pergunta"];
    $questao1 = $_POST["questao1"];
    $questao2 = $_POST["questao2"];
    $questao3 = $_POST["questao3"];
    $questao4 = $_POST["questao4"];
    $resposta = $_POST["resposta"];

    if(!file_exists("perguntas.txt")) {
        $arq_perguntas = fopen("perguntas.txt", "w")or die("Não foi possível criar o arquivo.");
        $linha = $id . ";" . $pergunta . ";" . $questao1 . ";" . $questao2 . ";" . $questao3 . ";" . $questao4 . ";" . $resposta . "\n";
        fwrite($arq_perguntas, $linha);
        fclose($arq_perguntas);
    } else {
        $arq_perguntas = fopen("perguntas.txt", "a")or die("Não foi possível abrir o arquivo.");
        $linha = $id . ";" . $pergunta . ";" . $questao1 . ";" . $questao2 . ";" . $questao3 . ";" . $questao4 . ";" . $resposta . "\n";
        fwrite($arq_perguntas, $linha);
        fclose($arq_perguntas);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Perguntas</title>
</head>
<body>
    <h1><center>Criar Perguntas</center></h1>

    <form action="criar_perguntas.php" method="POST">
        ID: <input type="text" name="id"><br>
        Informe a Pergunta: <input type="text" name="pergunta"><br>
        Questao1: <input type="text" name="questao1"><br>
        Questao2: <input type="text" name="questao2"><br>
        Questao3: <input type="text" name="questao3"><br>
        Questao4: <input type="text" name="questao4"><br>
        Resposta: <input type="text" name="resposta"><br>
        <br><input type="submit" value="Criar">
    </form>

    <br><a href="criar_resposta.php">Cadastrar Resposta</a>
</body>
</html>
