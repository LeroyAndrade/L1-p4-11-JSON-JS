# BAP: Hands-On JSON

Voorbeeldcode aanlsuitend op de lessen van Simon over JSON.  

JSON kun je ook genereren in de backend met de PHP function `json_encode`
Je roept dan een PHP script aan wat de JSON genereert en teruggeeft. Ook kun je gegevens in JSON formaat naar de server sturen en met `json_decode` omzetten naar een `array`.
Zo kun je die gegevens weer in een handig formaat omzetten en gebruiken.

## Opdracht: Maak de code werkend zodat de feed wordt ingeladen uit de database (via feed.php)

**Importeer eerst het `fotofeed.sql` bestand**
In de code zitten op een aantal plekken comments met een **TODO**
Dat zijn plekken waar jouw developer skills nodig zijn. Maak de code werkend. 

### In de backend
1. Maak de query werkend zodat de juiste gegevens van fotos opgehaald worden
2. Bonus: Gebruik een JOIN SQL statement om ook de gebruikers informatie meteen te koppelen en op te halen
3. Test de feed door feed.php op te vragen in je browser, bekijk de structuur goed
4. Zorg dat wachtwoord NIET wordt opgehaald (tip: SELECT alleen de kolommen die je wilt)
5. In de database staat wel de filename, maar hoe maak je hier een goed werkende url van?
6. Zorg dat in de feed ook de volledige url naar de afbeelding komt (zo kan de afbeelding altijd worden ingeladen)

### In de frontend:
- Zorg dat met de XMLHTTPRequest de juiste url (met de JSON data) wordt ingeladen
- Pas de javascript code aan zodat voor elke foto een DIV met een IMG wordt gemaakt, en dat IMG de juiste src inlaadt uit de feed
- Lees ook andere gegevens uit de JSON en toon deze in de HTML

## Tips
- Bekijk goed wat de feed allemaal voor informatie bevat door `feed.php` op te vragen als je deze werkend hebt
- Gebruik de web inspector om te kijken welke XMLHTTPRequests er verstuurd worden (tabje XHR in web inspector)
- Kijk of de plaatjes goed worden opgevraagd
- Om javascript fouten op te sporen (Console tabje in web inspector)
