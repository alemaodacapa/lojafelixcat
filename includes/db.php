<?php
// --------------------
// CONFIGURAÇÃO BÁSICA
// --------------------
$host = 'localhost';
$dbname = 'data_base';
$user = 'data_base_a';
$pass = 'senha';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

// --------------------
// CONFIGURAÇÕES SMTP
// --------------------
define('SMTP_HOST', 'smtp.hostinger.com');
define('SMTP_PORT', 465);
define('SMTP_USER', 'exemplo@site.com');
define('SMTP_PASS', 'senha');
define('SMTP_FROM', 'exemplo@site.com');
define('SMTP_FROM_NAME', 'FelixCat Admin');

// --------------------
// reCAPTCHA V3
// --------------------
define('RECAPTCHA_SITE_KEY', '6Lduig0rAAAAANJ1acavk3Ak6WQRYWGM0CNc9BB1');
define('RECAPTCHA_SECRET_KEY', '6Lduig0rAAAAANjTRsYyUa-FDMl_BDT3xPb3cPJ6');
define('RECAPTCHA_EXPECTED_ACTION', 'recuperar'); // ou 'login'

// --------------------
// FUSO HORÁRIO GLOBAL
// --------------------
date_default_timezone_set('America/Sao_Paulo');

// --------------------
// FUNÇÕES GERAIS
// --------------------

// Carrega variáveis do site diretamente da tabela `configuracoes`
function getSiteConfig($pdo) {
    $sql = "SELECT * FROM configuracoes LIMIT 1";
    $stmt = $pdo->query($sql);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Uso: $config = getSiteConfig($pdo); echo $config['site_name'];
?>
