Drop database if exists discosRockoko;
create database discosRockoko;
use discosRockoko;
create table generosMusicales(
	idGenero int auto_increment,
    descripcion varchar(50),
    primary key(idGenero)
);
create table instrumentosMusicales(
	idInstrumento int auto_increment,
    descripcion varchar(50),
    primary key(idInstrumento)
);
create table musicos(
	idMusico int auto_increment,
    nombre varchar(30),
    direccion varchar(70),
    telefono varchar(15),
    edad int,    
    primary key(idMusico)
    
);
create table instrumentosMusico(
	idMusico int,
    idInstrumento int,
    PRIMARY KEY(idInstrumento,idMusico),
    foreign key(idInstrumento) references instrumentosMusicales(idInstrumento),
    foreign key(idMusico) references musicos(idMusico)
);
create table bandas(
	idBanda int auto_increment,
    nombre varchar(30),
    fechaCreacion date,
    fechaDisolucion date,
    paisOrigen varchar(20),
    primary key(idBanda)
);
create table bandasMusico(
	
);
create table bandasgenero(
	
);
create table tituloCanciones(
	idTitulo int auto_increment,
    descripcion varchar(50),
    primary key(idTitulo)
);
create table albumes(
	idAlbum int auto_increment,
    nombre varchar(30),
    fechaLanzamiento date,
    primary key(idAlbum)
);
CREATE TABLE albumCanciones(

);
CREATE TABLE albumBandas(

);
insert into generosMusicales(descripcion) values	('Pop'),
									('Metal'),
                                    ('Rock');
                                    
insert into instrumentosMusicales(descripcion) values ('Guitarra Electrica'),
									     ('Bateria'),
                                         ('Cantante'),
                                         ('Teclados'),
                                         ('Bajo');
                                         
insert into musicos values (1,'Juan Lopez', 'calle 25 #30-60', '5236489', 37),
						   (2,'Luis Gonzales', 'carrera 20 #10-15', '4563214', 29),
                           (3,'Andres Martinez', 'avenida tupita', '5695230', 38),
                           (4,'Carlos Palacios', 'calle 50 #20-14', '3265984', 42),
                           (5,'Alejandra Mena', 'calle 7 #10-35', '7894561', 32),
                           (6,'Camilo Muños', 'carrera 25 #17-50', '5214789', 33),
                           (7,'Pedro Zapata', 'avenida poraqui', '5123467', 25),
                           (8,'Sebastian Molina', 'calle 23 #38-49', '7412589', 34),
                           (9,'Andrea Serna', 'calle 53 #16-43', '3698521', 31);
                           
insert into bandas values (1,'MetalFree','1998-10-15',null,'Colombia'),
						  (2,'ProRock','1992-11-13','2017-01-19','Colombia');

