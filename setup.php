<?php
/**
 * Run this file ONCE in the browser after importing sql/database.sql:
 *      http://localhost/portfolio-website/setup.php
 * It regenerates the admin password hash using this server's PHP
 * password_hash() implementation, guaranteeing admin/admin123 works.
 * Delete this file afterwards for security.
 */
require "includes/db.php";

if (!$pdo) {
    echo "<h2>Setup Failed</h2>";
    echo "<p style='color:red;'>Could not connect to database: " . htmlspecialchars($dbConnectionError ?? 'Connection error') . "</p>";
    echo "<p>Please ensure MySQL is running, the database is created (or sql/database.sql imported), and your credentials match.</p>";
    exit;
}

$hash = password_hash("admin123", PASSWORD_DEFAULT);

$stmt = $pdo->prepare("UPDATE admin_users SET password = :hash WHERE username = 'admin'");
$stmt->execute([':hash' => $hash]);

if ($stmt->rowCount() === 0) {
    // admin user didn't exist yet - insert it
    $stmt = $pdo->prepare("INSERT INTO admin_users (username, password) VALUES ('admin', :hash)");
    $stmt->execute([':hash' => $hash]);
}

echo "<h2>Setup complete!</h2>";
echo "<p>Admin login is ready &rarr; username: <b>admin</b>, password: <b>admin123</b></p>";
echo "<p><a href='admin/login.php'>Go to Admin Login</a> | <a href='index.php'>Go to Home</a></p>";
echo "<p style='color:red;'>For security, please delete setup.php now.</p>";
