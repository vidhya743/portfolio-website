<?php
$pageTitle = "About";
include "includes/header.php";
?>

<section class="page-banner">
    <div class="container">
        <h1>About Me</h1>
        <p>Get to know who I am and what drives me</p>
    </div>
</section>

<section class="section">
    <div class="container about-grid">
        <div class="about-photo">
            <div class="avatar-circle" style="width:100%;max-width:280px;height:280px;margin:0 auto;">AP</div>
        </div>
        <div class="about-content">
            <h2>Hi, I'm Anu Priya</h2>
            <p style="color:var(--muted); margin-top:14px;">
                I'm a final-year B.E. Computer Science student with a strong interest in full-stack
                web development. I enjoy solving real-world problems by building dynamic, data-driven
                websites — from designing clean user interfaces to writing efficient server-side logic
                and structuring relational databases.
            </p>
            <p style="color:var(--muted); margin-top:14px;">
                Outside of coding, I like exploring UI/UX trends, contributing to college tech events,
                and continuously learning new frameworks and tools to sharpen my craft.
            </p>

            <ul class="info-list">
                <li><b>Name:</b> Anu Priya</li>
                <li><b>Location:</b> Madurai, Tamil Nadu, India</li>
                <li><b>Degree:</b> B.E. Computer Science &amp; Engineering</li>
                <li><b>Email:</b> you@example.com</li>
                <li><b>Languages:</b> English, Tamil</li>
            </ul>

            <a href="#" class="btn" style="margin-top:24px;">Download Resume</a>
        </div>
    </div>
</section>

<?php include "includes/footer.php"; ?>
