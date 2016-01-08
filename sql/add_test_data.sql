-- Lisää INSERT INTO lauseet tähän tiedostoon
INSERT INTO Customer (name, phone, e_mail) VALUES ('Erkki Esimerkki', '04012345', 'erkki@esimerkki.com');
INSERT INTO Unit (waybill_id, productname, weight, loading_format, info) VALUES ((SELECT id FROM Waybill WHERE amount='1'),'kissanruoka', '200', 'lava', 'Jos ongelmia, soita!');
INSERT INTO Receiver (name, address, phone) VALUES ('Miukumaukun murkina', 'Kissatie 2', '1234567');
INSERT INTO Waybill (customer_id, receiver_id, amount, arrived) VALUES ((SELECT id FROM Customer WHERE name='Erkki Esimerkki'),(SELECT id FROM RECEIVER WHERE name='Miukumaukun murkina'), '1', '12.12.2020');