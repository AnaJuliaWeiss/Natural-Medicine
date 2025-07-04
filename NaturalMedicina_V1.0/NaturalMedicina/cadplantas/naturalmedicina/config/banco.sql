
-- Tabela: usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM('admin', 'usuario') DEFAULT 'usuario',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela: plantas
CREATE TABLE plantas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_popular VARCHAR(255) NOT NULL,
    nome_cientifico VARCHAR(255),
    uso_medicinal TEXT,
    modo_uso TEXT,
    dosagem TEXT,
    efeitos_colaterais TEXT,
    beneficios TEXT,
    maleficios TEXT,
    imagem_url VARCHAR(255),
    fonte TEXT,
    criado_por INT,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (criado_por) REFERENCES usuarios(id) ON DELETE SET NULL
);

-- Tabela: relatos
CREATE TABLE relatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    planta_id INT NOT NULL,
    usuario_id INT,
    titulo VARCHAR(150),
    relato TEXT NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (planta_id) REFERENCES plantas(id) ON DELETE CASCADE,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE SET NULL
);

-- Tabela: comentarios
CREATE TABLE comentarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    planta_id INT NOT NULL,
    usuario_id INT,
    comentario TEXT NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (planta_id) REFERENCES plantas(id) ON DELETE CASCADE,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE SET NULL
);