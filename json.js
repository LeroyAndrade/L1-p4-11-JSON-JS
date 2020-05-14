// Ophalen output div om alle foto items aan toe te voegen
let feedOutput = document.getElementById('feed');

// TODO: Haal de json button op met getElementById
let jsonButton=document.getElementById("json-btn");

function createFeedHTML(feed){

    // Door elke rij in de feed loopen
    for (let i = 0; i < feed.length; i++) {

        // De huidige rij ophalen
        let fotoInfo = feed[i];

        let feedItem = document.createElement('div');
        feedItem.className = 'item';

        let fotoTitel = document.createElement('h1');
        fotoTitel.innerHTML = fotoInfo.titel;

        //Op volgorde laat zien: Titel
        feedItem.append(fotoTitel);


        let fotogebruiker_id = document.createElement('h2');
        fotogebruiker_id.innerHTML = fotoInfo.gebruiker_id;

        //Op volgorde laat zien: gebruiker_id
        feedItem.append(fotogebruiker_id);

        let fotoUser = document.createElement('h3');
        fotoUser.innerHTML = fotoInfo.username;

        //Op volgorde laat zien: gebruikersnaam
        feedItem.append(fotoUser);

        let fotoDatum = document.createElement('h4');
        fotoDatum.innerHTML = fotoInfo.datum;

        // TODO: Voeg hier andere informatie van de foto (gebruikersnaam, datum...?)

        let fotoImage = document.createElement('img');
       // fotoImage.src = "images/"+fotoInfo.filename;  // Hier moet natuurlijk de juiste url komen uit de feed
        fotoImage.src = fotoInfo.url;  // Hier moet natuurlijk de juiste url komen uit de feed
        fotoImage.title = fotoInfo.titel;

        //Op volgorde laat zien: Foto
        feedItem.append(fotoImage);

      //Op volgorde laat zien: Datum
        feedItem.append(fotoDatum);

        //Voeg alles samen
        feedOutput.append(feedItem);
    }

}


function requestListener() {

    //Parse geeft een gestructureerd object terug
    let feed = JSON.parse(this.responseText);
    // TODO: Roep hier de functie aan die de feed verwerkt
    createFeedHTML(feed);
}

function loadFeed() {
    let request = new XMLHttpRequest();

  // TODO: Zet de juiste url voor de feed hier
    //let jsonUrl = fotoImage.src;

    //let my_var = <?php  echo json_encode($url2);?>
    let jsonUrl = "feed.php";

//    request.addEventListener("load", handleRequest);
//wanner JSON is geladen, zal het requestListenaar opvragen en die zal wat met JSON doen
    request.addEventListener("load", requestListener);

            //dit is de url die je gaat opvragen: jsonUrl
    request.open("GET", jsonUrl, true);
    //en stuur maar op
    request.send();
}

// TODO: Zorg dat als je op de jsonButton klikt dat de functie load loadFeed wordt aangeroepen
jsonButton.addEventListener('click', loadFeed);



function handleRequest(){
    let jsonData=json.parse(this.responseText);
    console.log(jsonData);
}