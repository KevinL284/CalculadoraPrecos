<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

$resultado = null;

// Se houver um cálculo realizado, recuperamos da sessão
if (isset($_SESSION['resultado_calculo'])) {
    $resultado = $_SESSION['resultado_calculo'];
    unset($_SESSION['resultado_calculo']); // Limpamos para não exibir novamente em outra requisição
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Preços</title>
    <link rel="stylesheet" href="/projetosPessoais/calculadoraPrecos/public/assets/css/calculator.css?v=1">
</head>
<body>
    <header>
        <h1>Calculadora de Preços</h1>
    </header>
    
    <div class="container">
        <section class="hero">
            <h2>Bem-vindo à Calculadora de Preços</h2>
            <p>Aqui você pode simular valores e calcular custos, margem de lucro, etc.</p>
        </section>
        
        <section class="actions">
            <form action="../../controllers/CalculatorController.php?action=calcular" method="post">
                <label for="cost">Custo da Operação:</label>
                <input type="number" id="cost" name="cost" step="0.01" required><br><br>

                <label for="sale_price">Preço de Venda:</label>
                <input type="number" id="sale_price" name="sale_price" step="0.01" required><br><br>

                <input type="submit" class="btn" value="Calcular">
            </form>

            <?php if ($resultado): ?>
                <div class="result">
                    <h3>Resultado do Cálculo:</h3>
                    <p>Margem de Lucro: <strong><?= number_format($resultado['margin'], 2, ',', '.') ?>%</strong></p>
                    <p>Lucro Bruto: <strong>R$ <?= number_format($resultado['profit'], 2, ',', '.') ?></strong></p>
                </div>
            <?php endif; ?>

            <p><a href="dashboard.php" class="btn">Ver Histórico de Cálculos</a></p>
            <p><a class="btn" href="../../controllers/AuthController.php?action=logout">Sair</a></p>
        </section>
    </div>
    
    <footer>
        <p>&copy; 2025 Calculadora de Preços. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
