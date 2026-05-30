<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex05 – Soma dos Quadrados</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
/*
 * EXERCÍCIO 05 – SOMA DOS QUADRADOS
 * Lógica:
 *   - Recebe 3 números
 *   - Eleva cada um ao quadrado: n² = n * n  (ou pow(n, 2))
 *   - Soma os três quadrados: resultado = n1² + n2² + n3²
 */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Lê e converte cada número para float
    $n1 = (float) str_replace(",", ".", $_POST["txtn1"] ?? 0);
    $n2 = (float) str_replace(",", ".", $_POST["txtn2"] ?? 0);
    $n3 = (float) str_replace(",", ".", $_POST["txtn3"] ?? 0);

    // Calcula o quadrado de cada número usando pow(base, expoente)
    $q1 = pow($n1, 2);
    $q2 = pow($n2, 2);
    $q3 = pow($n3, 2);

    // Soma dos três quadrados
    $soma = $q1 + $q2 + $q3;

    ?>
    <div class="container-form">
        <h2>Soma dos Quadrados</h2>
        <p class="subtitulo">Resultado do cálculo</p>

        <form method="post" action="ex05_quadrados.php">
            <label>1º Número:</label>
            <input type="text" name="txtn1" value="<?= $n1 ?>" required>

            <label>2º Número:</label>
            <input type="text" name="txtn2" value="<?= $n2 ?>" required>

            <label>3º Número:</label>
            <input type="text" name="txtn3" value="<?= $n3 ?>" required>

            <div class="btn-row">
                <input type="submit" value="Calcular">
                <input type="reset"  value="Limpar">
            </div>
        </form>

        <div class="resultado-box">
            <h3>Resultado</h3>

            <!-- Exibe o quadrado de cada número individualmente -->
            <p><strong><?= number_format($n1,2,",",".") ?>²</strong>
               = <?= number_format($q1, 2, ",", ".") ?></p>

            <p><strong><?= number_format($n2,2,",",".") ?>²</strong>
               = <?= number_format($q2, 2, ",", ".") ?></p>

            <p><strong><?= number_format($n3,2,",",".") ?>²</strong>
               = <?= number_format($q3, 2, ",", ".") ?></p>

            <!-- Soma final em destaque -->
            <p class="valor-final">
                <strong>Soma dos Quadrados</strong>
                <?= number_format($soma, 2, ",", ".") ?>
            </p>
        </div>

        <a href="index.php" class="btn-voltar">← Voltar ao início</a>
    </div>

    <?php

} else {
    ?>
    <div class="container-form">
        <h2>² Soma dos Quadrados</h2>
        <p class="subtitulo">Informe 3 números para somar seus quadrados</p>

        <form method="post" action="ex05_quadrados.php">
            <label>1º Número:</label>
            <input type="text" name="txtn1" placeholder="Ex: 3" required>

            <label>2º Número:</label>
            <input type="text" name="txtn2" placeholder="Ex: 4" required>

            <label>3º Número:</label>
            <input type="text" name="txtn3" placeholder="Ex: 5" required>

            <div class="btn-row">
                <input type="submit" value="Calcular">
                <input type="reset"  value="Limpar">
            </div>
        </form>

        <a href="index.php" class="btn-voltar">← Voltar ao início</a>
    </div>
    <?php
}
?>

</body>
</html>
