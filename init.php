<?php
include('../conexao.php');
// constantes com as credenciais de acesso ao banco MySQL
define('DB_HOST', $host);
define('DB_USER', $usuario);
define('DB_PASS', $senhadb);
define('DB_NAME', $banco);
 
// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);
 
// inclui o arquivo de funçõees
require_once 'functions.php';