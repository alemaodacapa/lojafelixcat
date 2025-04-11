<?php 
$host = 'localhost';
$dbname = 'data_base';
$user = 'data_base_a';
$pass = 'senha';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

// Configurações de e-mail SMTP (Hostinger)
define('SMTP_HOST', 'smtp.hostinger.com');
define('SMTP_PORT', 465);
define('SMTP_USER', 'exemplo@site.comr');
define('SMTP_PASS', 'senha');
define('SMTP_FROM', 'exemplo@site.com');
define('SMTP_FROM_NAME', 'FelixCat Admin');

// reCAPTCHA v3 padrão
define('RECAPTCHA_SITE_KEY', '6Lduig0rAAAAANJ1acavk3Ak6WQRYWGM0CNc9BB1');
define('RECAPTCHA_SECRET_KEY', '6Lduig0rAAAAANjTRsYyUa-FDMl_BDT3xPb3cPJ6');
define('RECAPTCHA_EXPECTED_ACTION', 'recuperar'); // ou 'login' se for outra página
?>
