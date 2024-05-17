/* SQL CREATE REGISTER TABLE */

create table register(
    id integer auto_increment primary key,
	email varchar(255) not null,
    user varchar(255) not null,
    password varchar(255) not null
)

/* SQL CREATE LOGIN TABLE */

create table login(
    id integer auto_increment primary key,
	email varchar(255) not null,
    password varchar(255) not null
)