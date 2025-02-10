<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Calculadora de Preços</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<h1>Bem-vindo à Calculadora de Preços</h1>

<?php if (isset($_SESSION['user_id'])): ?>
    <a href="../app/views/calculator/index.php">Nova Simulação</a>
    <a href="../app/views/calculator/dashboard.php">Histórico</a>
    <a href="../app/controllers/AuthController.php?action=logout">Sair</a>
<?php else: ?>
    <a href="../app/views/auth/login.php">Login</a>
    <a href="../app/views/auth/register.php">Criar Conta</a>
<?php endif; ?>

</body>
</html>
