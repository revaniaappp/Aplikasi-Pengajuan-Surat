show databases;

USE tubes;
SHOW TABLES;

select*from tubes.users;

INSERT INTO users (name, email, password, role, nim_nik, prodi_id, created_at, updated_at)
VALUES (
  'Jesye Octavia Nainggolan',
  'jesyeoctavia22@gmail.com',
  '$2y$12$qPYMYwBWmh9XMG.Qe.MtMe7YYjyiXSQitw/ghUkqvNKw/0PKxgYJa',
  'tata_usaha',
  '2373034',
  1,
  NOW(),
  NOW()
);

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users (name, email, password, role, nim_nik, prodi_id, created_at, updated_at)
VALUES (
  'Jesi',
  '2373034@maranatha.ac.id',
  '$2y$12$qPYMYwBWmh9XMG.Qe.MtMe7YYjyiXSQitw/ghUkqvNKw/0PKxgYJa',
  'tata_usaha',
  '2371001',
  1,
  NOW(),
  NOW()
);

ALTER TABLE `letter_submissions` ADD COLUMN `is_read` TINYINT(1) NOT NULL DEFAULT 0;