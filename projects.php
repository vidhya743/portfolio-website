<?php
$pageTitle = "Projects";
include "includes/header.php";

$projects = [];
$dbError = false;
try {
    include "includes/db.php";
    $stmt = $pdo->query("SELECT * FROM projects ORDER BY display_order ASC");
    $projects = $stmt->fetchAll();
} catch (Throwable $e) {
    $dbError = true;
    $projects = [
        ['title' => 'Dynamic Portfolio Website', 'description' => 'A full-stack personal portfolio with PHP + MySQL powered contact form and admin panel.', 'tech_stack' => 'HTML, CSS, JavaScript, PHP, MySQL', 'project_link' => '#', 'github_link' => '#'],
        ['title' => 'Online Library Management System', 'description' => 'A web app to manage book issue/return records for a college library.', 'tech_stack' => 'PHP, MySQL, Bootstrap', 'project_link' => '#', 'github_link' => '#'],
        ['title' => 'Student Result Portal', 'description' => 'A portal for students to view semester results fetched dynamically from a database.', 'tech_stack' => 'HTML, CSS, JS, PHP, MySQL', 'project_link' => '#', 'github_link' => '#'],
        ['title' => 'E-Commerce Mini Store', 'description' => 'A simple shopping cart application with product listing and checkout simulation.', 'tech_stack' => 'PHP, MySQL, JavaScript', 'project_link' => '#', 'github_link' => '#'],
    ];
}
?>

<section class="page-banner">
    <div class="container">
        <h1>My Projects</h1>
        <p>A selection of things I've built</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <?php if ($dbError): ?>
            <div class="alert alert-error">Showing default project data — database not connected yet. Import <code>sql/database.sql</code> to enable live data.</div>
        <?php endif; ?>

        <div class="grid grid-2">
            <?php foreach ($projects as $p): ?>
                <div class="card project-card">
                    <h3><?php echo htmlspecialchars($p['title']); ?></h3>
                    <p class="desc"><?php echo htmlspecialchars($p['description']); ?></p>
                    <div class="tech">
                        <?php foreach (explode(",", $p['tech_stack']) as $t): ?>
                            <span><?php echo htmlspecialchars(trim($t)); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <div class="links">
                        <a href="<?php echo htmlspecialchars($p['project_link'] ?: '#'); ?>">Live Demo &rarr;</a>
                        <a href="<?php echo htmlspecialchars($p['github_link'] ?: '#'); ?>">Source Code &rarr;</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include "includes/footer.php"; ?>
