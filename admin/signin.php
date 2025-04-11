<?php
session_start();
require_once '../config.php';

$erro = '';

// Processar login
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? '');
    $senha = trim($_POST["password"] ?? '');

    if (empty($email) || empty($senha)) {
        $erro = "Preencha todos os campos.";
    } else {
        try {
            $stmt = $pdo->prepare("SELECT id, password FROM admins WHERE email = :email LIMIT 1");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() === 1) {
                $admin = $stmt->fetch(PDO::FETCH_ASSOC);

                // Verifica a senha usando password_verify
                if (password_verify($senha, $admin['password'])) {
                    $_SESSION["admin_id"] = $admin['id'];
                    header("Location: dashboard.php");
                    exit;
                } else {
                    $erro = "Senha incorreta.";
                }
            } else {
                $erro = "E-mail não encontrado.";
            }
        } catch (PDOException $e) {
            $erro = "Erro ao tentar fazer login. Tente novamente.";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>LOGIN - Login Administrador</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="img/favicon.ico" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid position-relative bg-white d-flex p-0">
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Carregando...</span>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="/" class="">
                            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>FELIXCAT</h3>
                        </a>
                        <h3>Login</h3>
                    </div>

                    <?php if (!empty($erro)): ?>
                        <div class="alert alert-danger"><?php echo $erro; ?></div>
                    <?php endif; ?>

                    <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] === 'sucesso'): ?>
                        <div class="alert alert-success text-center">
                            Cadastro realizado com sucesso! Faça login para continuar.
                        </div>
                    <?php endif; ?>

                    <form action="signin.php" method="post">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="nome@exemplo.com" required>
                            <label for="email">E-mail</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
                            <label for="password">Senha</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="lembrar">
                                <label class="form-check-label" for="lembrar">Lembrar-me</label>
                            </div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalEsqueceu">Esqueceu a senha?</a>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Entrar</button>
                        <p class="text-center mb-0">Não tem uma conta? <a href="signup.php">Cadastrar</a></p>
                    </form>

                    <!-- Modal Esqueceu a Senha -->
                    <div class="modal fade" id="modalEsqueceu" tabindex="-1" aria-labelledby="modalEsqueceuLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form id="form-recuperar" method="POST" action="recuperar_senha.php">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEsqueceuLabel">Recuperar Senha</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="recuperarEmail" class="form-label">Digite seu e-mail cadastrado</label>
                                            <input type="email" class="form-control" id="recuperarEmail" name="email" required placeholder="nome@exemplo.com">
                                        </div>
                                        <input type="hidden" name="recaptcha_token" id="recaptcha_token">
                                        <div id="recaptcha_status" class="text-muted small mt-2">Validação reCAPTCHA será feita ao enviar.</div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" onclick="enviarComToken()">Enviar recuperação</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal End -->

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/chart/chart.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="js/main.js"></script>

<!-- reCAPTCHA v3 -->
<script src="https://www.google.com/recaptcha/api.js?render=6Lduig0rAAAAANJ1acavk3Ak6WQRYWGM0CNc9BB1"></script>
<script>
    function enviarComToken() {
        const status = document.getElementById("recaptcha_status");
        status.innerText = "Validando reCAPTCHA...";
        grecaptcha.ready(function () {
            grecaptcha.execute('6Lduig0rAAAAANJ1acavk3Ak6WQRYWGM0CNc9BB1', {action: 'recuperar'}).then(function (token) {
                document.getElementById('recaptcha_token').value = token;
                status.innerText = "reCAPTCHA validado. Enviando formulário...";
                document.getElementById('form-recuperar').submit();
            }).catch(function () {
                status.innerText = "Falha ao validar reCAPTCHA. Tente novamente.";
            });
        });
    }
</script>
</body>
</html>
