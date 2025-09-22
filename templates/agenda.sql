-- Banco de dados: `empresa_x`
--

CREATE DATABASE IF NOT EXISTS empresa_x;
USE empresa_x;

-- Tabela de departamentos
CREATE TABLE departamentos (
  id INT(11) NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela de funcionários
CREATE TABLE funcionarios (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  afastado ENUM('sim', 'nao') NOT NULL DEFAULT 'nao',
  departamento_id INT(11) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (departamento_id) REFERENCES departamentos(id)
    ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exemplo de inserção de departamentos
INSERT INTO departamentos (descricao) VALUES
('Recursos Humanos'),
('Financeiro'),
('TI');

-- Exemplo de inserção de funcionários
INSERT INTO funcionarios (nome, afastado, departamento_id) VALUES
('João Silva', 'nao', 1),
('Maria Souza', 'sim', 2),
('Carlos Lima', 'nao', 1);

COMMIT;