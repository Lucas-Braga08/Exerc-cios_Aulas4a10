<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex11 – Calculadora</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $n1 = (float) str_replace(",", ".", $_POST["txtn1"] ?? 0);
    $n2 = (float) str_replace(",", ".", $_POST["txtn2"] ?? 0);

    $operador = $_POST["txtoperador"] ?? "+";

    $resultado = 0;

    switch ($operador) {

        case "+":
            $resultado = $n1 + $n2;
            break;

        case "-":
            $resultado = $n1 - $n2;
            break;

        case "*":
            $resultado = $n1 * $n2;
            break;

        case "/":

            if ($n2 != 0) {
                $resultado = $n1 / $n2;
            } else {
                $resultado = "Não é possível dividir por zero";
            }

            break;
    }

?>

<div class="container-form">

    <h2>Calculadora</h2>
    <p class="subtitulo">Efetue operações matemáticas básicas</p>

    <form method="post" action="ex11_calculadora.php">

        <label>Primeiro valor:</label>
        <input type="text" name="txtn1" value="<?= $n1 ?>" required>

        <label>Segundo valor:</label>
        <input type="text" name="txtn2" value="<?= $n2 ?>" required>

        <label>Operador:</label>

        <select name="txtoperador">

            <option value="+" <?= $operador == "+" ? "selected" : "" ?>>+</option>
            <option value="-" <?= $operador == "-" ? "selected" : "" ?>>-</option>
            <option value="*" <?= $operador == "*" ? "selected" : "" ?>>*</option>
            <option value="/" <?= $operador == "/" ? "selected" : "" ?>>/</option>

        </select>

        <div class="btn-row">
            <input type="submit" value="Calcular">
            <input type="reset" value="Limpar">
        </div>

    </form>

    <div class="resultado-box">

        <h3>Resultado</h3>

        <p class="valor-final">
            <?= $n1 ?> <?= $operador ?> <?= $n2 ?> =
            <strong><?= $resultado ?></strong>
        </p>

    </div>

    <a href="index.php" class="btn-voltar">← Voltar ao início</a>

</div>

<?php

} else {

?>

<div class="container-form">

    <h2>🧮 Calculadora</h2>
    <p class="subtitulo">Digite dois valores e escolha a operação</p>

    <form method="post" action="ex11_calculadora.php">

        <label>Primeiro valor:</label>
        <input type="text" name="txtn1" required>

        <label>Segundo valor:</label>
        <input type="text" name="txtn2" required>

        <label>Operador:</label>

        <select name="txtoperador">

            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>

        </select>

        <div class="btn-row">
            <input type="submit" value="Calcular">
            <input type="reset" value="Limpar">
        </div>

    </form>

    <a href="index.php" class="btn-voltar">← Voltar ao início</a>

</div>

<?php
}
?>

</body>
</html>