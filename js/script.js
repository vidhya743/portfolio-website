// ============================================================
// Portfolio Website - Client-side interactivity
// ============================================================

document.addEventListener("DOMContentLoaded", function () {

    /* ---------- Mobile nav toggle ---------- */
    const navToggle = document.getElementById("navToggle");
    const siteNav = document.getElementById("siteNav");
    if (navToggle) {
        navToggle.addEventListener("click", () => siteNav.classList.toggle("open"));
        document.querySelectorAll(".site-nav a").forEach(link =>
            link.addEventListener("click", () => siteNav.classList.remove("open"))
        );
    }

    /* ---------- Back to top button ---------- */
    const backToTop = document.getElementById("backToTop");
    if (backToTop) {
        window.addEventListener("scroll", () => {
            backToTop.classList.toggle("show", window.scrollY > 400);
        });
    }

    /* ---------- Typing effect on Home hero ---------- */
    const typingEl = document.querySelector(".typing");
    if (typingEl) {
        const words = JSON.parse(typingEl.dataset.words || "[]");
        let wordIndex = 0, charIndex = 0, deleting = false;

        function type() {
            const current = words[wordIndex];
            if (!deleting) {
                typingEl.textContent = current.substring(0, charIndex + 1);
                charIndex++;
                if (charIndex === current.length) { deleting = true; setTimeout(type, 1200); return; }
            } else {
                typingEl.textContent = current.substring(0, charIndex - 1);
                charIndex--;
                if (charIndex === 0) { deleting = false; wordIndex = (wordIndex + 1) % words.length; }
            }
            setTimeout(type, deleting ? 60 : 110);
        }
        if (words.length) type();
    }

    /* ---------- Animate skill bars when visible ---------- */
    const skillFills = document.querySelectorAll(".skill-fill");
    if (skillFills.length) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.width = entry.target.dataset.level + "%";
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });
        skillFills.forEach(fill => observer.observe(fill));
    }

    /* ---------- Fade-in cards on scroll ---------- */
    const cards = document.querySelectorAll(".card, .timeline-item");
    if (cards.length) {
        cards.forEach(c => { c.style.opacity = 0; c.style.transform = "translateY(20px)"; c.style.transition = "all .6s ease"; });
        const cardObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = 1;
                    entry.target.style.transform = "translateY(0)";
                    cardObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });
        cards.forEach(c => cardObserver.observe(c));
    }

    /* ---------- Contact form: client-side validation ---------- */
    const contactForm = document.getElementById("contactForm");
    if (contactForm) {
        const nameField = document.getElementById("name");
        const emailField = document.getElementById("email");
        const subjectField = document.getElementById("subject");
        const messageField = document.getElementById("message");
        const charCount = document.getElementById("charCount");

        if (messageField && charCount) {
            messageField.addEventListener("input", () => {
                charCount.textContent = `${messageField.value.length} characters`;
            });
        }

        contactForm.addEventListener("submit", function (e) {
            let valid = true;
            clearErrors();

            if (nameField.value.trim().length < 2) {
                showError(nameField, "Please enter your full name.");
                valid = false;
            }
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(emailField.value.trim())) {
                showError(emailField, "Please enter a valid email address.");
                valid = false;
            }
            if (subjectField.value.trim().length < 3) {
                showError(subjectField, "Subject must be at least 3 characters.");
                valid = false;
            }
            if (messageField.value.trim().length < 10) {
                showError(messageField, "Message must be at least 10 characters.");
                valid = false;
            }
            if (!valid) e.preventDefault();
        });

        function showError(field, msg) {
            const span = document.createElement("span");
            span.className = "error-text";
            span.textContent = msg;
            field.insertAdjacentElement("afterend", span);
            field.style.borderColor = "#e74c3c";
        }
        function clearErrors() {
            document.querySelectorAll(".error-text").forEach(el => el.remove());
            [nameField, emailField, subjectField, messageField].forEach(f => f.style.borderColor = "#e0e0ec");
        }
    }
});
