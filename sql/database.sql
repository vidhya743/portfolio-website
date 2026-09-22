-- ==========================================================
--  Portfolio Website Database
--  Run this file first in phpMyAdmin / MySQL CLI:
--      mysql -u root -p < database.sql
-- ==========================================================

CREATE DATABASE IF NOT EXISTS portfolio_db;
USE portfolio_db;

-- ----------------------------------------------------------
-- Table: contact_messages
-- Stores messages submitted through the Contact page form
-- ----------------------------------------------------------
CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    subject VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    submitted_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    is_read TINYINT(1) DEFAULT 0
);

-- ----------------------------------------------------------
-- Table: admin_users
-- Used for the admin login (to view contact messages)
-- Default login -> username: admin | password: admin123
-- (password below is a bcrypt hash of "admin123")
-- ----------------------------------------------------------
CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO admin_users (username, password) VALUES
('admin', '$2y$10$3s0y8b0iVzR8N1e0oQ4uK.z5Vb0Hn9nKcQnQeYQe9Bq0m0mFV3sZu')
ON DUPLICATE KEY UPDATE username = username;

-- NOTE: The hash above is regenerated automatically the first time
-- setup.php is run (see setup.php) so the login always matches
-- admin123 out of the box, even if bcrypt salts differ per system.

-- ----------------------------------------------------------
-- Table: projects  (optional dynamic content - powers Projects page)
-- ----------------------------------------------------------
CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    description TEXT NOT NULL,
    tech_stack VARCHAR(200) NOT NULL,
    project_link VARCHAR(255),
    github_link VARCHAR(255),
    display_order INT DEFAULT 0
);

INSERT INTO projects (title, description, tech_stack, project_link, github_link, display_order) VALUES
('Dynamic Portfolio Website', 'A full-stack personal portfolio with PHP + MySQL powered contact form and admin panel.', 'HTML, CSS, JavaScript, PHP, MySQL', '#', '#', 1),
('Online Library Management System', 'A web app to manage book issue/return records for a college library.', 'PHP, MySQL, Bootstrap', '#', '#', 2),
('Student Result Portal', 'A portal for students to view semester results fetched dynamically from a database.', 'HTML, CSS, JS, PHP, MySQL', '#', '#', 3),
('E-Commerce Mini Store', 'A simple shopping cart application with product listing and checkout simulation.', 'PHP, MySQL, JavaScript', '#', '#', 4);

-- ----------------------------------------------------------
-- Table: skills (optional dynamic content - powers Skills page)
-- ----------------------------------------------------------
CREATE TABLE IF NOT EXISTS skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    skill_name VARCHAR(100) NOT NULL,
    category VARCHAR(50) NOT NULL,
    proficiency INT NOT NULL DEFAULT 70
);

INSERT INTO skills (skill_name, category, proficiency) VALUES
('HTML5', 'Frontend', 90),
('CSS3', 'Frontend', 85),
('JavaScript', 'Frontend', 80),
('PHP', 'Backend', 85),
('MySQL', 'Database', 80),
('Java', 'Programming', 75),
('Python', 'Programming', 70),
('Git & GitHub', 'Tools', 80);
