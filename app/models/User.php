<?php

require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../../config/config.php';

class User {

    private $db;
    private $table = "users";  // Nome da tabela de usuários no banco

    public $id;
    public $username;
    public $email;
    public $password;
    public $created_at;

    // Construtor que recebe a instância do banco de dados
    public function __construct() {
        $this->db = Database::getInstance();  // Aqui pegamos a conexão com o banco
    }

    // Função para criar um novo usuário
    public function create($username, $email, $password) {
        try {
            // Verifica se o usuário já existe
            $stmt = $this->db->prepare("SELECT * FROM " . $this->table . " WHERE username = :username OR email = :email");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return "Usuário ou email já existe!";
            }

            // Se o usuário não existir, insere um novo
            $stmt = $this->db->prepare("INSERT INTO " . $this->table . " (username, email, password) VALUES (:username, :email, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT)); // Criptografando a senha
            $stmt->execute();

            return "Usuário criado com sucesso!";
        } catch (PDOException $e) {
            return "Erro ao criar usuário: " . $e->getMessage();
        }
    }

    // Função para verificar se o usuário existe no banco
    public function getByUsername($username) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM " . $this->table . " WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            if ($stmt->rowCount() == 0) {
                return null;  // Usuário não encontrado
            }

            return $stmt->fetch(PDO::FETCH_ASSOC);  // Retorna o usuário encontrado
        } catch (PDOException $e) {
            return "Erro ao buscar usuário: " . $e->getMessage();
        }
    }

    // Função para verificar as credenciais de login (nome de usuário e senha)
    public function validateLogin($username, $password) {
        $user = $this->getByUsername($username);

        if ($user) {
            // Verificando se a senha fornecida corresponde à senha armazenada
            if (password_verify($password, $user['password'])) {
                return $user;  // Senha correta, retorna os dados do usuário
            } else {
                return "Senha incorreta!";
            }
        }

        return "Usuário não encontrado!";
    }
}

?>
