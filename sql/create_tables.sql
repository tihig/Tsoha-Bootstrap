-- Lisää CREATE TABLE lauseet tähän tiedostoon
--address varchar(60) NOT NULL, en saanut tungettua customeriin
CREATE TABLE Customer(
 id SERIAL PRIMARY KEY,
 name varchar(50) NOT NULL,
 phone varchar(30) NOT NULL,
 e_mail varchar(50) NOT NULL
);

CREATE TABLE Receiver(
 id SERIAL PRIMARY KEY,
 name varchar(50) NOT NULL,
 address varchar(60) NOT NULL,
 postcode varchar(50),
 city varchar(50),
 phone varchar(30) NOT NULL,
 e_mail varchar(50)
);

CREATE TABLE Worker(
 id SERIAL PRIMARY KEY,
 name varchar(50) NOT NULL,
 password varchar(50) NOT NULL
);

CREATE TABLE Unit(
 id SERIAL PRIMARY KEY,
 waybill_id INTEGER REFERENCES Waybill(id),
 productname varchar(50) NOT NULL,
 weight INTEGER,
 velocity INTEGER,
 demand varchar(50),
 un_number INTEGER,
 loading_format varchar(50) NOT NULL,
 info varchar(100)
);

CREATE TABLE Waybill(
 id SERIAL PRIMARY KEY,
 customer_id INTEGER REFERENCES Customer(id),
 receiver_id INTEGER REFERENCES Receiver(id),
 ordered DATE,
 arrived DATE
);

