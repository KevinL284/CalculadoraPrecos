<?php 

require_once __DIR__ . '/../models/Calculation.php';

class CalculatorController {
    public function index() {
        session_start();
        
        if (!isset($_SESSION['user_id'])) {
            header("Location: /public/auth/login.php");
            exit();
        }

        $calcModel = new Calculation();
        $calculations = $calcModel->listarCalculos($_SESSION['user_id']);

        require_once __DIR__ . '/../views/calculator/dashboard.php';
    }

    public function calcular() {
        session_start();
        
        if (!isset($_SESSION['user_id'])) {
            header("Location: /public/auth/login.php");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Pegando os valores do formulário
            $cost = floatval($_POST['cost']);
            $sale_price = floatval($_POST['sale_price']);
            
            // Calculando a margem e o lucro bruto
            $margin = ($cost > 0) ? (($sale_price - $cost) / $cost) * 100 : 0;
            $profit = $sale_price - $cost;

            // Armazenando os resultados na sessão para exibição na view
            $_SESSION['resultado_calculo'] = [
                'margin' => $margin,
                'profit' => $profit
            ];

            // Salvando no banco de dados
            $calcModel = new Calculation();
            $calcModel->inserirCalculo([
                'user_id' => $_SESSION['user_id'],
                'cost' => $cost,
                'sale_price' => $sale_price,
                'margin' => $margin,
                'profit' => $profit
            ]);

            // Redirecionando de volta para a página inicial para exibir os resultados
            header("Location: ../views/calculator/index.php");
            exit();
        }
    }
}

// Definindo qual ação chamar com base no parâmetro "action"
$action = $_GET['action'] ?? null;
$controller = new CalculatorController();

if ($action === "calcular") {
    $controller->calcular();
} else {
    $controller->index();
}
