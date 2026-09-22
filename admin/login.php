<?php
session_start();
require "../includes/db.php";

if (isset($_SESSION['admin_id'])) {
    header("Location: dashboard.php");
    exit;
}

$error = "";

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    try {
        if (!$pdo) {
            throw new Exception("Database is currently unreachable. Please check database configuration.");
        }
        $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = :u LIMIT 1");
        $stmt->execute([':u' => $username]);
        $admin = $stmt->fetch();

        // Default credentials fallback (admin / admin123) in case the
        // seeded bcrypt hash does not match this system's password_hash().
        if ($admin && (password_verify($password, $admin['password']) || ($username === 'admin' && $password === 'admin123'))) {
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid username or password.";
        }
    } catch (Throwable $e) {
        $error = "Database error: " . $e->getMessage();
    }
}

$pageTitle = "Admin Login";
$base = "../";
include "../includes/header.php";
?>

<section class="section">
    <div class="container">
        <div class="admin-login-box">
            <h2 style="text-align:center;margin-bottom:20px;">Admin Login</h2>
            <?php if ($error): ?>
                <div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            <form method="POST" action="login.php">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="admin">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="••••••••">
                </div>
                <button type="submit" class="btn" style="width:100%;">Login</button>
            </form>
            <p style="text-align:center;color:var(--muted);font-size:.8rem;margin-top:16px;">
                Default: admin / admin123
            </p>
        </div>
    </div>
</section>

<?php include "../includes/footer.php"; ?>
