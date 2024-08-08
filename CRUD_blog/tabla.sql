CREATE DATABASE evento_registro;

USE evento_registro;

CREATE TABLE IF NOT EXISTS report_blog (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    source VARCHAR(255) NOT NULL,
    published_date DATE NOT NULL,
    summary VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
);

INSERT INTO report_blog (title, image, source, published_date, summary, description) VALUES
('Elecciones en Venezuela', 'assets/img/reportaje/mc.png', 'Noticias — Fuente: Junta Directiva', '2024-07-28', 'Mañana comienza el cambio en Venezuela con la nueva presidente de Venezuela', 'Este curso de acuarela es una puerta de entrada...');

--------------------------------------------------------------------

CREATE DATABASE IF NOT EXISTS evento_registro;
USE evento_registro;

DROP TABLE IF EXISTS report_blog;

CREATE TABLE IF NOT EXISTS report_blog (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    categoria VARCHAR(255) NOT NULL,
    fuente VARCHAR(255) NOT NULL,
    published_date DATE NOT NULL,
    sub_title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
);

INSERT INTO report_blog (title, image, categoria, fuente, published_date, sub_title, description) VALUES
('Elecciones en Venezuela', 'assets/img/reportaje/mc.png', 'Noticias', 'Junta Directiva', '2024-07-28', 'Mañana comienza el cambio en Venezuela con la nueva presidente de Venezuela', 'Este curso de acuarela es una puerta de entrada...');