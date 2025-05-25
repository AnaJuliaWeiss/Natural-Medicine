-- Criar banco de dados
CREATE DATABASE plantas;
USE plantas;

-- Tabela: usuarios
CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM('usuario', 'admin') NOT NULL DEFAULT 'usuario',
    data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Tabela: plantas
CREATE TABLE plantas (
    id_planta INT AUTO_INCREMENT PRIMARY KEY,
    nome_popular VARCHAR(100) NOT NULL,
    nome_cientifico VARCHAR(150),
    descricao TEXT,
    uso_medicinal TEXT,
    efeitos_colaterais TEXT,
    modo_uso TEXT,
    imagem_url VARCHAR(255),
    criado_por INT,
    FOREIGN KEY (criado_por) REFERENCES usuarios(id_usuario)
        ON DELETE SET NULL
);

-- Tabela: comentarios
CREATE TABLE comentarios (
    id_comentario INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_planta INT NOT NULL,
    comentario TEXT NOT NULL,
    data_comentario DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
        ON DELETE CASCADE,
    FOREIGN KEY (id_planta) REFERENCES plantas(id_planta)
        ON DELETE CASCADE
);

-- Tabela: relatos
CREATE TABLE relatos (
    id_relato INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_planta INT NOT NULL,
    titulo VARCHAR(150),
    descricao TEXT NOT NULL,
    data_relato DATETIME DEFAULT CURRENT_TIMESTAMP,
    aprovado BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
        ON DELETE CASCADE,
    FOREIGN KEY (id_planta) REFERENCES plantas(id_planta)
        ON DELETE CASCADE
);
ALTER TABLE relatos DROP FOREIGN KEY relatos_ibfk_1; -- id_usuario FK
ALTER TABLE relatos DROP FOREIGN KEY relatos_ibfk_2; -- id_planta FK (supondo nome)
