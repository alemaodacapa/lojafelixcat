<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once '../config.php';

$erro = "";
$sucesso = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['password'] ?? '';

    if (!empty($username) && !empty($email) && !empty($senha)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erro = "E-mail inválido.";
        } else {
            try {
                $stmt = $pdo->prepare("SELECT COUNT(*) FROM admins WHERE email = :email");
                $stmt->execute(['email' => $email]);
                $emailExistente = $stmt->fetchColumn();

                if ($emailExistente) {
                    $erro = "Este e-mail já está cadastrado.";
                } else {
                    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO admins (username, email, password) VALUES (:username, :email, :password)");
$stmt->bindParam(':username', $username);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $senhaCriptografada);

                    if ($stmt->execute()) {
                        header('Location: signin.php?cadastro=sucesso');
                        exit;
                    } else {
                        $erro = "Erro ao cadastrar. Tente novamente.";
                    }
                }
            } catch (PDOException $e) {
                $erro = "Erro no banco de dados: " . $e->getMessage();
            }
        }
    } else {
        $erro = "Preencha todos os campos.";
    }
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Cadastrar - Painel Administrativo</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Ícones e Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Cadastro Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.php">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>CADASTRO</h3>
                            </a>
                            <h3>Cadastrar</h3>
                        </div>

                        <?php if (isset($erro)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $erro ?>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="signup.php">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="username" id="floatingUsername" placeholder="Seu nome de usuário" required>
                                <label for="floatingUsername">Usuário</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" id="floatingEmail" placeholder="nome@exemplo.com" required>
                                <label for="floatingEmail">Email</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Senha" required>
                                <label for="floatingPassword">Senha</label>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Cadastrar</button>
                        </form>
                        <p class="text-center mb-0">Já tem uma conta? <a href="signin.php">Entrar</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cadastro End -->
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
