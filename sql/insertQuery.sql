USE insertion;

INSERT INTO Acesso (Id, Tipo) VALUES (1, 'Total');
INSERT INTO Acesso (Id, Tipo) VALUES (2, 'Chamada e consulta');
INSERT INTO Acesso (Id, Tipo) VALUES (3, 'Apenas consulta');

INSERT INTO Vinculo (Vinc) VALUES ('SPDM');

INSERT INTO Categoria (Cat, Sigla) VALUES ('Enfermeiro(a)', 'ENF');
INSERT INTO Categoria (Cat, Sigla) VALUES ('Enfermeiro(a) Pleno', 'ENF PLENO');
INSERT INTO Categoria (Cat, Sigla) VALUES ('Auxiliar de Enfermagem', 'AE');
INSERT INTO Categoria (Cat, Sigla) VALUES ('Técnico de Enfermagem', 'TE');
INSERT INTO Categoria (Cat, Sigla) VALUES ('Enfermeiro Assistente', 'ENF A');
INSERT INTO Categoria (Cat, Sigla) VALUES ('Auxiliar de Enfermagem Junior', 'AE JR');

INSERT INTO TipoUsuario (Tipo, Acesso) VALUES ('Diretoria de enfermagem', 1);
INSERT INTO TipoUsuario (Tipo, Acesso) VALUES ('Coordenação técnica', 2);
INSERT INTO TipoUsuario (Tipo, Acesso) VALUES ('Supervisão de enfermagem', 2);
INSERT INTO TipoUsuario (Tipo, Acesso) VALUES ('Padrão', 3);
INSERT INTO TipoUsuario (Tipo, Acesso) VALUES ('Folguista', 3);
INSERT INTO TipoUsuario (Tipo, Acesso) VALUES ('Ferista', 3);

INSERT INTO Condicao (Cond) VALUES ('Ativo');
INSERT INTO Condicao (Cond) VALUES ('Licença');
INSERT INTO Condicao (Cond) VALUES ('Férias');

INSERT INTO Bloco (Nome) VALUES ('Clínicas');
INSERT INTO Bloco (Nome) VALUES ('Materno Infantil');
INSERT INTO Bloco (Nome) VALUES ('Pediátrico');
INSERT INTO Bloco (Nome) VALUES ('UTIS Adulto');
INSERT INTO Bloco (Nome) VALUES ('Pronto Socorro Adulto');

INSERT INTO Setor (Nome, BlocoId) VALUES ('Clínica Médica', 1);
INSERT INTO Setor (Nome, BlocoId) VALUES ('Clínica Cirúrgica II', 1);
INSERT INTO Setor (Nome, BlocoId) VALUES ('Clínica Cirúrgica III', 1);
INSERT INTO Setor (Nome, BlocoId) VALUES ('Clínica Cirúrgica IV', 1);
INSERT INTO Setor (Nome, BlocoId) VALUES ('Centro Obstétrico', 2);
INSERT INTO Setor (Nome, BlocoId) VALUES ('Maternidade', 2);
INSERT INTO Setor (Nome, BlocoId) VALUES ('Hospital da Mulher', 2);
INSERT INTO Setor (Nome, BlocoId) VALUES ('UTI Neonatal', 2);
INSERT INTO Setor (Nome, BlocoId) VALUES ('Pediatria', 3);
INSERT INTO Setor (Nome, BlocoId) VALUES ('Pronto Socorro Infantil', 3);
INSERT INTO Setor (Nome, BlocoId) VALUES ('UTI Infantil', 3);
INSERT INTO Setor (Nome, BlocoId) VALUES ('UTI Adulto I', 4);
INSERT INTO Setor (Nome, BlocoId) VALUES ('UTI Adulto II', 4);
INSERT INTO Setor (Nome, BlocoId) VALUES ('UTI PS', 4);
INSERT INTO Setor (Nome, BlocoId) VALUES ('Classificação de Risco', 5);
INSERT INTO Setor (Nome, BlocoId) VALUES ('Vermelho', 5);
INSERT INTO Setor (Nome, BlocoId) VALUES ('Amarelo', 5);
INSERT INTO Setor (Nome, BlocoId) VALUES ('Verde', 5);
INSERT INTO Setor (Nome, BlocoId) VALUES ('Acolhimento', 5);
INSERT INTO Setor (Nome, BlocoId) VALUES ('Protocolo Analgesia', 5);
INSERT INTO Setor (Nome, BlocoId) VALUES ('ECG', 5);
INSERT INTO Setor (Nome, BlocoId) VALUES ('Curativo / Sutura', 5);
INSERT INTO Setor (Nome, BlocoId) VALUES ('Tomografia e Raio X', 5);
INSERT INTO Setor (Nome, BlocoId) VALUES ('Ortopedia', 5);

INSERT INTO TipoEscala (Tipo, Dias, Horas) VALUES ('6x1 8h', 6, 8);
INSERT INTO TipoEscala (Tipo, Dias, Horas) VALUES ('6x1 6h', 6, 6);
INSERT INTO TipoEscala (Tipo, Dias, Horas) VALUES ('12x36', 1, 12);

INSERT INTO TipoFerias (Nome, Duracao) VALUES ('Integral', 30);
INSERT INTO TipoFerias (Nome, Duracao) VALUES ('Metade', 15);


INSERT INTO Usuario (Cpf, RfRe, Coren, Nome, Login, Senha, HoraEntrada, HoraSaida, VinculoId, CategoriaId, TipoUsuarioId, CondicaoId, SetorId, TipoEscalaId, TipoFeriasId)
VALUES ('11122233344', 1234567, 1112223, 'Maria Alice Silva', '11122233344', MD5('123456'), '06:30:00.000000', '15:30:00.000000', 1, 2, 1, 1, 1, 1, 1);

INSERT INTO Usuario (Cpf, RfRe, Coren, Nome, Login, Senha, HoraEntrada, HoraSaida, VinculoId, CategoriaId, TipoUsuarioId, CondicaoId, SetorId, TipoEscalaId, TipoFeriasId)
VALUES ('22233344455', 2345678, 2223334, 'Carlos Ferreira', '22233344455', MD5('123456'), '11:00:00.000000', '23:00:00.000000', 1, 1, 3, 1, 2, 3, 1);

INSERT INTO Usuario (Cpf, RfRe, Coren, Nome, Login, Senha, HoraEntrada, HoraSaida, VinculoId, CategoriaId, TipoUsuarioId, CondicaoId, SetorId, TipoEscalaId, TipoFeriasId)
VALUES ('33344455566', 3456789, 3334445, 'Geovana Nascimento', '33344455566', MD5('123456'), '05:00:00.000000', '17:00:00.000000', 1, 1, 4, 1, 2, 3, 2);


INSERT INTO TipoPresenca (Sigla, Tipo) VALUES ('X', 'Presente');
INSERT INTO TipoPresenca (Sigla, Tipo) VALUES ('F', 'Folga');
INSERT INTO TipoPresenca (Sigla, Tipo) VALUES ('FF', 'Folga Feriado');
INSERT INTO TipoPresenca (Sigla, Tipo) VALUES ('FE', 'Folga Eleitoral');
INSERT INTO TipoPresenca (Sigla, Tipo) VALUES ('FP', 'Folga Prêmio');
INSERT INTO TipoPresenca (Sigla, Tipo) VALUES ('A', 'Ausência');
INSERT INTO TipoPresenca (Sigla, Tipo) VALUES ('AT', 'Ausência com Atestado');
