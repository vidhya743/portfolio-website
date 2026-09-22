<?php
session_start();
require "../includes/db.php";

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

if (!$pdo) {
    $pageTitle = "Admin Dashboard";
    $base = "../";
    include "../includes/header.php";
    echo '<section class="section"><div class="container">';
    echo '<div class="alert alert-error">Database connection is currently unavailable. Please verify database connection settings or environment variables.</div>';
    echo '<p><a href="logout.php" class="btn outline" style="margin-top:16px;">Logout</a></p>';
    echo '</div></section>';
    include "../includes/footer.php";
    exit;
}

// Mark a message as read
if (isset($_GET['read'])) {
    $stmt = $pdo->prepare("UPDATE contact_messages SET is_read = 1 WHERE id = :id");
    $stmt->execute([':id' => (int)$_GET['read']]);
    header("Location: dashboard.php");
    exit;
}

// Delete a message
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM contact_messages WHERE id = :id");
    $stmt->execute([':id' => (int)$_GET['delete']]);
    header("Location: dashboard.php");
    exit;
}

$messages = $pdo->query("SELECT * FROM contact_messages ORDER BY submitted_at DESC")->fetchAll();
$unreadCount = $pdo->query("SELECT COUNT(*) AS c FROM contact_messages WHERE is_read = 0")->fetch()['c'];

$pageTitle = "Admin Dashboard";
$base = "../";
include "../includes/header.php";
?>

<section class="section">
    <div class="container">
        <div class="admin-topbar">
            <div>
                <h2>Contact Messages</h2>
                <p style="color:var(--muted);">Logged in as <?php echo htmlspecialchars($_SESSION['admin_username']); ?> &middot; <?php echo (int)$unreadCount; ?> unread</p>
            </div>
            <a href="logout.php" class="btn outline">Logout</a>
        </div>

        <?php if (empty($messages)): ?>
            <div class="alert alert-success">No messages yet. Once someone submits the Contact form, it will show up here.</div>
        <?php else: ?>
        <div style="overflow-x:auto;">
        <table class="admin-table">
            <thead>
            <tr>
                <th>#</th><th>Name</th><th>Email</th><th>Subject</th><th>Message</th><th>Date</th><th>Status</th><th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($messages as $m): ?>
                <tr>
                    <td><?php echo $m['id']; ?></td>
                    <td><?php echo htmlspecialchars($m['name']); ?></td>
                    <td><?php echo htmlspecialchars($m['email']); ?></td>
                    <td><?php echo htmlspecialchars($m['subject']); ?></td>
                    <td><?php echo htmlspecialchars(mb_strimwidth($m['message'], 0, 60, '...')); ?></td>
                    <td><?php echo date("d M Y, h:i A", strtotime($m['submitted_at'])); ?></td>
                    <td><?php echo $m['is_read'] ? "Read" : "<span class='badge-new'>New</span>"; ?></td>
                    <td>
                        <?php if (!$m['is_read']): ?>
                            <a href="dashboard.php?read=<?php echo $m['id']; ?>">Mark read</a> |
                        <?php endif; ?>
                        <a href="dashboard.php?delete=<?php echo $m['id']; ?>" onclick="return confirm('Delete this message?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php include "../includes/footer.php"; ?>
