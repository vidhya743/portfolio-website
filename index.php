<?php
$pageTitle = "Home";
include "includes/header.php";
?>

<section class="hero container" id="top">
    <div class="hero-text">
        <p class="eyebrow">Welcome to my portfolio</p>
        <h1>Hi, I'm <span class="highlight">Anu Priya</span><br>
            I build <span class="typing" data-words='["Web Applications", "Dynamic Websites", "Database Driven Apps", "Clean User Interfaces"]'></span>
        </h1>
        <p>Final-year Computer Science student passionate about full-stack web development. I enjoy turning ideas into responsive, database-backed web applications using HTML, CSS, JavaScript, PHP and MySQL.</p>
        <a href="projects.php" class="btn">View My Work</a>
        <a href="contact.php" class="btn outline">Contact Me</a>

        <div class="stats-strip">
            <div><h3>4+</h3><span>Projects Built</span></div>
            <div><h3>2</h3><span>Internships</span></div>
            <div><h3>8+</h3><span>Technologies</span></div>
            <div><h3>3</h3><span>Certifications</span></div>
        </div>
    </div>
    <div class="hero-img">
        <div class="avatar-circle">AP</div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>What I Do</h2>
            <p>A quick snapshot of my core focus areas</p>
            <div class="line"></div>
        </div>
        <div class="grid grid-3">
            <div class="card">
                <h3>Frontend Development</h3>
                <p style="color:var(--muted); margin-top:10px;">Crafting responsive, accessible interfaces with HTML5, CSS3 and modern JavaScript.</p>
            </div>
            <div class="card">
                <h3>Backend & Database</h3>
                <p style="color:var(--muted); margin-top:10px;">Building server-side logic with PHP and managing data using MySQL.</p>
            </div>
            <div class="card">
                <h3>Full-Stack Projects</h3>
                <p style="color:var(--muted); margin-top:10px;">Connecting frontend and backend into complete, dynamic web applications.</p>
            </div>
        </div>
    </div>
</section>

<?php include "includes/footer.php"; ?>
