CREATE TABLE TipoUsuario(
ID integer(1) NOT NULL AUTO_INCREMENT,
Tipo varchar(255) NOT NULL,
PRIMARY KEY (ID));

CREATE TABLE Setor(
ID integer(1),
Nome varchar(255) NOT NULL,
PRIMARY KEY (ID));

CREATE TABLE TipoFerias(
ID integer(1) NOT NULL AUTO_INCREMENT,
Tipo varchar(255) NOT NULL,
PRIMARY KEY (ID));

CREATE TABLE TipoEscala(
ID integer(1) NOT NULL AUTO_INCREMENT,
TipoEscala varchar(255) NOT NULL,
PRIMARY KEY (ID));

CREATE TABLE Funcionario(
ID integer(1),
Nome varchar(255),
Login integer(1),
Senha varchar(30),
TipoUsuarioID integer(1),
SetorID integer(1),
TipoEscalaID integer(1),
TipoFeriasID integer(1),
PRIMARY KEY (ID),
FOREIGN KEY (TipoUsuarioID) REFERENCES TipoUsuario (ID),
FOREIGN KEY (SetorID) REFERENCES Setor (ID),
FOREIGN KEY (TipoEscalaID) REFERENCES TipoEscala (ID),
FOREIGN KEY (TipoFeriasID) REFERENCES TipoFerias (ID));

CREATE TABLE TipoPresenca(
ID integer(1),
Tipo varchar(255) NOT NULL,
PRIMARY KEY (ID));

CREATE TABLE Escalas(
ID integer(1),
TipoEscalaID integer(1),
PRIMARY KEY (ID),
FOREIGN KEY (TipoEscalaID) REFERENCES TipoEscala (ID));

CREATE TABLE Celula(
ID integer(1),
DataC date,
TipoPresencaID integer(1),
EscalasID integer(1),
FuncionarioID integer(1),
PRIMARY KEY (ID),
FOREIGN KEY (TipoPresencaID) REFERENCES TipoPresenca (ID),
FOREIGN KEY (EscalasID) REFERENCES Escalas (ID),
FOREIGN KEY (FuncionarioID) REFERENCES Funcionario (ID));


ALTER TABLE Funcionario MODIFY Nome varchar(255) NOT NULL;
ALTER TABLE Funcionario MODIFY Login varchar(30) NOT NULL;
ALTER TABLE Funcionario MODIFY Senha varchar(32) NOT NULL;
ALTER TABLE Funcionario MODIFY TipoUsuarioID integer(1) NOT NULL;
ALTER TABLE Funcionario MODIFY SetorID integer(1) NOT NULL;
ALTER TABLE Funcionario MODIFY TipoEscalaID integer(1) NOT NULL;
ALTER TABLE Funcionario MODIFY TipoFeriasID integer(1) NOT NULL;
