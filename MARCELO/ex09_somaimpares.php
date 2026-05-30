<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex09 – Soma dos Ímpares</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $inicio = (int) ($_POST["txtinicio"] ?? 0);
    $fim    = (int) ($_POST["txtfim"] ?? 0);

    $soma = 0;
    $impares = [];

    for ($i = $inicio; $i <= $fim; $i++) {

        if ($i % 2 != 0) {
            $soma += $i;
            $impares[] = $i;
        }
    }

    ?>

    <div class="container-form">
        <h2>Soma dos Ímpares</h2>
        <p class="subtitulo">Resultado do intervalo informado</p>

        <form method="post" action="ex09_impares.php">

            <label>Valor inicial:</label>
            <input type="number" name="txtinicio" value="<?= $inicio ?>" required>

            <label>Valor final:</label>
            <input type="number" name="txtfim" value="<?= $fim ?>" required>

            <div class="btn-row">
                <input type="submit" value="Calcular">
                <input type="reset" value="Limpar">
            </div>

        </form>

        <div class="resultado-box">

            <h3>Resultado</h3>

            <p>
                <strong>Números ímpares:</strong>
                <?= implode(", ", $impares) ?>
            </p>

            <p class="valor-final">
                <strong>Soma Total</strong>
                <?= $soma ?>
            </p>

        </div>

        <a href="index.php" class="btn-voltar">← Voltar ao início</a>

    </div>

    <?php

} else {

?>

<div class="container-form">

    <h2>Soma dos Ímpares</h2>
    <p class="subtitulo">Informe um intervalo de números</p>

    <form method="post" action="ex09_impares.php">

        <label>Valor inicial:</label>
        <input type="number" name="txtinicio" required>

        <label>Valor final:</label>
        <input type="number" name="txtfim" required>

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