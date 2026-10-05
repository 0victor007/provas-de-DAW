<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["id"];

    if(file_exists("perguntas.txt")) {
        $arq_excluir = fopen("perguntas.txt", "r");
        $novo = "";

        while(($linha = fgets($arq_excluir)) !== false) {
            if(trim($linha) != "") {
                $excluir = explode(";", trim($linha));
                
                if($excluir[0] != $id) {
                    $novo .= $linha;
                }
            }
        }
        fclose($arq_excluir);

        $arq_perguntas = fopen("perguntas.txt", "w");
        fwrite($arq_perguntas, $novo);
        fclose($arq_perguntas);
    }

    if(file_exists("respostas.txt")) {
        $arq_respostas = fopen("respostas.txt", "r");
        $novo_resp = "";

        while(($linha = fgets($arq_respostas)) !== false) {
            if(trim($linha) != "") {
                $excluir_resp = explode(";", trim($linha));
                
                if($excluir_resp[0] != $id) {
                    $novo_resp .= $linha;
                }
            }
        }
        fclose($arq_respostas);

        $arq_respostas = fopen("respostas.txt", "w");
        fwrite($arq_respostas, $novo_resp);
        fclose($arq_respostas);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Pergunta</title>
</head>
<body>
    <h1><center>Excluir Pergunta</center></h1>

    <form action="excluir_perguntas.php" method="POST">
        ID da pergunta: <input type="text" name="id">
        <input type="submit" value="Excluir">
    </form>

    <br>
    <a href="criar_perguntas.php">Voltar</a>
</body>
</html>
