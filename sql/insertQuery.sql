INSERT INTO TipoUsuario (Tipo)
VALUES ('Diretoria');

INSERT INTO TipoUsuario (Tipo)
VALUES ('Supervisao');

INSERT INTO TipoUsuario (Tipo)
VALUES ('Funcionario');


INSERT INTO Setor (ID, Nome)
VALUES ('331', 'Clinica Cirurgica I');

INSERT INTO Setor (ID, Nome)
VALUES ('332', 'Clinica Cirurgica II');

INSERT INTO Setor (ID, Nome)
VALUES ('773', 'UTI');

INSERT INTO Setor (ID, Nome)
VALUES ('126', 'Administracao');


INSERT INTO TipoEscala (TipoEscala)
VALUES ('8h manha');

INSERT INTO TipoEscala (TipoEscala)
VALUES ('8h tarde');


INSERT INTO TipoFerias (Tipo)
VALUES ('30 dias');

INSERT INTO TipoFerias (Tipo)
VALUES ('15 dias');


INSERT INTO Funcionario (ID, Nome, Login, Senha, TipoUsuarioID, SetorID, TipoEscalaID, TipoFeriasID)
VALUES ('1234', 'Maria Alice Silva', 'marialices', MD5('123456'), '1', '126', '1', '1');

INSERT INTO Funcionario (ID, Nome, Login, Senha, TipoUsuarioID, SetorID, TipoEscalaID, TipoFeriasID)
VALUES ('2345', 'Carlos Pereira', 'carlospereira', MD5('123456'), '2', '126', '1', '2');

INSERT INTO Funcionario (ID, Nome, Login, Senha, TipoUsuarioID, SetorID, TipoEscalaID, TipoFeriasID)
VALUES ('3456', 'Geovana Nascimento', 'geovananasc', MD5('123456'), '3', '773', '2', '1');

