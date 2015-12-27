-- Lisää INSERT INTO lauseet tähän tiedostoon
INSERT INTO Customer (name, password, phone, e_mail) VALUES ('Erkki Esimerkki', 'Erkki123','04012345', 'erkki@esimerkki.com');
INSERT INTO Unit (productname, weight, loading_format, info) VALUES ('kissanruoka', '200', 'lava', 'Jos ongelmia, soita!');
INSERT INTO Receiver (name, address, phone) VALUES ('Miukumaukun murkina', 'Kissatie 2', '1234567');
INSERT INTO Waybill (unit_id, customer_id, receiver_id, amount, arrived) VALUES ((SELECT id FROM UNIT WHERE productname='kissanruoka'),(SELECT id FROM Customer WHERE name='Erkki Esimerkki'),(SELECT id FROM RECEIVER WHERE name='Miukumaukun murkina'), '1', '12.12.2020');