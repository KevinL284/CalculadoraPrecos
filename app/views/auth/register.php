<?php
// Inicia a sessão
session_start();

// Inclui o arquivo de configuração
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../app/Database.php';


// Obtém a instância do PDO
$pdo = Database::getInstance();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Captura os dados do formulário
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Valida os dados (aqui você pode adicionar mais validações, como verificar se o e-mail é válido)
    if (empty($username) || empty($email) || empty($password)) {
        $error = "Todos os campos são obrigatórios!";
    } else {
        // Verifica se o nome de usuário ou o e-mail já existem
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = :username OR email = :email");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $error = "Nome de usuário ou e-mail já existe!";
        } else {
            // Criptografa a senha
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Insere o novo usuário no banco de dados
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);
            
            if ($stmt->execute()) {
                // Redireciona para a página de login após o cadastro
                header("Location: login.php");
                exit;
            } else {
                $error = "Erro ao registrar o usuário.";
            }
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
    <title>Criar Conta - Calculadora de Preços</title>
</head>
<body>

<h2>Criar Conta</h2>

<?php if (isset($error)): ?>
    <div style="color: red;">
        <?= $error; ?>
    </div>
<?php endif; ?>

<form action="" method="POST">
    <label for="username">Nome de usuário:</label>
    <input type="text" id="username" name="username" required><br><br>
    
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" required><br><br>
    
    <label for="password">Senha:</label>
    <input type="password" id="password" name="password" required><br><br>
    
    <input type="submit" value="Criar Conta">
</form>

<p>Já tem uma conta? <a href="login.php">Faça login</a></p>

</body>
</html>
