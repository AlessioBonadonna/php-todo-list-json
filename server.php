<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-Requested-With"); //evitare il cros
$file_texts = file_get_contents('./data.json');
$todos = json_decode($file_texts, true); //decodificare il json ; //per renderlo assocutativo bisogna mettere il , true
// var_dump($_POST);

if (isset($_POST['newTask'])) {
    $value = $_POST['newTask'];
    $new_todo = ["text" => $value, "done" => true];
    $todos[] = $new_todo;
    file_put_contents('./data.json', json_encode($todos));
} elseif (isset($_POST['done'])) {
    $classe = $_POST['done'];

    $todos[$classe]['done'] = !$todos[$classe]['done'];
    file_put_contents('./data.json', json_encode($todos));
} else {
    header('Content-Type: application/json');

    echo json_encode($todos,  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
}
