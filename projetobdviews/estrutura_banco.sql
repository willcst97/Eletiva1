CREATE DATABASE banco_php;
USE banco_php;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    nivel ENUM('adm', 'colab') NOT NULL
);

CREATE TABLE tipo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(100) NOT NULL
);

CREATE TABLE ong (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    endereco TEXT,
    fone VARCHAR(11) NOT NULL
);

CREATE TABLE adotante (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    endereco TEXT,
    idade INT,
    fone VARCHAR(11) NOT NULL
);

CREATE TABLE animal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    idade INT,
    tipo_id INT,
    ong_id INT,
    FOREIGN KEY (tipo_id) REFERENCES tipo(id),
    FOREIGN KEY (ong_id) REFERENCES ong(id)
);

CREATE TABLE adocao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data DATETIME NOT NULL,
    adotante_id INT NOT NULL,
    animal_id INT NOT NULL,
    aprovacao_ong INT NOT NULL,
    ressalva TEXT,
    FOREIGN KEY (adotante_id) REFERENCES adotante(id),
    FOREIGN KEY (animal_id) REFERENCES animal(id)
);
