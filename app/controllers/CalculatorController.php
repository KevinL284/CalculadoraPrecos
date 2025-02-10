<?php 

require_once __DIR__ . '/../models/Calculation.php';

class CalculatorController{
    public function index(){

        session_start();
        if(!isset($_SESSION['user_id'])){
            header("Location> /public/auth/login.php");
            exit();
        }

        $calcModel = new calculation();
        $calculations = $calcModel->listarCalculos($_SESSION['user_id']);

        require_once __DIR__ . '/../views/calculator/dashboard.php';

    }

    public function calcular(){
        session_start();
        if(!isset($_SESSION['user_id'])){
            header("Location: /public/auth/login.php");
            exit();
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $dados = [
                'user_id' => $_SESSION['user_id'],
                'cost' => $_POST['cost'],
                'sale_price' => $_POST['sale_price'],
                'margin' => ($_POST['sale_price'] - $_POST['cost']) / $_POST['cost'] * 100,
                'profit' => $_POST['sale_price'] -$_POST['cost']

            ];

            $calcModel = new calculation();
            $calcModel->inserirCalculo($dados);
            header("Location: /public/index.php");
            exit();
        }
    }
}


?>