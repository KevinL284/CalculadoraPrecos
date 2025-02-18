<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora de Preços - Home</title>
  <link rel="stylesheet" href="assets/css/style.css?v=1">

</head>
<body>

  <!-- Cabeçalho -->
  <header>
    <div class="container">
      <h1>Calculadora de Preços</h1>
      <p>Simule preços, analise custos e descubra seu lucro ou margem de prejuízo</p>
    </div>
  </header>

  <!-- Seção Hero (explicação do projeto) -->
  <section class="hero">
    <div class="container">
      <h2>Bem-vindo ao seu simulador de preços</h2>
      <p>
        Este projeto foi desenvolvido do zero usando PHP, MySQL, JavaScript, HTML e CSS,
        seguindo a arquitetura MVC. A ideia é oferecer uma ferramenta onde os clientes
        possam fazer simulações de preços. Cada cliente poderá parametrizar seu banco de dados,
        inserir campos-chave para definir os custos sobre a venda e, ao final, calcular o lucro,
        o prejuízo e a porcentagem da margem de lucro.
      </p>
      <p>
        Com uma interface simples e intuitiva, você poderá gerenciar suas simulações e ter
        um histórico completo dos cálculos realizados.
      </p>
    </div>
  </section>

  <!-- Área de Ações -->
  <section class="actions">
    <div class="container">
      <?php if (isset($_SESSION['user_id'])): ?>
        <a class="btn" href="../app/views/calculator/index.php">Nova Simulação</a>
        <a class="btn" href="../app/views/calculator/dashboard.php">Histórico</a>
        <a class="btn" href="../app/controllers/AuthController.php?action=logout">Sair</a>
      <?php else: ?>
        <a class="btn" href="../app/views/auth/login.php">Login</a>
        <a class="btn" href="../app/views/auth/register.php">Criar Conta</a>
      <?php endif; ?>
    </div>
  </section>

  <!-- Rodapé -->
  <footer>
    <div class="container">
      <p>&copy; <?php echo date("Y"); ?> Calculadora de Preços. Todos os direitos reservados.</p>
    </div>
  </footer>

</body>
</html>