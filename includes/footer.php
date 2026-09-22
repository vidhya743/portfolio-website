<footer class="site-footer">
    <div class="container footer-wrap">
        <p>&copy; <?php echo date("Y"); ?> My Portfolio. Built with HTML, CSS, JS, PHP & MySQL.</p>
        <div class="socials">
            <a href="#" title="GitHub">GitHub</a>
            <a href="#" title="LinkedIn">LinkedIn</a>
            <a href="mailto:you@example.com" title="Email">Email</a>
            <a href="<?php echo isset($base) ? $base : ''; ?>admin/login.php" title="Admin">Admin</a>
        </div>
    </div>
</footer>

<a href="#top" class="back-to-top" id="backToTop">&uarr;</a>

<script src="<?php echo isset($base) ? $base : ''; ?>js/script.js"></script>
</body>
</html>
