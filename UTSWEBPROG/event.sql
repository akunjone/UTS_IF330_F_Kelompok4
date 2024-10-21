CREATE DATABASE event;

USE event;

CREATE TABLE events (
    EventID INT AUTO_INCREMENT PRIMARY KEY,
    NamaEvent VARCHAR(100) NOT NULL,
    Tanggal DATE NOT NULL,
    Waktu TIME NOT NULL,
    Lokasi VARCHAR(100) NOT NULL,
    Deskripsi TEXT NOT NULL,
    Kapasitas INT NOT NULL,
    Foto MEDIUMBLOB
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM ('ad', 'us') DEFAULT 'us',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE regist (
    EventID INT NOT NULL,
    Username VARCHAR(30) NOT NULL,
    FOREIGN KEY (EventID) REFERENCES events(EventID) ON DELETE CASCADE,
    UNIQUE (EventID)
);