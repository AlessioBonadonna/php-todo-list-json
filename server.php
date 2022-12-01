<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-Requested-With"); //evitare il cros
$file_texts = file_get_contents('./data.json', true); //per renderlo assocutativo bisogna mettere il , true
$todos = json_decode($file_texts); //decodificare il json ;



header('Content-Type: application/json');

echo json_encode($todos,  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);