CREATE TABLE usuario(
id INT(11) NOT NULL,
nombre VARCHAR(10) NOT NULL,
appat VARCHAR(15) NOT NULL,
puesto VARCHAR(15) NOT NULL,
nss VARCHAR(11) NOT NULL,
salario INT(7,2) NOT NULL,
status CHAR(1) NULL,
CONSTRAINT usu_id_pk PRIMARY KEY (id),	
CONSTRAINT usu_nss_uk UNIQUE (nss));

CREATE TABLE motivo(
id INT(11) NOT NULL,
nombre VARCHAR(20) NOT NULL,
CONSTRAINT mot_id_pk PRIMARY KEY (id));

CREATE TABLE derecho(
id INT(11) NOT NULL,
derecho VARCHAR(50) NOT NULL,
motivo INT(11) NOT NULL,
CONSTRAINT der_id_pk PRIMARY KEY (id),
CONSTRAINT der_mot_fk FOREIGN KEY (motivo) REFERENCES motivo (id));

CREATE TABLE indemnizacion(
id INT(11) NOT NULL,
motivo INT(11) NOT NULL,
usuario INT(11) NOT NULL,
CONSTRAINT ind_id_pk PRIMARY KEY (id),
CONSTRAINT ind_mot_fk FOREIGN KEY (motivo) REFERENCES motivo (id),
CONSTRAINT ind_usu_fk FOREIGN KEY (usuario) REFERENCES usuario (id));