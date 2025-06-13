<?php
$host = 'seven-gardens-db.cxp5hyahv8zc.us-east-1.rds.amazonaws.com';
$dbname = 'sevengardens';
$username = 'admin';
$password = 'seven-gardens-db';

define('APP_URL', 'http://44.204.8.245/'); // URL da aplicação
define('S3_BUCKET', 'seven-gardens-s3');
define('S3_REGION', 'us-east-1');
define('S3_BASE_URL', 'https://' . S3_BUCKET . '.s3.' . S3_REGION . '.amazonaws.com/');

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  // Em vez de redirecionar, retorne um erro em JSON
  header('Content-Type: application/json');  // Define o cabeçalho de tipo de conteúdo como JSON
  echo json_encode(['success' => false, 'message' => 'Erro de conexão com o banco de dados: ' . $e->getMessage()]);
  exit;
}
