<?php
require 'includes/functions.php';

$connection = dbConnect();
// TODO Roep de juiste function aan om de feed op te halen, wat geef je aan deze function?
$feed =getFeedFotos($connection);

// TODO: Gebruik json_encode functie om alles om te zetten naar een json formaat
$json = json_encode($feed);

// Juiste Content-type header sturen naar de client
header( 'Content-type: application/json;charset=utf-8' );

// TODO: Hier de json echo-en
echo $json;
?>

