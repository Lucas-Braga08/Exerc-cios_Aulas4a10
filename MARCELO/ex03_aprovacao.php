<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex03 – Aprovação</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
/*
 * EXERCÍCIO 03 – APROVAÇÃO / REPROVAÇÃO
 * Lógica:
 *   - Recebe 4 notas bimestrais (cada uma entre 1 e 10)
 *   - Calcula a média aritmética simples: (n1+n2+n3+n4) / 4
 *   - Média >= 5 → Aprovado | Média < 5 → Reprovado
 */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Lê as 4 notas e converte para float
    $n1 = (float) str_replace(",", ".", $_POST["txtn1"] ?? 0);
    $n2 = (float) str_replace(",", ".", $_POST["txtn2"] ?? 0);
    $n3 = (float) str_replace(",", ".", $_POST["txtn3"] ?? 0);
    $n4 = (float) str_replace(",", ".", $_POST["txtn4"] ?? 0);

    // Calcula a média aritmética simples
    $media = ($n1 + $n2 + $n3 + $n4) / 4;

    // Define situação com base na média
    if ($media >= 5) {
        $situacao = "Aprovado";
        $badge    = "badge-aprovado";
    } else {
        $situacao = "Reprovado";
        $badge    = "badge-reprovado";
    }

    ?>
    <div class="container-form">
        <h2>Aprovação</h2>
        <p class="subtitulo">Resultado do aluno</p>

        <form method="post" action="ex03_aprovacao.php">
            <label>1ª Nota bimestral:</label>
            <input type="text" name="txtn1" value="<?= $n1 ?>" required>

            <label>2ª Nota bimestral:</label>
            <input type="text" name="txtn2" value="<?= $n2 ?>" required>

            <label>3ª Nota bimestral:</label>
            <input type="text" name="txtn3" value="<?= $n3 ?>" required>

            <label>4ª Nota bimestral:</label>
            <input type="text" name="txtn4" value="<?= $n4 ?>" required>

            <div class="btn-row">
                <input type="submit" value="Calcular">
                <input type="reset"  value="Limpar">
            </div>
        </form>

        <div class="resultado-box">
            <h3>Resultado</h3>
            <p><strong>Notas:</strong> <?= $n1 ?> | <?= $n2 ?> | <?= $n3 ?> | <?= $n4 ?></p>

            <!-- Média formatada com 2 casas decimais -->
            <p class="valor-final">
                <strong>Média Final</strong>
                <?= number_format($media, 2, ",", ".") ?>
            </p>

            <!-- Badge colorido de situação -->
            <p><span class="badge <?= $badge ?>"><?= $icone ?> <?= $situacao ?></span></p>
        </div>

        <a href="index.php" class="btn-voltar">← Voltar ao início</a>
    </div>

    <?php

} else {
    ?>
    <div class="container-form">
        <h2>Aprovação</h2>
        <p class="subtitulo">Insira as 4 notas bimestrais (1 a 10)</p>

        <form method="post" action="ex03_aprovacao.php">
            <label>1ª Nota bimestral:</label>
            <input type="text" name="txtn1" placeholder="Ex: 7,5" required>

            <label>2ª Nota bimestral:</label>
            <input type="text" name="txtn2" placeholder="Ex: 6,0" required>

            <label>3ª Nota bimestral:</label>
            <input type="text" name="txtn3" placeholder="Ex: 8,0" required>

            <label>4ª Nota bimestral:</label>
            <input type="text" name="txtn4" placeholder="Ex: 5,5" required>

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
