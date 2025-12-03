<?php
session_start();

$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $host = 'localhost';
  $usuario_db = 'root';
  $senha_db = '';
  $banco = 'barbacar';

  $conn = new mysqli($host, $usuario_db, $senha_db, $banco);

  if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
  }

  $email = $_POST['email'];
  $senha = $_POST['Senha'];

  $sql = "SELECT id, nome, email, senha FROM usuarios WHERE email = ?";
  $stmt = $conn->prepare($sql);

  if ($stmt) {
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
      $usuario = $result->fetch_assoc();

      if (password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];

        header("Location: admin/index.php");
        exit;
      } else {
        $erro = "Senha incorreta!";
      }
    } else {
      $erro = "Email não encontrado!";
    }
    $stmt->close();
  } else {
    $erro = "Erro no banco de dados.";
  }
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image" href="assets/images/logo.jpeg" />
  <title>Login</title>
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/login.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    .msg-erro {
      color: #dc3545;
      background-color: #f8d7da;
      border: 1px solid #f5c6cb;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 5px;
      text-align: center;
    }
  </style>
</head>

<body>
  <header class="header">
    <nav>
      <a href="index.php" class="logo">
        <img src="assets/images/logo_nome.png" alt="Logo BarbaCar" />
      </a>
      <div class="toggle" id="menu-toggle">☰</div>
      <div class="menu">
        <a href="products.php">Veículos</a>
        <a href="login.php">Login</a>
      </div>
    </nav>
  </header>

  <main class="main_login">
    <section id="login_Container">
      <h1>Login</h1>

      <?php if (!empty($erro)): ?>
        <div class="msg-erro">
          <?php echo $erro; ?>
        </div>
      <?php endif; ?>

      <form action="" method="post">
        <div class="sub_form">
          <label for="email">E-mail</label>
          <input type="email" name="email" required placeholder="seu@email.com" />
        </div>

        <div class="sub_form">
          <label for="password">Senha</label>
          <input type="password" name="Senha" required placeholder="******" />
        </div>

        <button type="submit" class="btn_entrar">Entrar</button>
      </form>

      <div class="login_links">
        <a href="forgot.php">Esqueci a senha</a>
        <a href="cadastro.php">Cadastrar</a>
      </div>
    </section>
  </main>

  <footer>
    <div class="footer_bottom">
      <p>&COPY; BarbaCar - 2025 | A sua revenda em Sobrado/PB</p>
      <a href="https://www.planalto.gov.br/ccivil_03/_ato2015-2018/2018/lei/l13709.htm">LGPD</a>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/app.js"></script>
</body>

</html>