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
	$full_path_website = dirname( __DIR__ );
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
		$sql       = '';
		$statement = $connection->query( $sql );

		$feed = [];
		foreach ( $statement as $foto ) {
			// TODO: Voeg hier alle rijen toe aan de $feed array

			// TODO: Probeer de function getBaseUrl() te gebruiken om ook de volledige url naar het plaatje te berekenen
			// TODO Voeg dat toe aan de gegevens van elke foto
		}

		// De feed array teruggeven
		return $feed;

	} catch ( PDOException $e ) {
		echo 'Fout bij database verbinding:<br>' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
		exit;
	}
}
