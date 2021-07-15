# Proyecto SENA-CENSA
La compañía discográfica: discos Rockoko, quiere almacenar la información de las bandas musicales y sus respectivos músicos. 

De las bandas la quiere almacenar, el nombre de la banda, el género al cual pertenecen, fecha de creación, fecha de disolución y el país al cual pertenecen. Una banda puede tocar varios géneros musicales. 

Las bandas pueden tener varios integrantes (músicos), de estos se desea conocer el nombre, dirección, teléfono, edad. Es importante tener en cuenta que un músico puede tocar varios instrumentos y pertenecer a varias bandas. En cada una de estas puede tocar un instrumento diferente. 

Las bandas tienen álbumes de los cuales se almacena el nombre, fecha, título de las canciones, en ocasiones la disquera saca álbumes en los cuales pueden participar varias bandas. 

## Base de Datos
 * generosMusicales(idGenero ,descripcion)
 * instrumentosMusicales(idInstrumento ,descripcion)
 * musicos(idMusico, nombre, direccion, telefono, edad)
 * instrumentosMusico(idMusico ,idInstrumento)
 * bandas(idBanda, nombre, fechaCreacion, fechaDisolucion, paisOrigen)
 * bandasMusico(idBanda, idMusico)
 * bandasgenero(idBanda, idGenero)
 * tituloCanciones(idTitulo, descripcion)
 * albumes(idAlbum, nombre, fechaLanzamiento)
 * albumCanciones(idAlbum,idTitulo)
 * albumBandas(idAlbum, idBanda)
 * administradores(idAdministrador, nombre, password)
