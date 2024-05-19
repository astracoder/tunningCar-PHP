/* SQL CREATE REGISTER TABLE */

create table register(
    id integer auto_increment primary key,
	email varchar(255) not null,
    user varchar(255) not null,
    password varchar(255) not null
)

/* SQL CREATE MECHANICS TABLE */

create table mechanics(
    id integer auto_increment primary key,
    firstName varchar(255) not null,
    lastName varchar(255) not null,
    age integer not null,
    emailMechanic varchar(255) not null,
    gender char(1) not null,
    specialty varchar(255) not null
)