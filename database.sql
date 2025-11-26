
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);


INSERT INTO usuarios (nome, email, senha) VALUES 
('Admin', 'admin@barbacar.com', '$2y$10$K.XjW1/..hash..exemplo'); 



CREATE TABLE veiculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(100) NOT NULL,
    marca VARCHAR(50) NOT NULL,
    ano INT NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    descricao TEXT,
    foto VARCHAR(255) 
);

INSERT INTO veiculos (modelo, marca, ano, preco, descricao, foto) VALUES
('Ferrari F430', 'Ferrari', 2007, 850000.00, 'Motor V8 4.3 Litros, impecável.', 'assets/images/ferrari.jpg'),
('Kadett GS', 'Chevrolet', 1991, 35000.00, 'Clássico nacional, motor 2.0.', 'assets/images/kadett.jpg');