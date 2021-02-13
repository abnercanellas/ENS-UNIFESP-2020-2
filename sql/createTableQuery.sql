CREATE DATABASE insertion;
USE insertion;

CREATE TABLE Acesso(
Id integer(10),
Tipo varchar(255) NOT NULL UNIQUE,
PRIMARY KEY (Id));

CREATE TABLE Vinculo(
Id integer(10) AUTO_INCREMENT,
Vinc varchar(255) NOT NULL UNIQUE,
PRIMARY KEY (Id));

CREATE TABLE Categoria(
Id integer(10) AUTO_INCREMENT,
Cat varchar(255) NOT NULL UNIQUE,
Sigla varchar(10) NOT NULL UNIQUE,
PRIMARY KEY (Id));

CREATE TABLE TipoUsuario(
Id integer(10) AUTO_INCREMENT,
Tipo varchar(255) NOT NULL UNIQUE,
Acesso integer(10) NOT NULL,
PRIMARY KEY (Id));

CREATE TABLE Condicao(
Id integer(10) AUTO_INCREMENT,
Cond varchar(255) NOT NULL UNIQUE,
PRIMARY KEY (Id));
/*
** Ativo
** Licença
** Férias
*/

CREATE TABLE Bloco(
Id integer(10) AUTO_INCREMENT,
Nome varchar(255) NOT NULL UNIQUE,
PRIMARY KEY (Id));

CREATE TABLE Setor(
Id integer(10) AUTO_INCREMENT,
Nome varchar(255) NOT NULL UNIQUE,
BlocoId integer(10) NOT NULL,
PRIMARY KEY (Id),
FOREIGN KEY (BlocoId) REFERENCES Bloco (Id));

CREATE TABLE TipoEscala(
Id integer(10) AUTO_INCREMENT,
Tipo varchar(255) NOT NULL UNIQUE,
Dias integer(2) NOT NULL,
Horas integer(2) NOT NULL,
PRIMARY KEY (Id));
/*
** Dias: número de dias seguidos de trabalho
** Horas: quantidade de horas trabalhadas por dia
** Exemplos:
**    Tipo: 6x1 6, Dias: 6, Horas: 6
**    Tipo: 6x1 8, Dias: 6, Horas: 8
**    Tipo: 12x36, Dias: 1, Horas: 12
*/

CREATE TABLE TipoFerias(
Id integer(10) AUTO_INCREMENT,
Nome varchar(255) NOT NULL UNIQUE,
Duracao integer(2) NOT NULL UNIQUE, /*número de dias*/
PRIMARY KEY (Id));

CREATE TABLE Usuario(
Cpf varchar(11),
RfRe integer(10) NOT NULL UNIQUE,
Coren integer(10) NOT NULL UNIQUE,
Nome varchar(255) NOT NULL,
Login varchar(11) NOT NULL UNIQUE,
Senha varchar(32) NOT NULL,
VinculoId integer(10) NOT NULL,
CategoriaId integer(10) NOT NULL,
TipoUsuarioId integer(10) NOT NULL,
CondicaoId integer(10) NOT NULL,
SetorId integer(10) NOT NULL,
TipoEscalaId integer(10) NOT NULL,
TipoFeriasId integer(10) NOT NULL,
PRIMARY KEY (Cpf),
FOREIGN KEY (VinculoId) REFERENCES Vinculo (Id),
FOREIGN KEY (CategoriaId) REFERENCES Categoria (Id),
FOREIGN KEY (TipoUsuarioId) REFERENCES TipoUsuario (Id),
FOREIGN KEY (CondicaoId) REFERENCES Condicao (Id),
FOREIGN KEY (SetorId) REFERENCES Setor (Id),
FOREIGN KEY (TipoEscalaId) REFERENCES TipoEscala (Id),
FOREIGN KEY (TipoFeriasId) REFERENCES TipoFerias (Id));

CREATE TABLE TipoPresenca(
Id integer(10) AUTO_INCREMENT,
Sigla varchar(5) NOT NULL UNIQUE,
Tipo varchar(255) NOT NULL UNIQUE,
PRIMARY KEY (Id));

CREATE TABLE Escalas(
Id integer(10) AUTO_INCREMENT,
DataInicio date,
DataFim date,
TipoEscalaId integer(10),
PRIMARY KEY (Id),
FOREIGN KEY (TipoEscalaId) REFERENCES TipoEscala (Id));

CREATE TABLE Celula(
Id integer(10) AUTO_INCREMENT,
DataC date,
HoraInicio time(6),
HoraFim time(6),
TipoPresencaId integer(10),
EscalasId integer(10),
UsuarioId varchar(11),
SetorId integer(10),
PRIMARY KEY (Id),
FOREIGN KEY (TipoPresencaId) REFERENCES TipoPresenca (Id),
FOREIGN KEY (EscalasId) REFERENCES Escalas (Id),
FOREIGN KEY (UsuarioId) REFERENCES Usuario (Cpf),
FOREIGN KEY (SetorId) REFERENCES Setor (Id));