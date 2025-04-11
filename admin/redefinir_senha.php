<?php
require_once '../config.php';

// Ativar erros para debug (remova em produção)
ini_set('display_errors', 1);
error_reporting(E_ALL);

$erro = '';
$sucesso = '';
$token = $_GET['token'] ?? ($_POST['token'] ?? '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nova_senha = trim($_POST['nova_senha'] ?? '');
    $confirmar_senha = trim($_POST['confirmar_senha'] ?? '');

    if ($nova_senha !== $confirmar_senha) {
        $erro = "As senhas não coincidem.";
    } elseif (strlen($nova_senha) < 6) {
        $erro = "A senha deve ter pelo menos 6 caracteres.";
    } elseif (empty($token)) {
        $erro = "Token ausente ou inválido.";
    } else {
        try {
            // Verifica se o token é válido e não expirou
            $stmt = $pdo->prepare("SELECT id FROM admins WHERE reset_token = :token AND reset_token_expires > NOW() LIMIT 1");
            $stmt->execute([':token' => $token]);

            if ($stmt->rowCount() === 1) {
                $admin = $stmt->fetch(PDO::FETCH_ASSOC);
                $hash = password_hash($nova_senha, PASSWORD_DEFAULT);

                // Atualiza a senha na coluna correta (password) e remove o token
                $update = $pdo->prepare("UPDATE admins SET password = :senha, reset_token = NULL, reset_token_expires = NULL WHERE id = :id");
                $executado = $update->execute([
                    ':senha' => $hash,
                    ':id' => $admin['id']
                ]);

                if ($executado) {
                    $sucesso = "Senha atualizada com sucesso. Você já pode fazer login.";
                } else {
                    $erro = "Erro ao atualizar a senha. Tente novamente.";
                }
            } else {
                $erro = "Token inválido ou expirado.";
            }
        } catch (PDOException $e) {
            $erro = "Erro de banco de dados: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Redefinir Senha | FELIXCAT</title>
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
                        <h3>Nova Senha</h3>
                    </div>

                    <?php if ($erro): ?>
                        <div class="alert alert-danger text-center"><?= htmlspecialchars($erro) ?></div>
                    <?php elseif ($sucesso): ?>
                        <div class="alert alert-success text-center"><?= htmlspecialchars($sucesso) ?></div>
                        <div class="text-center mt-3">
                            <a href="signin.php" class="btn btn-primary w-100 py-3">Ir para o Login</a>
                        </div>
                    <?php else: ?>
                        <form method="POST" action="redefinir_senha.php">
                            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                            <div class="form-floating mb-3">
                                <input type="password" name="nova_senha" class="form-control" id="nova_senha" placeholder="Nova Senha" required>
                                <label for="nova_senha">Nova Senha</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="confirmar_senha" class="form-control" id="confirmar_senha" placeholder="Confirmar Nova Senha" required>
                                <label for="confirmar_senha">Confirmar Nova Senha</label>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100">Atualizar Senha</button>
                        </form>
                    <?php endif; ?>
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
</body>
</html>
