DROP TABLE IF EXISTS user;

CREATE TABLE user (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255),
    businessName VARCHAR(255),
    level INT NOT NULL,
    sector VARCHAR(255),
    phone VARCHAR(255),
    email VARCHAR(255) NOT NULL UNIQUE,
    isActive BOOLEAN NOT NULL
);

INSERT INTO user(username, password, businessName, level, sector, phone, email, isActive) VALUES ('jime', 'jime', 'businessName', 1, 'sector', 'phone', 'jime@test.com', true);
INSERT INTO user(username, password, businessName, level, sector, phone, email, isActive) VALUES ('jime2', 'jime2', 'businessName', 2, 'sector', 'phone', 'jime@test2.com', true);


DROP TABLE IF EXISTS client;

CREATE TABLE client (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    creationDate DATETIME NOT NULL,
    salesMan VARCHAR(255),
    address VARCHAR(255),
    postalCode VARCHAR(255),
    businessName VARCHAR(255) NOT NULL,
    businessAddress VARCHAR(255),
    tangoId INT UNIQUE,
    cashPayment BOOLEAN,
    town VARCHAR(255),
    cuit VARCHAR(255),
    phoneNumber1 VARCHAR(255),
    phoneNumber2 VARCHAR(255),
    ivaStatus INT NOT NULL,
    brand VARCHAR(255),
    brandSector VARCHAR(255),
    email VARCHAR(255),
    observations TEXT,
    contact VARCHAR(255),
    contactHour VARCHAR(255)
);

INSERT INTO client(creationDate, businessName, ivaStatus, tangoId) values (NOW(), 'test client', 1, 1);
INSERT INTO client(creationDate, businessName, ivaStatus, tangoId) values (NOW(), 'test client', 2, 2);
INSERT INTO client(creationDate, businessName, ivaStatus, tangoId) values (NOW(), 'test client', 3, 3);
INSERT INTO client(creationDate, businessName, ivaStatus, tangoId) values (NOW(), 'test client', 4, 4);
INSERT INTO client(creationDate, businessName, ivaStatus, tangoId) values (NOW(), 'test client', 5, 5);


