# Tietokantasovellus Logistix

Yleisiä linkkejä:

* [Linkki sovellukseeni](vnissila.users.cs.helsinki.fi/logistix/)
* [Linkki dokumentaatiooni](https://github.com/tihig/Tsoha-Bootstrap/blob/master/doc/dokumentaatio.pdf)

## Rahtikirjojenkäsittely sivusto

Tämän sivuston aiheena on rahtikirjojen muokkaamiseen ja tallentamiseen käytettävä verkkotyökalu, joka on tarkoitettu logistiikka-alan yrityksille.
Sivustolle on mahdollista tallentaa rahtikirjoja. Rahtikirjatallennuksen yhteydessä tallennetaan sivustolle sekä lähettäjän että vastaanottajan tiedot. Niitä voidaan käyttää useissa muissakin rahtikirjoissa, joten saman lähettäjän tai vastaanottajan tietoja ei tarvitse moneen kertaan näppäillä sivustolle. 
Rahtikirjoihin voidaan lisätä ja poistaa tuotteita. Tuotteisiin voidaan kirjoittaa erityiset kuljetusvaatimukset sekä mahdolliset vakkitiedot (vaarallisten aineiden kuljetustiedot) UN- numerolla ilmoitettuna. 

## Testitunnukset

Käyttäjätunnus: testi
Ss: testi123

## Mikä ei toimi sivustolla

- Hakutoiminnallisuus
- Muokkaaminen, update- lauseen laittaminen PSQL:n ohjeilla aiheuttaa sivuston näkyvyyden katoamisen tai insert into- tavalla ei vain toimi
- lähettäjien ja vastaanottajien poisto: niitä, jotka liittyivät johonkin rahtikirjaan ei voitu poistaa järkevästi

