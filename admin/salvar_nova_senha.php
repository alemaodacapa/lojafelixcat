<?php
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $confirmar = $_POST['confirmar_senha'] ?? '';

    if (empty($token) || empty($senha) || $senha !== $confirmar) {
        header("Location: redefinir_senha.php?token=$token&erro=invalido");
        exit;
    }

    $stmt = $pdo->prepare("SELECT id FROM admins WHERE reset_token = :token AND reset_token_expires > NOW() LIMIT 1");
    $stmt->execute([':token' => $token]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin) {
        $nova_senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        $update = $pdo->prepare("UPDATE admins SET senha = :senha, reset_token = NULL, reset_token_expires = NULL WHERE id = :id");
        $update->execute([
            ':senha' => $nova_senha_hash,
            ':id' => $admin['id']
        ]);

        header("Location: signin.php?senha=atualizada");
        exit;
    } else {
        header("Location: redefinir_senha.php?token=$token&erro=invalido");
        exit;
    }
}
?>
