<?php
$pageTitle = "Skills";
include "includes/header.php";

// ---- Dynamic data from MySQL, with a static fallback if DB is unreachable ----
$skills = [];
$dbError = false;
try {
    include "includes/db.php";
    $stmt = $pdo->query("SELECT skill_name, category, proficiency FROM skills ORDER BY category, proficiency DESC");
    $skills = $stmt->fetchAll();
} catch (Throwable $e) {
    $dbError = true;
    // Fallback static data so the page still renders even without a DB connection
    $skills = [
        ['skill_name' => 'HTML5', 'category' => 'Frontend', 'proficiency' => 90],
        ['skill_name' => 'CSS3', 'category' => 'Frontend', 'proficiency' => 85],
        ['skill_name' => 'JavaScript', 'category' => 'Frontend', 'proficiency' => 80],
        ['skill_name' => 'PHP', 'category' => 'Backend', 'proficiency' => 85],
        ['skill_name' => 'MySQL', 'category' => 'Database', 'proficiency' => 80],
        ['skill_name' => 'Java', 'category' => 'Programming', 'proficiency' => 75],
        ['skill_name' => 'Python', 'category' => 'Programming', 'proficiency' => 70],
        ['skill_name' => 'Git & GitHub', 'category' => 'Tools', 'proficiency' => 80],
    ];
}
?>

<section class="page-banner">
    <div class="container">
        <h1>My Skills</h1>
        <p>Technologies and tools I work with</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <?php if ($dbError): ?>
            <div class="alert alert-error">Showing default skill data — database not connected yet. Import <code>sql/database.sql</code> to enable live data.</div>
        <?php endif; ?>

        <div class="grid grid-3">
            <?php foreach ($skills as $s): ?>
                <div class="skill-card">
                    <div class="skill-top">
                        <span><?php echo htmlspecialchars($s['skill_name']); ?></span>
                        <span><?php echo (int)$s['proficiency']; ?>%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-fill" data-level="<?php echo (int)$s['proficiency']; ?>"></div>
                    </div>
                    <span class="skill-category-tag"><?php echo htmlspecialchars($s['category']); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include "includes/footer.php"; ?>
