CREATE TABLE senhas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero INT NOT NULL,
    servico VARCHAR(50),
    status ENUM('esperando', 'atendido') DEFAULT 'esperando',
    guiche INT DEFAULT NULL
);

CREATE TABLE guiches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero INT NOT NULL
);
