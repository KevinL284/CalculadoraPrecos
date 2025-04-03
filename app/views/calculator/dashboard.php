<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /public/auth/login.php");
    exit();
}

require_once __DIR__ . '/../../models/Calculation.php';
$calcModel = new Calculation();
$calculations = $calcModel->listarCalculos($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de Cálculos</title>
    <link rel="stylesheet" href="../../public/assets/css/dashboard.css?v=1">
</head>
<body>

<h2>Histórico de Cálculos</h2>
<table>
    <tr>
        <th>Custo</th>
        <th>Preço de Venda</th>
        <th>Margem (%)</th>
        <th>Lucro</th>
        <th>Data</th>
    </tr>
    <?php foreach ($calculations as $calc): ?>
    <tr>
        <td>R$ <?= number_format($calc['cost'], 2, ',', '.') ?></td>
        <td>R$ <?= number_format($calc['sale_price'], 2, ',', '.') ?></td>
        <td><?= number_format($calc['margin'], 2, ',', '.') ?>%</td>
        <td>R$ <?= number_format($calc['profit'], 2, ',', '.') ?></td>
        <td><?= date("d/m/Y H:i", strtotime($calc['created_at'])) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<div class="button-container">
    <a href="../calculator/index.php">Nova Simulação</a>
    <a href="../public/index.php">Voltar</a>
</div>

</body>
</html>
