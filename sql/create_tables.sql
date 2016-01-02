-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Customer(
 id SERIAL PRIMARY KEY,
 name varchar(50) NOT NULL,
 phone INTEGER NOT NULL,
 e_mail varchar(50) NOT NULL
);

CREATE TABLE Receiver(
 id SERIAL PRIMARY KEY,
 name varchar(50) NOT NULL,
 address varchar(60) NOT NULL,
 phone INTEGER NOT NULL,
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
 amount INTEGER,
 ordered DATE,
 arrived DATE
);

CREATE TABLE Car(
 id SERIAL PRIMARY KEY,
 driver varchar(50),
 licence varchar(20),
 cartype varchar(50)
);

CREATE TABLE Transport(
 car_id INTEGER PRIMARY KEY REFERENCES Car(id),
 waybill_id INTEGER REFERENCES Waybill(id),
 handler_id INTEGER REFERENCES Worker(id),
 city varchar(50) NOT NULL
);
