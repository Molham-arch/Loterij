CREATE DATABASE IF NOT EXISTS winnaar;

USE winnaar;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL
);

ALTER TABLE users AUTO_INCREMENT = 1;

INSERT INTO users (firstName, lastName, email) VALUES
('Molham', 'Alam', 'molham@gmail.com'),
('Ahmed', 'Sami', 'ahmed@gmail.com'),
('Wael', 'Ashraf', 'wael@gmail.com'),
('Mohammed', 'Alam', 'mohammed@gmail.com'),
('Amina', 'Nour', 'amina@gmail.com'),
('Sarah', 'Ali', 'sarah.ali@gmail.com'),
('Omar', 'Khalid', 'omar.khalid@gmail.com'),
('Layla', 'Saeed', 'layla.saeed@gmail.com'),
('Hassan', 'Ahmed', 'hassan.ahmed@gmail.com'),
('Fatima', 'Osman', 'fatima.osman@gmail.com'),
('Youssef', 'El-Sayed', 'youssef.sayed@gmail.com'),
('Nadia', 'Fathi', 'nadia.fathi@gmail.com'),
('Rami', 'Mahmoud', 'rami.mahmoud@gmail.com'),
('Salma', 'Ibrahim', 'salma.ibrahim@gmail.com'),
('Karim', 'Zaki', 'karim.zaki@gmail.com');
