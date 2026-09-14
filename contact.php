<?php
$pageTitle = "Contact";
include "includes/header.php";
include "includes/db.php";

$successMsg = "";
$errorMsg = "";
$old = ['name' => '', 'email' => '', 'subject' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_message'])) {

    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $old = compact('name', 'email', 'subject', 'message');

    // ---- Server-side validation ----
    $errors = [];
    if (strlen($name) < 2) $errors[] = "Name must be at least 2 characters.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Please provide a valid email address.";
    if (strlen($subject) < 3) $errors[] = "Subject must be at least 3 characters.";
    if (strlen($message) < 10) $errors[] = "Message must be at least 10 characters.";

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare(
                "INSERT INTO contact_messages (name, email, subject, message) VALUES (:name, :email, :subject, :message)"
            );
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':subject' => $subject,
                ':message' => $message,
            ]);
            $successMsg = "Thank you, $name! Your message has been received. I'll get back to you soon.";
            $old = ['name' => '', 'email' => '', 'subject' => '', 'message' => '']; // clear form
        } catch (Throwable $e) {
            $errorMsg = "Something went wrong while saving your message. Please try again later.";
        }
    } else {
        $errorMsg = implode(" ", $errors);
    }
}
?>

<section class="page-banner">
    <div class="container">
        <h1>Contact Me</h1>
        <p>Have a project in mind? Let's talk.</p>
    </div>
</section>

<section class="section">
    <div class="container contact-wrap">
        <div class="contact-info">
            <h2>Get In Touch</h2>
            <ul class="info-list" style="margin-top:20px;">
                <li><b>Email:</b> you@example.com</li>
                <li><b>Phone:</b> +91 98765 43210</li>
                <li><b>Location:</b> Madurai, Tamil Nadu, India</li>
            </ul>
            <p style="color:var(--muted); margin-top:20px;">
                Fill out the form and your message will be securely stored and reviewed —
                this form is powered by PHP + MySQL on the backend.
            </p>
        </div>

        <div class="contact-form">
            <?php if ($successMsg): ?>
                <div class="alert alert-success"><?php echo htmlspecialchars($successMsg); ?></div>
            <?php endif; ?>
            <?php if ($errorMsg): ?>
                <div class="alert alert-error"><?php echo htmlspecialchars($errorMsg); ?></div>
            <?php endif; ?>

            <form id="contactForm" method="POST" action="contact.php" novalidate>
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($old['name']); ?>" placeholder="Your name">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($old['email']); ?>" placeholder="you@example.com">
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" value="<?php echo htmlspecialchars($old['subject']); ?>" placeholder="What's this about?">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" placeholder="Write your message here..."><?php echo htmlspecialchars($old['message']); ?></textarea>
                    <span class="char-count" id="charCount">0 characters</span>
                </div>
                <button type="submit" name="send_message" class="btn">Send Message</button>
            </form>
        </div>
    </div>
</section>

<?php include "includes/footer.php"; ?>
