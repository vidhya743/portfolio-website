<?php
$pageTitle = "Achievements";
include "includes/header.php";

$achievements = [
    ['icon' => '1', 'title' => 'Winner - College Hackathon 2025', 'desc' => 'Led a team of 4 to build a campus event management app in 24 hours.'],
    ['icon' => '2', 'title' => 'Best Paper Award', 'desc' => 'Presented a research paper on "AI in Web Personalization" at a national conference.'],
    ['icon' => '3', 'title' => 'Top 10 - State Level Coding Contest', 'desc' => 'Ranked in the top 10 among 500+ participants in a competitive programming contest.'],
    ['icon' => '4', 'title' => 'Scholarship for Academic Excellence', 'desc' => 'Awarded merit scholarship for maintaining a CGPA above 8.5 for four consecutive semesters.'],
    ['icon' => '5', 'title' => 'Open Source Contributor', 'desc' => 'Contributed bug fixes and documentation to two open-source web development projects.'],
    ['icon' => '6', 'title' => 'Club Lead - Web Dev Club', 'desc' => 'Organized workshops on HTML/CSS/JS/PHP for 100+ junior students.'],
];
?>

<section class="page-banner">
    <div class="container">
        <h1>Achievements</h1>
        <p>Milestones and recognitions along the way</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="grid grid-2">
            <?php foreach ($achievements as $a): ?>
                <div class="card achieve-card">
                    <div class="achieve-icon"><?php echo $a['icon']; ?></div>
                    <div>
                        <h3><?php echo htmlspecialchars($a['title']); ?></h3>
                        <p style="color:var(--muted); margin-top:6px;"><?php echo htmlspecialchars($a['desc']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include "includes/footer.php"; ?>
