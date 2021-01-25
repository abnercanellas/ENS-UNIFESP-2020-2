CREATE TABLE TipoUsuario(
ID integer(10) NOT NULL AUTO_INCREMENT,
Tipo varchar(255) NOT NULL,
PRIMARY KEY (ID));

CREATE TABLE Setor(
ID integer(10),
Nome varchar(255) NOT NULL,
PRIMARY KEY (ID));

CREATE TABLE TipoFerias(
ID integer(10) NOT NULL AUTO_INCREMENT,
Tipo varchar(255) NOT NULL,
PRIMARY KEY (ID));

CREATE TABLE TipoEscala(
ID integer(10) NOT NULL AUTO_INCREMENT,
TipoEscala varchar(255) NOT NULL,
Duracao time(6),
PRIMARY KEY (ID));

CREATE TABLE Funcionario(
ID integer(10),
Nome varchar(255),
Login integer(10),
Senha varchar(30),
TipoUsuarioID integer(10),
SetorID integer(10),
TipoEscalaID integer(10),
TipoFeriasID integer(10),
PRIMARY KEY (ID),
FOREIGN KEY (TipoUsuarioID) REFERENCES TipoUsuario (ID),
FOREIGN KEY (SetorID) REFERENCES Setor (ID),
FOREIGN KEY (TipoEscalaID) REFERENCES TipoEscala (ID),
FOREIGN KEY (TipoFeriasID) REFERENCES TipoFerias (ID));

CREATE TABLE TipoPresenca(
ID integer(10),
Tipo varchar(255) NOT NULL,
PRIMARY KEY (ID));

CREATE TABLE Escalas(
ID integer(10),
DataInicio date,
DataFim date,
TipoEscalaID integer(10),
PRIMARY KEY (ID),
FOREIGN KEY (TipoEscalaID) REFERENCES TipoEscala (ID));

CREATE TABLE Celula(
ID integer(10),
DataC date,
HoraInicio time(6),
HoraFim time(6),
TipoPresencaID integer(10),
EscalasID integer(10),
FuncionarioID integer(10),
PRIMARY KEY (ID),
FOREIGN KEY (TipoPresencaID) REFERENCES TipoPresenca (ID),
FOREIGN KEY (EscalasID) REFERENCES Escalas (ID),
FOREIGN KEY (FuncionarioID) REFERENCES Funcionario (ID));


ALTER TABLE Funcionario MODIFY Nome varchar(255) NOT NULL;
ALTER TABLE Funcionario MODIFY Login varchar(30) NOT NULL;
ALTER TABLE Funcionario MODIFY Senha varchar(32) NOT NULL;
ALTER TABLE Funcionario MODIFY TipoUsuarioID integer(10) NOT NULL;
ALTER TABLE Funcionario MODIFY SetorID integer(10) NOT NULL;
ALTER TABLE Funcionario MODIFY TipoEscalaID integer(10) NOT NULL;
ALTER TABLE Funcionario MODIFY TipoFeriasID integer(10) NOT NULL;
