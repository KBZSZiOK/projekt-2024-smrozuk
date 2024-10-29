CREATE TABLE filmy(
    ID bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Tytul varchar(255) NOT NULL,
    Rezyser varchar(255) NOT NULL,
    Czas_trwania varchar(255) NOT NULL
);


CREATE TABLE filmy_rodzaj(
    ID bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Filmy_ID bigint NOT NULL,
    Rodzaj_ID bigint NOT NULL
);


CREATE TABLE rodzaj_filmu(
    ID bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Nazwa varchar(255) NOT NULL
);

CREATE TABLE seanse(
    ID bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Termin datetime NOT NULL,
    Sala_ID bigint NOT NULL,
    Film_ID bigint NOT NULL,
    Liczba_wolnych_miejsc bigint NOT NULL
);

CREATE TABLE klienci(
    ID bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Imie varchar(255) NOT NULL,
    Nazwisko varchar(255) NOT NULL,
    Mail varchar(255) NOT NULL
);

CREATE TABLE bilety(
    ID bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Seans_ID bigint NOT NULL,
    Sprzedawca_ID bigint NOT NULL,
    Klient_ID bigint NOT NULL,
    Cena bigint NOT NULL
);

CREATE TABLE sale(
    ID bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Ilosc_miejsc bigint NOT NULL
);

CREATE TABLE sprzedawcy(
    ID bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Imie varchar(255) NOT NULL,
    Nazwisko varchar(255) NOT NULL
);

ALTER TABLE filmy_rodzaj
ADD CONSTRAINT Filmy_FK1
FOREIGN KEY (Filmy_ID) REFERENCES filmy(ID); 

ALTER TABLE filmy_rodzaj
ADD CONSTRAINT Rodzaj_FK2
FOREIGN KEY (Rodzaj_ID) REFERENCES rodzaj_filmu(ID); 

ALTER TABLE seanse
ADD CONSTRAINT Sala_FK1
FOREIGN KEY (Sala_ID) REFERENCES sale(ID); 

ALTER TABLE seanse
ADD CONSTRAINT Film_FK1
FOREIGN KEY (Film_ID) REFERENCES filmy(ID); 

ALTER TABLE bilety
ADD CONSTRAINT Seans_FK1
FOREIGN KEY (Seans_ID) REFERENCES seanse(ID); 

ALTER TABLE bilety
ADD CONSTRAINT Sprzedawca_FK1
FOREIGN KEY (Sprzedawca_ID) REFERENCES sprzedawcy(ID); 

ALTER TABLE bilety
ADD CONSTRAINT Klient_FK1
FOREIGN KEY (Klient_ID) REFERENCES klienci(ID); 

INSERT INTO filmy (Tytul, Rezyser, Czas_trwania)
VALUES ("Ojciec Chrzestny", "Francis Ford Coppola", "3:03:51"),
("Ojciec Chrzestny 2", "Francis Ford Coppola", "3:08:22"),
("Ojciec Chrzestny 3", "Francis Ford Coppola", "3:22:01"),
("Oppenheimer", "Christopher Nolan", "2:53:37");

INSERT INTO filmy_rodzaj(Filmy_ID, Rodzaj_ID) VALUES
(1, 2),
(2, 2),
(3,2),
(3,4);

INSERT INTO rodzaj_filmu (Nazwa) VALUES
("Horror"),
("Dramat"),
("Komedia"),
("Dokument");

INSERT INTO klienci(Imie, Nazwisko, Mail) VALUES
("Nikodem", "Czerwiński", "nikodemczerwinski@mail.com"),
("Bartek", "Bielawa", "bartekbielawa@mail.com"),
("Darek", "Jacek", "darekjacek@mail.com"),
("Błażej", "Kartuz", "blazejkartuz@mail.com"),
("Jan", "Paweł", "janpawel@mail.com"),
("Dominik", "Mazurkiewicz", "dominikmazurkiewicz@mail.com");

INSERT INTO sale(Ilosc_miejsc) VALUES
(95),
(130),
(88),
(120),
(160);

INSERT INTO seanse(Termin, Sala_ID, Film_ID, Liczba_wolnych_miejsc) VALUES
("2024-11-08 12:20", 1, 1, 20),
("2024-11-09 15:20", 2, 1, 33),
("2024-11-11 14:20", 3, 2, 5),
("2024-11-10 11:30", 4, 3, 11),
("2024-11-09 18:00", 5, 4, 10);

INSERT INTO sprzedawcy(Imie, Nazwisko) VALUES
("Tomasz", "Niedzielny"),
("Mirosław", "Adamowicz"),
("Jurek", "Kowalski");

INSERT INTO bilety(Seans_ID,Sprzedawca_ID,Klient_ID,Cena) VALUES
(1,1,1,35),
(1,2,2,35),
(2,3,3,45),
(3,1,4,25),
(4,2,5,30),
(5,3,6,40);

SELECT seanse.Termin,filmy.Tytul,sale.Ilosc_miejsc FROM seanse INNER JOIN filmy ON seanse.Film_ID = filmy.ID INNER JOIN sale ON seanse.Sala_ID= sale.ID WHERE Film_ID = 1 ORDER BY sale.Ilosc_miejsc DESC;
SELECT klienci.Imie,sprzedawcy.Imie,bilety.Cena FROM bilety INNER JOIN sprzedawcy ON bilety.Sprzedawca_ID = sprzedawcy.ID INNER JOIN klienci ON bilety.Klient_ID = klienci.ID ORDER BY bilety.Cena ASC;
SELECT seanse.Termin, filmy.Tytul, sale.Ilosc_miejsc FROM seanse INNER JOIN filmy ON seanse.Film_ID = filmy.ID INNER JOIN sale ON sale.ID = seanse.Sala_ID ORDER BY seanse.Termin ASC;