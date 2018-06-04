DROP DATABASE IF EXISTS my_db;

CREATE DATABASE IF NOT EXISTS my_db DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci;

USE my_db;

CREATE TABLE tutenti (
	ID_Utente 		       BIGINT	    NOT NULL 	AUTO_INCREMENT,
	Cognome			       VARCHAR(50),
	Nome	 			       VARCHAR(50),
	DataDiNascita		       DATE,
	Email 			       VARCHAR(50)	UNIQUE,
	Password			       CHAR(64),
	Tipo				       ENUM('U', 'A')		DEFAULT 'U',
	PRIMARY KEY(ID_Utente)
) ENGINE = InnoDB;

CREATE TABLE tcategorie (
	ID_Categoria            BIGINT      NOT NULL    AUTO_INCREMENT,
	Nome                    VARCHAR(50),
	PRIMARY KEY(ID_Categoria)
) ENGINE = InnoDB;

CREATE TABLE tprodotti (
	ID_Prodotto             BIGINT      NOT NULL    AUTO_INCREMENT,
	Nome                    VARCHAR(50),
	Prezzo                  INT,
	Descrizione				VARCHAR(1000),
	FK_Categoria            BIGINT,
	PRIMARY KEY(ID_Prodotto),
	FOREIGN KEY(FK_Categoria) REFERENCES tcategorie(ID_Categoria)
		ON DELETE SET NULL
		ON UPDATE CASCADE
) ENGINE = InnoDB;

CREATE TABLE tcarrelli (
	ID_Carrello             BIGINT      NOT NULL    AUTO_INCREMENT,
	FK_Utente               BIGINT,
	FK_Prodotto             BIGINT,
	PRIMARY KEY(ID_Carrello),
	FOREIGN KEY(FK_Utente) REFERENCES tutenti(ID_Utente)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	FOREIGN KEY(FK_Prodotto) REFERENCES tprodotti(ID_Prodotto)
		ON DELETE CASCADE
		ON UPDATE CASCADE
) ENGINE = InnoDB;

CREATE TABLE tlistadesideri (
	ID_Lista             	BIGINT      NOT NULL    AUTO_INCREMENT,
	FK_Utente               BIGINT,
	FK_Prodotto             BIGINT,
	PRIMARY KEY(ID_Lista),
	FOREIGN KEY(FK_Utente) REFERENCES tutenti(ID_Utente)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	FOREIGN KEY(FK_Prodotto) REFERENCES tprodotti(ID_Prodotto)
		ON DELETE CASCADE
		ON UPDATE CASCADE
) ENGINE = InnoDB;

CREATE TABLE tordini (
	ID_Ordine             	BIGINT      NOT NULL    AUTO_INCREMENT,
	FK_Utente               BIGINT,
	FK_Prodotto             BIGINT,
	DataOrdine				DATE,
	PRIMARY KEY(ID_Ordine),
	FOREIGN KEY(FK_Utente) REFERENCES tutenti(ID_Utente)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	FOREIGN KEY(FK_Prodotto) REFERENCES tprodotti(ID_Prodotto)
		ON DELETE CASCADE
		ON UPDATE CASCADE
) ENGINE = InnoDB;

INSERT INTO tutenti (Cognome, Nome, DataDiNascita, Email, Password, Tipo) VALUES ("Dalla Rosa", "Daniele", '1212/12/12', "admin@example.com", SHA2('pass', 256), 'A');

INSERT INTO tcategorie (Nome) VALUES ("Elettronica");
INSERT INTO tcategorie (Nome) VALUES ("Sport");
INSERT INTO tcategorie (Nome) VALUES ("Musica");

INSERT INTO tprodotti (Nome, Prezzo, Descrizione, FK_Categoria) VALUES ("Elettronica1", 123, "Prodotto 1 Categoria Elettronica", 1);
INSERT INTO tprodotti (Nome, Prezzo, Descrizione, FK_Categoria) VALUES ("Elettronica2", 1234, "Prodotto 2 Categoria Elettronica", 1);
INSERT INTO tprodotti (Nome, Prezzo, Descrizione, FK_Categoria) VALUES ("Elettronica3", 1253, "Prodotto 3 Categoria Elettronica", 1);

INSERT INTO tprodotti (Nome, Prezzo, Descrizione, FK_Categoria) VALUES ("Sport1", 13335, "Prodotto 1 Categoria Sport", 2);
INSERT INTO tprodotti (Nome, Prezzo, Descrizione, FK_Categoria) VALUES ("Sport2", 135, "Prodotto 2 Categoria Sport", 2);
INSERT INTO tprodotti (Nome, Prezzo, Descrizione, FK_Categoria) VALUES ("Sport3", 13635, "Prodotto 3 Categoria Sport", 2);

INSERT INTO tprodotti (Nome, Prezzo, Descrizione, FK_Categoria) VALUES ("Musica1", 134335, "Prodotto 1 Categoria Musica", 3);
INSERT INTO tprodotti (Nome, Prezzo, Descrizione, FK_Categoria) VALUES ("Musica2", 134335, "Prodotto 2 Categoria Musica", 3);
INSERT INTO tprodotti (Nome, Prezzo, Descrizione, FK_Categoria) VALUES ("Musica3", 134335, "Prodotto 3 Categoria Musica", 3);
