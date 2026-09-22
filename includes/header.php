<?php
// Determine current page for active-nav highlighting
$current = basename($_SERVER['PHP_SELF'] ?? '');
if (!function_exists('navClass')) {
    function navClass($page, $current) {
        return $page === $current ? 'active' : '';
    }
}
// $base lets this header work both from the root pages and from admin/ subfolder
$base = isset($base) ? $base : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo isset($pageTitle) ? $pageTitle . " | My Portfolio" : "My Portfolio"; ?></title>
<link rel="stylesheet" href="<?php echo $base; ?>css/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<header class="site-header">
    <div class="container nav-wrap">
        <a href="<?php echo $base; ?>index.php" class="logo">Anu<span>.dev</span></a>
        <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation">
            <span></span><span></span><span></span>
        </button>
        <nav class="site-nav" id="siteNav">
            <a href="<?php echo $base; ?>index.php" class="<?php echo navClass('index.php', $current); ?>">Home</a>
            <a href="<?php echo $base; ?>about.php" class="<?php echo navClass('about.php', $current); ?>">About</a>
            <a href="<?php echo $base; ?>academic.php" class="<?php echo navClass('academic.php', $current); ?>">Academics</a>
            <a href="<?php echo $base; ?>skills.php" class="<?php echo navClass('skills.php', $current); ?>">Skills</a>
            <a href="<?php echo $base; ?>projects.php" class="<?php echo navClass('projects.php', $current); ?>">Projects</a>
            <a href="<?php echo $base; ?>internships.php" class="<?php echo navClass('internships.php', $current); ?>">Internships</a>
            <a href="<?php echo $base; ?>achievements.php" class="<?php echo navClass('achievements.php', $current); ?>">Achievements</a>
            <a href="<?php echo $base; ?>contact.php" class="<?php echo navClass('contact.php', $current); ?>">Contact</a>
        </nav>
    </div>
</header>
