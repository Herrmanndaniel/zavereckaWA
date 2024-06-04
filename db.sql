CREATE DATABASE Hermen_WA;

USE Hermen_WA;


CREATE TABLE Users(
                      id int primary key auto_increment,
                      name varchar(30) not null,
                      surname varchar(30) not null,
                      email varchar(50) not null,
                      password varchar(80) not null
);


CREATE TABLE Trip(
                     id int primary key auto_increment,
                     destination varchar(100) not null,
                     description text,
                     length_days int,
                     price int
);

CREATE TABLE Reservation(
                            id int primary key auto_increment,
                            user_id int,
                            trip_id int
);




INSERT INTO Users(name,surname,email,password) VALUES ('daniel','herrmann','dan@dan.cz','heslo');


INSERT INTO Trip (destination, description, length_days, price)
VALUES
    ('Český Krumlov, Česká republika', 'Objevte půvabné středověké město Český Krumlov s malebnými uličkami, historickým hradem a krásnou řekou Vltavou.', 3, 800),
    ('Praha, Česká republika', 'Prozkoumejte hlavní město Praha s jeho ikonickým Pražským hradem, Karlovým mostem a historickým Staroměstským náměstím.', 5, 1500),
    ('Brno, Česká republika', 'Navštivte druhé největší město Brno, známé svým moderním životním stylem, vilou Tugendhat a krásným okolím.', 4, 1200),
    ('Karlovy Vary, Česká republika', 'Zažijte luxusní lázně v Karlových Varech, známé svými termálními prameny, krásnou architekturou a filmovým festivalem.', 3, 1000),
    ('Olomouc, Česká republika', 'Objevte historické město Olomouc s jeho bohatou kulturou, slavným orlojem a nádhernými barokními památkami.', 4, 1100),
    ('Kutná Hora, Česká republika', 'Prozkoumejte středověké město Kutná Hora s jeho slavnou Kostnicí, chrámem svaté Barbory a historickými doly na stříbro.', 2, 700),
    ('Plzeň, Česká republika', 'Navštivte město Plzeň, kde se zrodil světoznámý pivovar Pilsner Urquell, a prozkoumejte jeho bohatou pivovarnickou historii.', 3, 900),
    ('Liberec, Česká republika', 'Zažijte krásy města Liberec s jeho známým Ještědem, botanickou zahradou a zábavním centrem Babylon.', 3, 850),
    ('Telč, Česká republika', 'Objevte malebné město Telč, které je zapsáno na seznamu UNESCO díky svému nádhernému renesančnímu náměstí a historickým domům.', 2, 600),
    ('Znojmo, Česká republika', 'Prozkoumejte vinařské město Znojmo s jeho slavnými vinnými sklepy, historickým centrem a krásnou přírodou národního parku Podyjí.', 3, 750);


USE Hermen_WA;

SELECT * FROM Users;
