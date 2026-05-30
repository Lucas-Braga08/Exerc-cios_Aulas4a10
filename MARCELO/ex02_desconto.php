<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex02 – Desconto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
/*
 * EXERCÍCIO 02 – DESCONTO
 * Lógica: recebe o preço original e a porcentagem de desconto,
 * calcula o valor do desconto e o preço final.
 *   valorDesconto = preço * (porcentagem / 100)
 *   precoFinal    = preço - valorDesconto
 */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Substitui vírgula por ponto para aceitar ambos os formatos
    $preco      = (float) str_replace(",", ".", $_POST["txtpreco"]      ?? 0);
    $porcentagem = (float) str_replace(",", ".", $_POST["txtporcento"]  ?? 0);

    // Cálculo do desconto em reais
    $valorDesconto = $preco * ($porcentagem / 100);

    // Preço final após o desconto
    $precoFinal = $preco - $valorDesconto;

    ?>
    <div class="container-form">
        <h2>Desconto</h2>
        <p class="subtitulo">Calcule o preço após o desconto</p>

        <form method="post" action="ex02_desconto.php">
            <label>Preço original (R$):</label>
            <input type="text" name="txtpreco"   value="<?= $preco ?>" required>

            <label>Porcentagem de desconto (%):</label>
            <input type="text" name="txtporcento" value="<?= $porcentagem ?>" required>

            <div class="btn-row">
                <input type="submit" value="Calcular">
                <input type="reset"  value="Limpar">
            </div>
        </form>

        <div class="resultado-box">
            <h3>Resultado</h3>
            <p><strong>Preço original:</strong> R$ <?= number_format($preco, 2, ",", ".") ?></p>
            <p><strong>Desconto (<?= number_format($porcentagem, 2, ",", ".") ?>%):</strong>
               − R$ <?= number_format($valorDesconto, 2, ",", ".") ?></p>

            <!-- Destaque principal: preço final -->
            <p class="valor-final">
                <strong>Preço com desconto</strong>
                R$ <?= number_format($precoFinal, 2, ",", ".") ?>
            </p>
        </div>

        <a href="index.php" class="btn-voltar">← Voltar ao início</a>
    </div>

    <?php

} else {
    ?>
    <div class="container-form">
        <h2>Desconto</h2>
        <p class="subtitulo">Informe o preço e a porcentagem de desconto</p>

        <form method="post" action="ex02_desconto.php">
            <label>Preço original (R$):</label>
            <input type="text" name="txtpreco" placeholder="Ex: 150,00" required>

            <label>Porcentagem de desconto (%):</label>
            <input type="text" name="txtporcento" placeholder="Ex: 15" required>

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
