<?php
session_start();

// Inclui os arquivos de configuração e o modelo de usuário
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../config/Database.php';
require_once __DIR__ . '/../../models/User.php';

// Se o usuário já estiver logado, redireciona para a página principal
if (isset($_SESSION['user_id'])) {
    header("Location: /projetosPessoais/calculadoraPrecos/public/index.php");
    exit;
}

$error = null;
$success = null;

// Processa o formulário de registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($email) || empty($password)) {
        $error = "Por favor, preencha todos os campos.";
    } else {
        $user = new User();
        $result = $user->create($username, $email, $password);
        
        // Se o usuário for criado com sucesso, redireciona para a página de login
        if ($result === "Usuário criado com sucesso!") {
            header("Location: /projetosPessoais/calculadoraPrecos/app/views/auth/login.php?registered=1");
            exit;
        } else {
            $error = $result;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link para o CSS com cache busting -->
    <link rel="stylesheet" href="/projetosPessoais/calculadoraPrecos/public/assets/css/register.css?v=1">
    <title>Registro</title>
</head>
<body>
    <div class="container">
        <h2>Registro</h2>

        <!-- Exibe mensagens de erro ou sucesso -->
        <?php if (!empty($error)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <p style="color: green;"><?php echo htmlspecialchars($success); ?></p>
        <?php endif; ?>

        <!-- Formulário de registro -->
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Usuário:</label>
                <input type="text" id="username" name="username" required placeholder="Digite seu usuário" value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required placeholder="Digite seu email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
            </div>

            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required placeholder="Digite sua senha">
            </div>

            <div class="form-group">
                <input type="submit" value="Registrar" class="btn">
            </div>
        </form>

        <p>Já tem uma conta? <a href="<?php echo '/projetosPessoais/calculadoraPrecos/app/views/auth/login.php'; ?>">Faça login aqui</a></p>
    </div>

    <!-- Exemplo de inclusão de um arquivo JS com cache busting -->
    <script src="/projetosPessoais/calculadoraPrecos/public/assets/js/register.js?v=1"></script> <!-- mesma ideia do login.js-->
</body>
</html>
