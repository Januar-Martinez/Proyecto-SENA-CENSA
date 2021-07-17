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
	idBanda int,
    idMusico int,
    PRIMARY KEY(idBanda,idMusico),
    foreign key(idBanda) references bandas(idBanda),
    foreign key(idMusico) references musicos(idMusico)
);
create table bandasgenero(
	idBanda int,
    idGenero int,
    PRIMARY KEY(idBanda,idGenero),
    foreign key(idBanda) references bandas(idBanda),
    foreign key(idGenero) references generosMusicales(idGenero)
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
	idAlbum int,
    idTitulo int,
    PRIMARY KEY(idAlbum,idTitulo),
    foreign key(idAlbum) references albumes(idAlbum),
    foreign key(idTitulo) references tituloCanciones(idTitulo)
);
CREATE TABLE albumBandas(
	idAlbum int,
    idBanda int,
	PRIMARY KEY(idAlbum,idBanda),
	foreign key(idAlbum) references albumes(idAlbum),
    foreign key(idBanda) references bandas(idBanda)
);
create table administradores(
	idAdministrador int auto_increment,
    nombre varchar(30),
    password varchar(32),
    PRIMARY KEY(idAdministrador)
);

insert into generosMusicales(descripcion) values ('Pop'),
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

insert into instrumentosMusico values(1,1),(2,2),(3,3),(4,4),(5,5),(6,1),(7,2),(8,3),(9,4),(1,4),(7,5),(9,1),(5,2),(4,3); 
         
insert into bandas values (1,'MetalFree','1998-10-15',null,'Colombia'),
						  (2,'ProRock','1992-11-13','2017-01-19','Colombia'),
                          (3, 'PopLife', '2000-09-25', null, 'Mexico'),
                          (4, 'LucesPR', '2013-05-23', null, 'Argentina');
                          
insert into bandasMusico values (1,1),(1,7),(1,3),(1,5),
								(2,6),(2,2),(2,8),(2,9),(2,7),
                                (3,1),(3,2),(3,8),(3,4),(3,5),
                                (4,9),(4,5),(4,4),(4,1),(4,7);
                                
insert into bandasgenero values (1,2),(2,3),(3,1),(4,1),(4,3);

insert into tituloCanciones(descripcion) values ('Mercurio'),('Venus'),('Tierra'),('Marte'),('Júpiter'),('Saturno'),('Urano'),('Neptuno'),
												('Amarillo'),('Azul'),('Rojo'),('Verde'),('Morado'),('Gris'),
                                                ('Tokio'),('Múnich'),('París'),('Nueva York'),('Boston'),('Londres');
                                                
insert into albumes values (1,'Solar System','2002-04-10'),
						   (2,'Colores','2015-06-19'),
                           (3,'Recorrido Musical','2016-07-29');
                           
insert into albumCanciones values (1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),
								  (2,9),(2,10),(2,11),(2,12),(2,13),(2,14),
                                  (3,15),(3,16),(3,17),(3,18),(3,19),(3,20);
                                  
insert into albumBandas values (1,1), (2,2), (2,4), (3,3), (3,4);

insert into administradores values (1, 'Januar Martinez', md5(123456)),
								   (2, 'Evelyn Betancur', md5(123456));