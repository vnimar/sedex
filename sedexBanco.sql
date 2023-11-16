DROP DATABASE IF EXISTS sedex;
CREATE SCHEMA IF NOT EXISTS sedex DEFAULT CHARACTER SET utf8;
USE sedex;

CREATE TABLE IF NOT EXISTS sedex.produto (
    idProduto INT not null auto_increment primary key,
    nome varchar(45) not null,
    valorReais float not null,
    valorDolar float not null,
    peso float not null, 
    imposto60 float not null,
    icms float not null,
    valorComImposto float not null,
    diferenca float not null,
    resultado VARCHAR(30) NOT NULL
)engine = InnoDB;

SELECT * FROM produto;