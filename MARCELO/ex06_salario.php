<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex06 – Salário Líquido</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
/*
 * EXERCÍCIO 06 – SALÁRIO LÍQUIDO
 * Lógica:
 *   - Recebe o salário bruto
 *   - Gratificação = salário bruto × 10%
 *   - Imposto de Renda = salário bruto × 20%
 *   - Salário líquido = salário bruto + gratificação − imposto
 */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Lê e converte o salário bruto (aceita vírgula como separador decimal)
    $salarioBruto = (float) str_replace(",", ".", $_POST["txtsalario"] ?? 0);

    // 10% de gratificação sobre o salário bruto
    $gratificacao = $salarioBruto * 0.10;

    // 20% de imposto de renda sobre o salário bruto
    $imposto = $salarioBruto * 0.20;

    // Salário líquido = bruto + gratificação − imposto
    $salarioLiquido = $salarioBruto + $gratificacao - $imposto;

    ?>
    <div class="container-form">
        <h2>Salário Líquido</h2>
        <p class="subtitulo">Resultado do cálculo</p>

        <form method="post" action="ex06_salario.php">
            <label>Salário bruto (R$):</label>
            <input type="text" name="txtsalario"
                   value="<?= number_format($salarioBruto, 2, ",", ".") ?>" required>

            <div class="btn-row">
                <input type="submit" value="Calcular">
                <input type="reset"  value="Limpar">
            </div>
        </form>

        <div class="resultado-box">
            <h3>Demonstrativo</h3>

            <p><strong>Salário Bruto:</strong>
               R$ <?= number_format($salarioBruto, 2, ",", ".") ?></p>

            <!-- Gratificação de 10% -->
            <p><strong>+ Gratificação (10%):</strong>
               + R$ <?= number_format($gratificacao, 2, ",", ".") ?></p>

            <!-- Imposto de 20% -->
            <p><strong>− Imposto de Renda (20%):</strong>
               − R$ <?= number_format($imposto, 2, ",", ".") ?></p>

            <!-- Salário líquido em destaque -->
            <p class="valor-final">
                <strong>Salário Líquido</strong>
                R$ <?= number_format($salarioLiquido, 2, ",", ".") ?>
            </p>
        </div>

        <a href="index.php" class="btn-voltar">← Voltar ao início</a>
    </div>

    <?php

} else {
    ?>
    <div class="container-form">
        <h2>Salário Líquido</h2>
        <p class="subtitulo">Informe o salário bruto do funcionário</p>

        <form method="post" action="ex06_salario.php">
            <label>Salário bruto (R$):</label>
            <input type="text" name="txtsalario" placeholder="Ex: 3.500,00" required>

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
