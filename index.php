<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Galerij</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Simon">
    <link rel="stylesheet" href="css/json.css">
</head>
<body>

<div>
    <h1>Latest fotos</h1>
    <button id="json-btn">Haal JSON op</button>
    <p>Hieronder moet (als je op de button klikt) een JSON feed worden opgehaald met javascript, uit de backend (PHP). Voor elke foto in de feed wordt een DIV element met foto informatie
        gegenereerd in Javascript ;-)</p>

    <main id="feed">
        Hier komen de ingeladen fotos uit de JSON feed

        <img src="data:image/png;base64,<?php echo $encoded?>"/>
<?php
        $data1=[
          'titel' => 'Mooi foto',
          'likes' => 342,
          'lid' => 'Hans'
        ];
        header('Content-type; application/json');
        $json = json_encode($data1);
        //todo: output sanityze research
           //JSON decode gaat de tekst include

        echo print_r($json);
        ?>
    </main>
</div>

<script src="json.js"></script>
</body>
</html>
