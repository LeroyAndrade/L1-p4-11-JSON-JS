<?php
// Voorbeeld hoe je een array uit PHP in json kunt omzetten (encoden)

$data = [
	'id' => 1,
	'naam' => 'Leuke foto',
	'filename' => 'myphoto.jpg'
];

header( 'Content-type: application/json;charset=utf-8' );
echo json_encode($data);



