<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex01 – Tabuada</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
/*
 * EXERCÍCIO 01 – TABUADA
 * Lógica: recebe um número via POST e exibe a tabuada de 1 a 10
 * usando um laço for.
 */

// Verifica se o formulário foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Lê e converte o número enviado para inteiro
    $numero = (int) ($_POST["txtnumero"] ?? 0);

    // Exibe o formulário novamente acima do resultado
    ?>
    <div class="container-form">
        <h2>Tabuada</h2>
        <p class="subtitulo">Veja a tabuada do número escolhido</p>

        <form method="post" action="ex01_tabuada.php">
            <label>Número:</label>
            <!-- value mantém o número digitado no campo após o envio -->
            <input type="number" name="txtnumero" value="<?= $numero ?>" required>
            <div class="btn-row">
                <input type="submit" value="Calcular">
                <input type="reset"  value="Limpar">
            </div>
        </form>

        <!-- Caixa de resultado com animação -->
        <div class="resultado-box">
            <h3>Tabuada do <?= $numero ?></h3>

            <!-- Laço de 1 a 10 para montar cada linha da tabuada -->
            <div class="tabuada-grid">
                <?php for ($i = 1; $i <= 10; $i++): ?>
                    <div class="tabuada-item">
                        <?= $numero ?> × <?= $i ?> = <strong><?= $numero * $i ?></strong>
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        <a href="index.php" class="btn-voltar">← Voltar ao início</a>
    </div>

    <?php

} else {
    // Nenhum POST recebido → exibe apenas o formulário
    ?>
    <div class="container-form">
        <h2>Tabuada</h2>
        <p class="subtitulo">Digite um número para ver a tabuada completa</p>

        <form method="post" action="ex01_tabuada.php">
            <label>Número:</label>
            <input type="number" name="txtnumero" required>
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
