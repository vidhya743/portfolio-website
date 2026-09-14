# Dynamic Portfolio Website (HTML, CSS, JS, PHP, MySQL)

A full-stack personal portfolio website built as a college mini/major project.
It demonstrates client-side interactivity, server-side form processing, and
live MySQL database connectivity (dynamic content + an admin login panel).

---

## 1. Pages Included

| Page | File | Description |
|---|---|---|
| Home | `index.php` | Hero intro, typing animation, quick stats |
| About | `about.php` | Personal bio and info list |
| Academic Details | `academic.php` | Education timeline + certifications |
| Skills | `skills.php` | **Dynamic** — skill bars pulled live from MySQL `skills` table |
| Projects | `projects.php` | **Dynamic** — project cards pulled live from MySQL `projects` table |
| Internships | `internships.php` | Internship experience timeline |
| Achievements | `achievements.php` | Awards / recognitions grid |
| Contact | `contact.php` | **Dynamic** — contact form validated in JS + PHP, saved to MySQL |
| Admin Login | `admin/login.php` | **Dynamic** — session-based login (bcrypt password check) |
| Admin Dashboard | `admin/dashboard.php` | View / mark-read / delete messages submitted through Contact |

### Key dynamic features (server-side + database)
1. **Contact form processing** — validates input in JavaScript (instant feedback)
   *and* again in PHP (security), then inserts the message into the
   `contact_messages` MySQL table using a prepared PDO statement.
2. **Admin login system** — `admin_users` table + PHP sessions + `password_verify()`
   for secure authentication.
3. **Admin dashboard / data management** — lists all messages from MySQL, lets
   the admin mark a message as read or delete it (real UPDATE / DELETE queries).
4. **Dynamic Skills & Projects pages** — content is not hard-coded in HTML; it is
   fetched from the `skills` and `projects` MySQL tables on every page load.

---

## 2. Tech Stack

- **HTML5** — semantic page structure
- **CSS3** — custom design system (`css/style.css`), responsive layout, animations
- **JavaScript (vanilla)** — `js/script.js`: mobile nav toggle, typing effect,
  scroll-reveal animation, animated skill bars, client-side form validation
- **PHP 8** (PDO + MySQL driver) — server-side rendering & form processing
- **MySQL** — relational database (`sql/database.sql`)

---

## 3. Folder Structure

```
portfolio-website/
├── index.php               Home
├── about.php
├── academic.php
├── skills.php               (dynamic - reads from DB)
├── projects.php             (dynamic - reads from DB)
├── internships.php
├── achievements.php
├── contact.php               (dynamic - writes to DB)
├── setup.php                  (run once after DB import, then delete)
├── admin/
│   ├── login.php
│   ├── dashboard.php
│   └── logout.php
├── includes/
│   ├── db.php                PDO database connection
│   ├── header.php            shared nav/header
│   └── footer.php            shared footer
├── css/
│   └── style.css
├── js/
│   └── script.js
└── sql/
    └── database.sql          schema + seed data
```

---

## 4. How To Run Locally

### Requirements
- PHP 8.x with `pdo_mysql` extension
- MySQL 5.7+/8.x (or MariaDB)
- Any local server stack: **XAMPP**, **WAMP**, **MAMP**, or plain PHP CLI server

### Steps (XAMPP / WAMP)
1. Copy the `portfolio-website` folder into `htdocs` (XAMPP) or `www` (WAMP).
2. Start **Apache** and **MySQL** from the control panel.
3. Open **phpMyAdmin** → Import → select `sql/database.sql` → Go.
   (This creates the `portfolio_db` database with all tables and seed data.)
4. Open `includes/db.php` and confirm the credentials match your MySQL setup
   (defaults: host `localhost`, user `root`, password empty).
5. Visit `http://localhost/portfolio-website/setup.php` **once** in your
   browser — this re-hashes the admin password for your PHP install so the
   default login (`admin` / `admin123`) works. Then delete `setup.php`.
6. Visit `http://localhost/portfolio-website/index.php` to view the site.
7. Visit `http://localhost/portfolio-website/admin/login.php` to view the
   admin panel (login: `admin` / `admin123`).

### Steps (PHP built-in server — quick test, no Apache needed)
```bash
cd portfolio-website
php -S localhost:8000
```
Then open `http://localhost:8000/index.php` in your browser
(MySQL must still be running and the database imported as above).

---

## 5. Publishing Online

Any of these free options work well for a PHP + MySQL student project:

- **InfinityFree** / **000webhost** — free PHP + MySQL hosting; upload files via
  their File Manager or FTP, then import `sql/database.sql` through their
  phpMyAdmin.
- **Replit** — create a PHP repl, upload the project, and use Replit's
  built-in MySQL/Postgres or an external free MySQL (e.g. FreeSQLDatabase, Clever Cloud).
- **Render / Railway** — deploy via a PHP + MySQL Docker template.

After uploading, update `includes/db.php` with the host's database
credentials, re-import `sql/database.sql`, and run `setup.php` once again
on the live server before deleting it.

---

## 6. Default Admin Credentials

```
Username: admin
Password: admin123
```
Change this in the `admin_users` table (or add a "change password" page)
before using the project outside of a classroom demo.

---

## 7. Screenshots

See the accompanying `screenshots/` folder for captured pages: Home, About,
Academic Details, Skills, Projects, Internships, Achievements, Contact, Admin
Login, and Admin Dashboard (showing a live message pulled from MySQL).
