<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex08 – Maior e Menor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
/*
 * EXERCÍCIO 08 – MAIOR E MENOR
 * Lógica:
 *   - Recebe 3 números
 *   - Usa max() para encontrar o maior e min() para o menor
 *   - Exibe ambos como resultado
 */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Lê os três números
    $n1 = (float) str_replace(",", ".", $_POST["txtn1"] ?? 0);
    $n2 = (float) str_replace(",", ".", $_POST["txtn2"] ?? 0);
    $n3 = (float) str_replace(",", ".", $_POST["txtn3"] ?? 0);

    // Funções nativas do PHP para encontrar maior e menor
    $maior = max($n1, $n2, $n3);
    $menor = min($n1, $n2, $n3);

    ?>
    <div class="container-form">
        <h2>Maior e Menor</h2>
        <p class="subtitulo">Resultado da análise</p>

        <form method="post" action="ex08_maiormenor.php">
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
            <p><strong>Números:</strong>
               <?= number_format($n1,2,",",".") ?> |
               <?= number_format($n2,2,",",".") ?> |
               <?= number_format($n3,2,",",".") ?></p>

            <!-- Maior número em azul -->
            <p class="valor-final" style="font-size:1.3rem; margin-top:16px;">
                <strong>Maior número</strong>
                <?= number_format($maior, 2, ",", ".") ?>
            </p>

            <!-- Menor número com fundo levemente diferente -->
            <p class="valor-final"
               style="font-size:1.3rem; margin-top:10px;
                      background:linear-gradient(135deg,#37474f,#546e7a);">
                <strong>sMenor número</strong>
                <?= number_format($menor, 2, ",", ".") ?>
            </p>
        </div>

        <a href="index.php" class="btn-voltar">← Voltar ao início</a>
    </div>

    <?php

} else {
    ?>
    <div class="container-form">
        <h2>🔍 Maior e Menor</h2>
        <p class="subtitulo">Informe 3 números para descobrir o maior e o menor</p>

        <form method="post" action="ex08_maiormenor.php">
            <label>1º Número:</label>
            <input type="text" name="txtn1" placeholder="Ex: 12" required>

            <label>2º Número:</label>
            <input type="text" name="txtn2" placeholder="Ex: 7" required>

            <label>3º Número:</label>
            <input type="text" name="txtn3" placeholder="Ex: 25" required>

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
