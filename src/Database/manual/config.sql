/* SQL CREATE DATABASE */
CREATE DATABASE drazictunningcar;

/* SQL CREATE REGISTER TABLE */
CREATE TABLE register(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
	email VARCHAR(255) NOT NULL,
    user VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
)

/* SQL CREATE SERVICES TABLE */
    CREATE TABLE services(
        id INTEGER AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        description VARCHAR(255) NOT NULL,
        nameMechanic VARCHAR(255) NOT NULL,
        nameClient VARCHAR(255) NOT NULL,
        brandCarClient VARCHAR(255) NOT NULL,
        modelCarClient VARCHAR(255) NOT NULL,
        plateCarClient VARCHAR(255) NOT NULL,
        namePart VARCHAR(255) NOT NULL
    )

/* SQL CREATE MECHANICS TABLE */
    CREATE TABLE mechanics(
        id INTEGER AUTO_INCREMENT PRIMARY KEY,
        firstName VARCHAR(255) NOT NULL,
        lastName VARCHAR(255) NOT NULL,
        age INTEGER NOT NULL,
        emailMechanic VARCHAR(255) NOT NULL,
        gender CHAR(1) NOT NULL,
        specialty VARCHAR(255) not null
    )

/* SQL CREATE PARTS TABLE */

CREATE TABLE parts(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    partBrand VARCHAR(255) NOT NULL,
    partModel VARCHAR(255 NOT NULL)
    fabricationDate DATE NOT NULL,
)