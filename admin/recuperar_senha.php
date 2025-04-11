<?php
// Exibição de erros (remover em produção)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../config.php';
require '../lib/PHPMailer/src/Exception.php';
require '../lib/PHPMailer/src/PHPMailer.php';
require '../lib/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $recaptcha_token = $_POST['recaptcha_token'] ?? '';

    // Verifica reCAPTCHA
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = [
        'secret' => '6Lduig0rAAAAANjTRsYyUa-FDMl_BDT3xPb3cPJ6',
        'response' => $recaptcha_token
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ],
    ];

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $recaptcha = json_decode($result, true);

    if (
        !$recaptcha['success'] ||
        $recaptcha['score'] < 0.3 ||
        $recaptcha['action'] !== 'recuperar'
    ) {
        header("Location: signin.php?erro=captcha");
        exit;
    }

    // Verifica se o e-mail existe
    $stmt = $pdo->prepare("SELECT id FROM admins WHERE email = :email LIMIT 1");
    $stmt->execute([':email' => $email]);

    if ($stmt->rowCount() === 1) {
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        $token = bin2hex(random_bytes(32));
        $expira_em = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Atualiza token no banco
        $update = $pdo->prepare("UPDATE admins SET reset_token = :token, reset_token_expires = :expira WHERE id = :id");
        $update->execute([
            ':token' => $token,
            ':expira' => $expira_em,
            ':id' => $admin['id']
        ]);

        // Enviar e-mail com o link
        $link = "https://lojafelixcat.com.br/admin/redefinir_senha.php?token=$token";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = SMTP_HOST;
            $mail->SMTPAuth = true;
            $mail->Username = SMTP_USER;
            $mail->Password = SMTP_PASS;
            $mail->SMTPSecure = 'ssl';
            $mail->Port = SMTP_PORT;
            $mail->CharSet = 'UTF-8'; // <- Suporte a acentuação

            $mail->setFrom(SMTP_FROM, SMTP_FROM_NAME);
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Recuperação de Senha - FelixCat';
            $mail->Body = "
                <h3>Olá,</h3>
                <p>Você solicitou a redefinição de senha para o painel administrativo FelixCat.</p>
                <p><a href='$link'>Clique aqui para redefinir sua senha</a></p>
                <p>Este link expira em 1 hora.</p>
                <hr>
                <p style='color:#888;font-size:12px;'>⚠️ Se você não solicitou isso, ignore este e-mail.</p>
            ";

            $mail->send();
            header("Location: signin.php?recuperacao=sucesso");
            exit;
        } catch (Exception $e) {
            header("Location: signin.php?erro=email");
            exit;
        }
    } else {
        header("Location: signin.php?erro=email_inexistente");
        exit;
    }
}

// Página HTML exibida caso o acesso seja direto ou GET inválido
$token = $_GET['token'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Redefinir Senha - FelixCat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../img/favicon.ico" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid position-relative bg-white d-flex p-0">
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3 shadow-sm">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="/" class="text-decoration-none">
                            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>FELIXCAT</h3>
                        </a>
                        <h3>Nova Senha</h3>
                    </div>

                    <?php if (isset($_GET['erro']) && $_GET['erro'] === 'invalido'): ?>
                        <div class="alert alert-danger text-center">Erro ao redefinir a senha. Tente novamente.</div>
                    <?php endif; ?>

                    <form action="salvar_nova_senha.php" method="POST">
                        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="senha1" name="senha" placeholder="Nova senha" required>
                            <label for="senha1">Nova senha</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="senha2" name="confirmar_senha" placeholder="Confirmar nova senha" required>
                            <label for="senha2">Confirmar nova senha</label>
                        </div>

                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">🔐 Redefinir Senha</button>
                        <p class="text-center mb-0"><a href="signin.php">← Voltar ao login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../lib/chart/chart.min.js"></script>
<script src="../lib/easing/easing.min.js"></script>
<script src="../lib/waypoints/waypoints.min.js"></script>
<script src="../lib/owlcarousel/owl.carousel.min.js"></script>
<script src="../lib/tempusdominus/js/moment.min.js"></script>
<script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="../js/main.js"></script>
</body>
</html>
