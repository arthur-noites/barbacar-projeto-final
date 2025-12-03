
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    numero VARCHAR(20),       
    cpf VARCHAR(14) NOT NULL, 
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    numero VARCHAR(20),
    cpf VARCHAR(20) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE veiculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(100) NOT NULL,
    marca VARCHAR(50) NOT NULL,
    ano INT NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    descricao TEXT,
    foto VARCHAR(255)
);

INSERT INTO veiculos (id, modelo, marca, ano, preco, descricao, foto) VALUES
('Ferrari F430', 'Ferrari', 2007, 850000.00, 'Motor V8 4.3 Litros, impecável.', 'assets/images/ferrari.jpg'),
('Kadett GS', 'Chevrolet', 1991, 35000.00, 'Clássico nacional, motor 2.0.', 'assets/images/kadett.jpg');
