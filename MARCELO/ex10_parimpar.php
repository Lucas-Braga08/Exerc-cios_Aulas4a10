<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex10 – Par ou Ímpar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $numero = (int) ($_POST["txtnumero"] ?? 0);

    if ($numero % 2 == 0) {

        $resultado = "PAR";
        $icone = "✅";

    } else {

        $resultado = "ÍMPAR";
        $icone = "⚠️";
    }

?>

<div class="container-form">

    <h2>🔢 Par ou Ímpar</h2>
    <p class="subtitulo">Descubra se o número é par ou ímpar</p>

    <form method="post" action="ex10_par_impar.php">

        <label>Número:</label>
        <input type="number" name="txtnumero" value="<?= $numero ?>" required>

        <div class="btn-row">
            <input type="submit" value="Verificar">
            <input type="reset" value="Limpar">
        </div>

    </form>

    <div class="resultado-box">

        <h3>Resultado</h3>

        <p class="valor-final">
            <?= $icone ?> O número <strong><?= $numero ?></strong> é
            <strong><?= $resultado ?></strong>
        </p>

    </div>

    <a href="index.php" class="btn-voltar">← Voltar ao início</a>

</div>

<?php

} else {

?>

<div class="container-form">

    <h2>Par ou Ímpar</h2>
    <p class="subtitulo">Digite um número inteiro</p>

    <form method="post" action="ex10_par_impar.php">

        <label>Número:</label>
        <input type="number" name="txtnumero" required>

        <div class="btn-row">
            <input type="submit" value="Verificar">
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