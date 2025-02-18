<?php
// Inicia a sessão
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

// Inicializa a variável de erro
$error = null;

// Processa o formulário quando ele é enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = "Por favor, preencha todos os campos.";
    } else {
        // Instancia o modelo User e chama o método de validação do login
        $userModel = new User();
        $result = $userModel->validateLogin($username, $password);
        
        // Se o retorno for um array, o login foi bem-sucedido
        if (is_array($result)) {
            $_SESSION['user_id'] = $result['id'];
            header("Location: /projetosPessoais/calculadoraPrecos/public/index.php");
            exit;
        } else {
            // Caso contrário, $result contém a mensagem de erro
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
    <link rel="stylesheet" href="/projetosPessoais/calculadoraPrecos/public/assets/css/register.css?v=1">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h2>Login</h2>

        <!-- Exibe mensagem de erro, se houver -->
        <?php if (!empty($error)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <!-- Formulário de login -->
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Usuário:</label>
                <input type="text" id="username" name="username" required placeholder="Digite seu usuário" value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
            </div>

            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required placeholder="Digite sua senha">
            </div>

            <div class="form-group">
                <input type="submit" value="Entrar" class="btn">
            </div>
        </form>

        <p>Não tem uma conta? <a href="/projetosPessoais/calculadoraPrecos/app/views/auth/register.php">Crie uma agora</a></p>
    </div>

    <!-- Exemplo de inclusão de um arquivo JS com parâmetro para evitar cache -->
    <script src="/projetosPessoais/calculadoraPrecos/public/assets/js/login.js?v=1"></script> <!-- aqui só vou incluir algumas pequenas validações -->
</body>
</html>
