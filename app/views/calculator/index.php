<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Preços</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        label {
            display: inline-block;
            width: 150px;
        }
        input[type="number"] {
            width: 200px;
        }
    </style>
</head>
<body>

    <h2>Bem-vindo à Calculadora de Preços</h2>
    <p>Aqui você pode simular valores e calcular custos, margem de lucro, etc.</p>

    <form action="process_calculation.php" method="post">
        <label for="cost">Custo da Operação:</label>
        <input type="number" id="cost" name="cost" step="0.01" required><br><br>
        
        <label for="sale_price">Preço de Venda:</label>
        <input type="number" id="sale_price" name="sale_price" step="0.01" required><br><br>
        
        <label for="profit_margin">Margem de Lucro (%):</label>
        <input type="number" id="profit_margin" name="profit_margin" step="0.01"><br><br>
        
        <input type="submit" value="Calcular">
    </form>

    <p><a href="dashboard.php">Ver Histórico de Cálculos</a></p>
    <p><a href="">Sair</a></p> <!--vou por caminho pra index.php -->
    
</body>
</html>
