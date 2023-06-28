Nombre : Fabian Esteban Becerra Gonzalez.
Curso: J1 Ma;ana.

Instrucciones SQL:

CREATE DATABASE campuslands;

USE campuslands;

CREATE TABLE pais(
	idPais INT AUTO_INCREMENT,
	nombrePais VARCHAR(50) UNIQUE NOT NULL,
	CONSTRAINT pk_pais PRIMARY KEY (idPais) 
);

CREATE TABLE departamento(
	idDep INT AUTO_INCREMENT,
	nombreDep VARCHAR(50) UNIQUE NOT NULL,
	idPais INT,
	CONSTRAINT pk_departamento PRIMARY KEY (idDep),
	CONSTRAINT fk_paisDep FOREIGN KEY (idPais) REFERENCES pais (idPais)
);

CREATE TABLE region(
	idReg INT AUTO_INCREMENT,
	nombreReg VARCHAR(60) UNIQUE NOT NULL,
	idDep INT,
	CONSTRAINT pk_region PRIMARY KEY (idReg),
	CONSTRAINT fk_regDep FOREIGN KEY (idDep) REFERENCES departamento (idDep)
);

CREATE TABLE campers(
	idCamper INT AUTO_INCREMENT,
	nombreCamper VARCHAR(50) NOT NULL,
	apellidoCamper VARCHAR(50) NOT NULL,
	fechaNac DATE NOT NULL,
	idReg INT,
	CONSTRAINT pk_campers PRIMARY KEY (idCamper),
	CONSTRAINT fk_campReg FOREIGN KEY (idReg) REFERENCES region (idReg)
);

INSERT INTO pais (nombrePais) VALUES ('Colombia');

INSERT INTO departamento (nombreDep, idPais) VALUES ('Santander', 5);

INSERT INTO region (nombreReg, idDep) VALUES ('Piedecuesta', 1);

