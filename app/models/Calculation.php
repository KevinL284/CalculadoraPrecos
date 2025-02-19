<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../config/Database.php';

class Calculation {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    // Método para inserir um novo cálculo
    public function inserirCalculo($dados) {
        $sql = "INSERT INTO calculations (user_id, cost, sale_price, margin, profit, created_at) 
                VALUES (:user_id, :cost, :sale_price, :margin, :profit, NOW())";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':user_id'    => $dados['user_id'],
            ':cost'       => $dados['cost'],
            ':sale_price' => $dados['sale_price'],
            ':margin'     => number_format($dados['margin'], 2, '.', ''),  // Formata a margem para evitar problemas de casas decimais
            ':profit'     => number_format($dados['profit'], 2, '.', '')   // Formata o lucro
        ]);
    }

    // Método para listar cálculos do usuário logado
    public function listarCalculos($user_id) {
        $sql = "SELECT cost, sale_price, margin, profit, created_at 
                FROM calculations 
                WHERE user_id = :user_id 
                ORDER BY created_at DESC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
