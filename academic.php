<?php
$pageTitle = "Academic Details";
include "includes/header.php";
?>

<section class="page-banner">
    <div class="container">
        <h1>Academic Details</h1>
        <p>My educational journey so far</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="timeline">
            <div class="timeline-item">
                <h3>B.E. Computer Science &amp; Engineering</h3>
                <p class="meta">XYZ College of Engineering &nbsp;|&nbsp; 2022 - 2026</p>
                <p>CGPA: 8.6 / 10. Relevant coursework: Data Structures, DBMS, Web Technologies, Operating Systems, Software Engineering.</p>
            </div>
            <div class="timeline-item">
                <h3>Higher Secondary Education (12th Grade)</h3>
                <p class="meta">ABC Matriculation Higher Secondary School &nbsp;|&nbsp; 2020 - 2022</p>
                <p>Percentage: 92% — Computer Science stream with Mathematics.</p>
            </div>
            <div class="timeline-item">
                <h3>Secondary Education (10th Grade)</h3>
                <p class="meta">ABC Matriculation Higher Secondary School &nbsp;|&nbsp; 2019 - 2020</p>
                <p>Percentage: 95% — State Board Curriculum.</p>
            </div>
        </div>
    </div>
</section>

<section class="section" style="padding-top:0;">
    <div class="container">
        <div class="section-title">
            <h2>Certifications</h2>
            <div class="line"></div>
        </div>
        <div class="grid grid-3">
            <div class="card"><h3>Web Development Bootcamp</h3><p style="color:var(--muted);margin-top:8px;">Udemy — HTML, CSS, JS, PHP, MySQL</p></div>
            <div class="card"><h3>Database Management Systems</h3><p style="color:var(--muted);margin-top:8px;">NPTEL — Elite Certificate</p></div>
            <div class="card"><h3>Java Programming</h3><p style="color:var(--muted);margin-top:8px;">Coursera — Object Oriented Programming</p></div>
        </div>
    </div>
</section>

<?php include "includes/footer.php"; ?>
