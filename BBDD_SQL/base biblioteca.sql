//Sentencias SQL


//Creamos Tabla

CREATE DATABASE biblioteca;

USE biblioteca;

CREATE TABLE clientes
(DNI varchar(10) NOT NULL PRIMARY KEY,
Name varchar(30) NOT NULL,
Password varchar(10) NOT NULL,
Email varchar(30) UNIQUE
);

CREATE TABLE libros
(
ISBN varchar(13) NOT NULL PRIMARY KEY,
Tittle varchar(45) NOT NULL,
Autor varchar (30) NOT NULL
);

CREATE TABLE Prestamos(
DNI varchar(10) FOREIGN KEY REFERENCES clientes(DNI),
ISBN varchar(13) FOREIGN KEY REFERENCES libros(ISBN),
numero prestamo int(6) AUTOINCREMENT
);


CREATE DATABASE biblioteca;

USE biblioteca;

CREATE TABLE clientes
(
DNI varchar(10) NOT NULL PRIMARY KEY,
Name varchar(30) NOT NULL,
Password varchar(10) NOT NULL,
Email varchar(30) UNIQUE
);

CREATE TABLE libros
(
ISBN varchar(13) NOT NULL PRIMARY KEY,
Tittle varchar(45) NOT NULL,
Autor varchar (30) NOT NULL
);

CREATE TABLE prestamos
(
n_p int AUTO_INCREMENT ,
DNI varchar(10) NOT NULL,
CONSTRAINT fk_Perprestamos FOREIGN KEY (DNI)
REFERENCES clientes(DNI),
ISBN varchar(13) NOT NULL,
CONSTRAINT fk_Perprestamos1 FOREIGN KEY (ISBN)
REFERENCES libros(ISBN),
PRIMARY KEY (n_p,DNI,ISBN)
);