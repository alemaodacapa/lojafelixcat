<?php
// Ativa exibição de erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../config.php'; // Conexão com o banco ($pdo)
require '../lib/PHPMailer/PHPMailerAutoload.php'; // Ajuste o caminho conforme necessário

// Verifica se foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'erro', 'mensagem' => 'E-mail inválido.']);
        exit;
    }

    // Verifica se o e-mail existe no banco
    $stmt = $pdo->prepare("SELECT id FROM admins WHERE email = :email LIMIT 1");
    $stmt->execute([':email' => $email]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$admin) {
        echo json_encode(['status' => 'erro', 'mensagem' => 'E-mail não encontrado.']);
        exit;
    }

    // Gera token e data de expiração
    $token = bin2hex(random_bytes(32));
    $expira = date('Y-m-d H:i:s', strtotime('+1 hour'));

    // Atualiza no banco
    $update = $pdo->prepare("UPDATE admins SET reset_token = :token, reset_token_expires = :expira WHERE id = :id");
    $update->execute([
        ':token' => $token,
        ':expira' => $expira,
        ':id' => $admin['id']
    ]);

    // Link para redefinição
    $link = "https://lojafelixcat.com.br/admin/redefinir_senha.php?token=$token";

    // Prepara o e-mail
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'seuemail@seudominio.com.br'; // substitua pelo seu e-mail real
    $mail->Password = 'sua_senha'; // substitua pela sua senha de e-mail
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('seuemail@seudominio.com.br', 'FelixCat Admin');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Redefinição de Senha - FelixCat';
    $mail->Body = "
        <h2>Redefinição de Senha</h2>
        <p>Olá, recebemos uma solicitação para redefinir sua senha. Clique no botão abaixo para criar uma nova senha:</p>
        <p style='margin:20px 0;'><a href='$link' style='padding: 10px 20px; background-color: #0d6efd; color: white; text-decoration: none; border-radius: 5px;'>Redefinir Senha</a></p>
        <p>Este link expira em 1 hora.</p>
        <p>Se você não solicitou, ignore este e-mail.</p>
    ";

    if ($mail->send()) {
        echo json_encode(['status' => 'sucesso', 'mensagem' => 'E-mail de recuperação enviado com sucesso!']);
    } else {
        echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao enviar e-mail.']);
    }
}
?>
