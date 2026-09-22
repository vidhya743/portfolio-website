<?php
/**
 * Database connection (PDO + MySQL)
 * Supports environment variables for cloud deployment (e.g. Render)
 * while defaulting to standard local XAMPP/MySQL credentials.
 */

// Read environment variables (Render / Docker / hosting), fallback to local defaults
$DB_HOST = getenv('DB_HOST') ?: 'localhost';
$DB_PORT = getenv('DB_PORT') ?: '3306';
$DB_NAME = getenv('DB_NAME') ?: 'portfolio_db';
$DB_USER = getenv('DB_USER') ?: 'root';
$DB_PASS = getenv('DB_PASS') !== false ? getenv('DB_PASS') : (getenv('DB_PASSWORD') !== false ? getenv('DB_PASSWORD') : '');

// Support complete database connection URL if provided by provider (e.g. DATABASE_URL / MYSQL_URL)
$DATABASE_URL = getenv('DATABASE_URL') ?: getenv('MYSQL_URL');
if ($DATABASE_URL) {
    $dbparts = parse_url($DATABASE_URL);
    if (!empty($dbparts['host'])) $DB_HOST = $dbparts['host'];
    if (!empty($dbparts['port'])) $DB_PORT = $dbparts['port'];
    if (!empty($dbparts['user'])) $DB_USER = $dbparts['user'];
    if (isset($dbparts['pass']))  $DB_PASS = $dbparts['pass'];
    if (!empty($dbparts['path'])) $DB_NAME = ltrim($dbparts['path'], '/');
}

$pdo = null;
$dbConnectionError = null;

try {
    $pdo = new PDO(
        "mysql:host=$DB_HOST;port=$DB_PORT;dbname=$DB_NAME;charset=utf8mb4",
        $DB_USER,
        $DB_PASS,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    $pdo = null;
    $dbConnectionError = $e->getMessage();
}
