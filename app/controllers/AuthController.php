<?php
require_once __DIR__ . '/../../config/Database.php';

class AuthController {

    private $db;

    // Construtor que recebe a instância do banco de dados
    public function __construct() {
        $this->db = Database::getInstance();  // Aqui pegamos a conexão com o banco
    }

    // Função para registrar um novo usuário
    public function register($username, $password) {
        try {
            // Primeiro, vamos verificar se o usuário já existe
            $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // Usuário já existe
                return "Usuário já existe!";
            }

            // Se o usuário não existe, vamos criar um novo
            $stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT)); // Criptografando a senha
            $stmt->execute();

            return "Usuário registrado com sucesso!";
        } catch (PDOException $e) {
            return "Erro ao registrar: " . $e->getMessage();
        }
    }

    // Função para fazer login
    public function login($username, $password) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            if ($stmt->rowCount() == 0) {
                return "Usuário não encontrado!";
            }

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificando se a senha está correta
            if (password_verify($password, $user['password'])) {
                // Login bem-sucedido, por exemplo, pode criar uma sessão
                session_start();
                $_SESSION['user_id'] = $user['id']; // Supondo que 'id' seja o identificador do usuário
                return "Login bem-sucedido!";
            } else {
                return "Senha incorreta!";
            }
        } catch (PDOException $e) {
            return "Erro ao fazer login: " . $e->getMessage();
        }
    }

    // Função para fazer logout
    public function logout() {
        session_start();
        session_destroy();
        return "Logout realizado com sucesso!";
    }
}

// Se este arquivo for acessado diretamente com ?action=logout, executa o logout e redireciona.
if (basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
    if (isset($_GET['action']) && $_GET['action'] === 'logout') {
        $auth = new AuthController();
        $auth->logout();
        header("Location: /projetosPessoais/calculadoraPrecos/app/views/auth/login.php");
        exit;
    }
}
?>
