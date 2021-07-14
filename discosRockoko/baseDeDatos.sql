drop database if exists discosRockoko;
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
    idInstrumento int,
    primary key(idMusico),
    foreign key(idInstrumento) references instrumentosMusicales(idInstrumento)
);
create table bandas(
	idBanda int auto_increment,
    nombre varchar(30),
    fechaCreacion date,
    fechaDisolucion date,
    paisOrigen varchar(20),
    primary key(idBanda)
);
create table creacionBandas(
	idCreacionBanda int auto_increment,
	idGenero int,
    idMusico int,
    idBanda int,
    primary key(idCreacionBanda),
    foreign key(idGenero) references generosMusicales(idGenero),
    foreign key(idMusico) references musicos(idMusico),
    foreign key(idBanda) references bandas(idBanda)
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
    idTitulo int,
    idCreacionBanda int,
    primary key(idAlbum),
    foreign key(idTitulo) references tituloCanciones(idTitulo),
    foreign key(idCreacionBanda) references creacionBandas(idCreacionBanda)
);
insert into generosMusicales values	('Pop'),
									('Metal'),
                                    ('Rock');
insert into instrumentosMusicales values ('Guitarra Electrica'),
									     ('Bateria'),
                                         ('Cantante'),
                                         ('Teclados'),
                                         ('Bajo');
insert into musicos values ('Juan Lopez', 'calle 25 #30-60', '5236489', 37, 3),
						   ('Luis Gonzales', 'carrera 20 #10-15', '4563214', 29, 1),
                           ('Andres Martinez', 'avenida tupita', '5695230', 38, 2),
                           ('Carlos Palacios', 'calle 50 #20-14', '3265984', 42, 3),
                           ('Alejandra Mena', 'calle 7 #10-35', '7894561', 32, 5),
                           ('Camilo Muños', 'carrera 25 #17-50', '5214789', 33, 1),
                           ('Pedro Zapata', 'avenida poraqui', '5123467', 25, 2),
                           ('Sebastian Molina', 'calle 23 #38-49', '7412589', 34, 5),
                           ('Andrea Serna', 'calle 53 #16-43', '3698521', 31, 4);
insert into bandas values ('MetalFree','1998-10-15',null,'Colombia'),
						  ('ProRock','1992-11-13','2017-01-19','Colombia');
