<?php
$msg_erro = "";
$msg_sucesso = "";

require_once 'admin/config.inc.php'; 

if (isset($conexao) && $conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['Nome'] ?? '';
    $email = $_POST['Email'] ?? '';
    $numero = $_POST['numero'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $senha = $_POST['Senha'] ?? '';
  
    if (empty($senha)) {
        $msg_erro = "A senha é obrigatória.";
    } else {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, email, numero, cpf, senha) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sssss", $nome, $email, $numero, $cpf, $senhaHash); 

            if ($stmt->execute()) {
                $msg_sucesso = "Cadastro realizado com sucesso! <a href='login.php'>Faça Login</a>";
            } else {
                $msg_erro = "Erro ao cadastrar. Tente novamente ou verifique se o E-mail/CPF já está em uso.";
            }
            $stmt->close();
        } else {
            $msg_erro = "Erro na preparação da query: " . $conexao->error;
        }
    }
    if (isset($conexao)) {
        $conexao->close();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image" href="assets/images/logo.jpeg" />
    <title>Cadastro</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/cadastro.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            text-align: center;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-success a {
            font-weight: bold;
            color: #155724;
            text-decoration: underline;
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

    <main class="main_cadastro">
        <section class="form_container">
            <h1>Cadastrar</h1>

            <?php if (!empty($msg_erro)): ?>
                <div class="alert alert-danger"><?php echo $msg_erro; ?></div>
            <?php endif; ?>

            <?php if (!empty($msg_sucesso)): ?>
                <div class="alert alert-success"><?php echo $msg_sucesso; ?></div>
            <?php endif; ?>

            <form method="post" action="">
                <label for="name">Nome</label>
                <input type="text" name="Nome" required placeholder="Nome Sobrenome" />

                <label for="email">Email</label>
                <input type="email" name="Email" required placeholder="nome@email.com" />

                <label for="number">Número</label>
                <input type="text" name="numero" required placeholder="(00)00000-0000" />

                <label for="cpf">CPF</label>
                <input type="text" name="cpf" required placeholder="000.000.000-00" />

                <label for="password">Senha</label>
                <input type="password" name="Senha" required placeholder="******" />

                <div class="termos-container">
                    <input type="checkbox" id="check" name="checkbox" required checked />
                    <label for="check">Aceito os termos</label>
                </div>

                <div class="cadastro_btn">
                    <button type="button" class="btn_voltar" onclick="location.href='index.php'">Voltar</button>
                    <button type="submit">Cadastrar</button>
                </div>
            </form>
        </section> </main>

    <footer>
        <div class="footer_bottom">
            <p>&copy; BarbaCar - 2025 | A sua revenda em Sobrado/PB</p>
            <a href="https://www.planalto.gov.br/ccivil_03/_ato2015-2018/2018/lei/l13709.htm">LGPD</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>