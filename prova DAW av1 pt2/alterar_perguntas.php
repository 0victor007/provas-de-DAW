<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["id"];
    $pergunta = $_POST["pergunta"];
    $questao1 = $_POST["questao1"];
    $questao2 = $_POST["questao2"];
    $questao3 = $_POST["questao3"];
    $questao4 = $_POST["questao4"];
    $resposta = $_POST["resposta"];

    if(file_exists("perguntas.txt")) {
        $arq_alterar = fopen("perguntas.txt", "r");
        $novo = "";

        while(($linha = fgets($arq_alterar)) !== false) {
            if(trim($linha) != "") {
                $alterar = explode(";", trim($linha));
                
                if($alterar[0] == $id) {
                    $linha_nova = $id . ";" . $pergunta . ";" . $questao1 . ";" . $questao2 . ";" . $questao3 . ";" . $questao4 . ";" . $resposta . "\n";
                    $novo .= $linha_nova;
                } else {
                    $novo .= $linha;
                }
            }
        }
        fclose($arq_alterar);

        $arq_perguntas = fopen("perguntas.txt", "w");
        fwrite($arq_perguntas, $novo);
        fclose($arq_perguntas);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Perguntas</title>
</head>
<body>
    <h1><center>Alterar Perguntas</center></h1>

    <form action="alterar_perguntas.php" method="POST">
        ID da Pergunta que deseja alterar: <input type="text" name="id"><br>
        Nova Pergunta: <input type="text" name="pergunta"><br>
        Questao1: <input type="text" name="questao1"><br>
        Questao2: <input type="text" name="questao2"><br>
        Questao3: <input type="text" name="questao3"><br>
        Questao4: <input type="text" name="questao4"><br>
        Nova Resposta: <input type="text" name="resposta"><br>
        <br><input type="submit" value="Alterar">
    </form>

    <br><a href="criar_perguntas.php">Voltar</a>
</body>
</html>
