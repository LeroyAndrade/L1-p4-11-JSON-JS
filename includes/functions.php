<?php
/**
 * Verbinding met de database maken
 *
 * @return bool|PDO
 */
function dbConnect() {

	// Lees het config bestand in en sla de array uit config op in een variabele
	$config = require( __DIR__ . '/config.php' );

	try {
		// Verbinding maken met gebruik van de database instellingen die in de config array zijn opgeslagen
		$connection = new PDO( 'mysql:host=' . $config['hostname'] . ';dbname=' . $config['database'], $config['username'], $config['password'] );
		$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$connection->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );

		return $connection;

	} catch ( PDOException $e ) {
		echo $e->getMessage();
	}

	return false;

}

/**
 * Geeft het pad op naar de huidige website
 * Daar kun je dan een pad achter plakken zodat je altijd een volledige url krijgt
 */
function getWebsiteBaseUrl() {
/*
	$full_path_website = dirname( __DIR__ );
	$document_root     = $_SERVER['DOCUMENT_ROOT'];
*/
	$full_path_website = str_replace( '\\', '/', dirname( __DIR__ ) );
	$document_root     = $_SERVER['DOCUMENT_ROOT'];

	// Pak alleen het pad
	$relative_server_path = str_replace( $document_root, '', $full_path_website );

	$protocol = 'http://';
	if ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ) {
		$protocol = 'https://';
	}
	$host = $_SERVER['HTTP_HOST'];

	return $protocol . $host . $relative_server_path;

}

/**
 * Haal alle foto's met gebruikers informatie op uit de database
 *
 * @param PDO $connection
 *
 * @return array
 */
function getFeedFotos( PDO $connection ) {

	try {
		// TODO: Maak hier de query die alle foto's ophaalt en gebruik een LEFT JOIN om ook de gebruikers informatie meteen op te halen
	//	$sql       = 'SELECT * FROM fotos';
		$sql       = 'SELECT fotos.gebruiker_id,fotos.filename, fotos.titel, fotos.datum, gebruikers.username 
		FROM fotos LEFT JOIN gebruikers 
		on gebruikers.id = fotos.gebruiker_id LIMIT 4';
		$statement = $connection->query( $sql );

		//leeg array
		$feed = [];
		
		//Haal SQL data op
		foreach ( $statement as $foto ) {
// TODO: Probeer de function getBaseUrl() te gebruiken om ook de volledige url naar het plaatje te berekenen
			$url = getWebsiteBaseUrl() .  '/images/' . $foto['filename'];//filename is de db() tabel

			//sla website url bijv: localhost/images/zomervakantie&Leren.jpg 

			//Maak in de foto array een apparte
			$foto['url']=$url;
			// TODO: Voeg hier alle rijen toe aan de $feed array
			//Sla opgehaalde data op in een array als object!

				// TODO Voeg dat toe aan de gegevens van elke foto
			$feed[] = $foto;
			/*
			$rep=" ";
			echo 
			$foto['id'] 	      . $rep. 
			$foto['titel'] 		  . $rep.
			$foto['filename']	  . $rep.
			$foto['datum'] 		  . $rep.
			$foto['gebruiker_id'] . "\n";
			*/
			
		
		}

		// De feed array teruggeven
		return $feed;

	} catch ( PDOException $e ) {
		echo 'Fout bij database verbinding:<br>' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
		exit;
	}
}

?>