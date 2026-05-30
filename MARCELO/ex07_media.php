<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex07 – Média e Situação</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
/*
 * EXERCÍCIO 07 – MÉDIA E SITUAÇÃO
 * Lógica:
 *   - Recebe 4 notas
 *   - Média aritmética: (n1+n2+n3+n4) / 4
 *   - MA >= 6         → "Aprovado"
 *   - MA >= 3 e < 6   → "Exame"
 *   - MA < 3          → "Retido"
 */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Lê as 4 notas convertendo vírgula em ponto
    $n1 = (float) str_replace(",", ".", $_POST["txtn1"] ?? 0);
    $n2 = (float) str_replace(",", ".", $_POST["txtn2"] ?? 0);
    $n3 = (float) str_replace(",", ".", $_POST["txtn3"] ?? 0);
    $n4 = (float) str_replace(",", ".", $_POST["txtn4"] ?? 0);

    // Calcula a média aritmética
    $media = ($n1 + $n2 + $n3 + $n4) / 4;

    // Estrutura if/elseif/else para determinar a situação
    if ($media >= 6) {
        $situacao = "Aprovado";
        $badge    = "badge-aprovado";
    } elseif ($media >= 3) {
        $situacao = "Exame";
        $badge    = "badge-exame";
    } else {
        $situacao = "Retido";
        $badge    = "badge-retido";
    }

    ?>
    <div class="container-form">
        <h2>Média e Situação</h2>
        <p class="subtitulo">Resultado do aluno</p>

        <form method="post" action="ex07_media.php">
            <label>1ª Nota:</label>
            <input type="text" name="txtn1" value="<?= $n1 ?>" required>

            <label>2ª Nota:</label>
            <input type="text" name="txtn2" value="<?= $n2 ?>" required>

            <label>3ª Nota:</label>
            <input type="text" name="txtn3" value="<?= $n3 ?>" required>

            <label>4ª Nota:</label>
            <input type="text" name="txtn4" value="<?= $n4 ?>" required>

            <div class="btn-row">
                <input type="submit" value="Calcular">
                <input type="reset"  value="Limpar">
            </div>
        </form>

        <div class="resultado-box">
            <h3>Resultado</h3>
            <p><strong>Notas:</strong> <?= $n1 ?> | <?= $n2 ?> | <?= $n3 ?> | <?= $n4 ?></p>

            <!-- Média aritmética em destaque -->
            <p class="valor-final">
                <strong>Média Aritmética</strong>
                <?= number_format($media, 2, ",", ".") ?>
            </p>

            <!-- Badge colorido conforme situação -->
            <p><span class="badge <?= $badge ?>"><?= $icone ?> <?= $situacao ?></span></p>
        </div>

        <a href="index.php" class="btn-voltar">← Voltar ao início</a>
    </div>

    <?php

} else {
    ?>
    <div class="container-form">
        <h2>📊 Média e Situação</h2>
        <p class="subtitulo">Insira as 4 notas para calcular a média</p>

        <form method="post" action="ex07_media.php">
            <label>1ª Nota:</label>
            <input type="text" name="txtn1" placeholder="Ex: 7" required>

            <label>2ª Nota:</label>
            <input type="text" name="txtn2" placeholder="Ex: 5" required>

            <label>3ª Nota:</label>
            <input type="text" name="txtn3" placeholder="Ex: 8" required>

            <label>4ª Nota:</label>
            <input type="text" name="txtn4" placeholder="Ex: 6" required>

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
