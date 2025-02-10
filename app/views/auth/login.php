<?php
session_start();
require_once __DIR__ . '/../../../config/config.php'; // Inclui a conexão correta

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Verifica se a conexão com o banco está ativa
        if (!isset($pdo)) {
            throw new Exception("Erro na conexão com o banco de dados.");
        }

        // Consulta ao banco
        $stmt = $pdo->prepare("SELECT id, password FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashed_password = $row['password'];

            // Verifica a senha
            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $row['id'];
                header("Location: /app/views/calculator/index.php");
                exit();
            } else {
                $error = "Usuário ou senha inválidos.";
            }
        } else {
            $error = "Usuário ou senha inválidos.";
        }
    } catch (Exception $e) {
        $error = "Erro ao processar login: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    
    <form action="" method="post">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Entrar">
    </form>
</body>
</html>
