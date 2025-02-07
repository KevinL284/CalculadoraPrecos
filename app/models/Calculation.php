<?php
require_once __DIR__ . '/../../config/config.php';

class calculation{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance();
    }
    public function inserirCalculo($dados){
        $sql = "INSERT INTO calculo (/*Os campos que vamo fazer ainda*/) VALUES (/*Os valores que vamo fazer ainda*/)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':/*Os campos que vamo fazer ainda*/', $dados['/*Os campos que vamo fazer ainda*/']);
        $stmt->bindParam(':/*Os campos que vamo fazer ainda*/', $dados['/*Os campos que vamo fazer ainda*/']);
        return $stmt->execute();
    }   
}

?>