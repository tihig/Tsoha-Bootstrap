-- Lisää INSERT INTO lauseet tähän tiedostoon
INSERT INTO Customer (name, password, phone, e_mail) VALUES ('Erkki Esimerkki', 'Erkki123','04012345', 'erkki@esimerkki.com');
INSERT INTO Unit (productname, weight, loading_format, info) VALUES ('kissanruoka', '200', 'lava', 'Jos ongelmia, soita!');
INSERT INTO Receiver (name, address, post_code, city, phone) VALUES ('Miukumaukun murkina', 'Kissatie 2', '124235', 'afdsfs', '1234567');
INSERT INTO Waybill (amount, ordered, arrived) VALUES ('1', NOW(), '12.12.2020');