/* pw_biblioteca-schema - v1.0 */

drop table if exists libros cascade;
create table libros
(
  id_libro serial,
  isbn_libro varchar(13) primary key,
  titulo_libro varchar (150) not null,
  editorial_libro varchar (60),
  anio_publicacion_libro int
);

drop table if exists autores cascade;
create table autores
(
  id_autor serial primary key,
  nombre_autor varchar (80) not null,
  nacionalidad_autor varchar (30)
);

drop table if exists libros_autores cascade;
create table libros_autores
(
  isbn varchar(13) references libros (isbn_libro),
  autor int references autores (id_autor),
  constraint pk_isbn_autor primary key (isbn, autor)
);

drop table if exists ejemplares cascade;
create table ejemplares
(
  id_ejemplar serial primary key,
  observaciones_ejemplar varchar(200),
  isbn varchar(13) references libros (isbn_libro)
);
