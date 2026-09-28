<?php

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $pergunta = $_POST["pergunta"];
    $r1 = $_POST["r1"];
    $r2 = $_POST["r2"];
    $r3 = $_POST["r3"];
    $r4 = $_POST["r4"];
    $correta = $_POST["correta"];



    if (!file_exists("perguntas.txt")){
        $arqPerguntas = fopen("perguntas.txt", "w");
        fwrite($arqPerguntas, "id;pergunta\n");
        fclose($arqPerguntas);

    }if (!file_exists("respostas.txt")){
        $arqRespostas = fopen("respostas.txt", "w");
        fwrite($arqRespostas, "id;idpergunta;resposta;certa\n");
        fclose($arqRespostas);
    }

    $linhas = file("perguntas.txt");
    $idPergunta = count($linhas);

    $arqPerguntas = fopen("perguntas.txt", "a");
    $linha = $idPergunta . ";" . $pergunta . "\n";
    fwrite($arqPerguntas, $linha);
    fclose($arqPerguntas);

    $linhas = file("respostas.txt");
    $idResposta = count($linhas);

    $respostas = array($r1, $r2, $r3, $r4);

    $arqRespostas = fopen("respostas.txt", "a");

    for ($i = 0; $i < 4; $i++) {


        if ($i + 1 == $correta) {
            $certa = 1;
        } else {
            $certa = 2;
        }

        $linha = $idResposta . ";" . $idPergunta . ";" . $respostas[$i] . ";" . $certa . "\n";
        fwrite($arqRespostas, $linha);

        $idResposta = $idResposta + 1;
    }

    fclose($arqRespostas);

    $msg = "Pergunta cadastrada com o id" . $idPergunta;
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incluir Pergunta</title>
</head>

<body>
    <h1>Incluir pergunta</h1>

    <form action="incluir_pergunta.php" method="POST">

        <label for="pergunta">Pergunta:</label>
        <input type="text" name="pergunta" required>

        <br><br>

        <p>Respostas (marque a correta) não tem erro :</p>

        <input type="radio" name="correta" value="1" required>
        <input type="text" name="r1" required>
        <br><br>

        <input type="radio" name="correta" value="2">
        <input type="text" name="r2" required>
        <br><br>

        <input type="radio" name="correta" value="3">
        <input type="text" name="r3" required>
        <br><br>

        <input type="radio" name="correta" value="4">
        <input type="text" name="r4" required>
        <br><br>

        <input type="submit" value="Incluir pergunta">

    </form>

    <p><?php echo $msg; ?></p>
</body>

</html>
