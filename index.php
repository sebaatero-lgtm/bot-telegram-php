<?php

$token = "8781839744:AAEA4r4AqdrUUQnUQRvnudDjdgUfQyj3nNU";

$update = json_decode(file_get_contents("php://input"), true);

if (!$update) {
    echo "OK";
    exit;
}

$chat_id = $update["message"]["chat"]["id"];
$text = strtolower($update["message"]["text"] ?? "");

$respuesta = "No entiendo";

if ($text == "/start") {
    $respuesta = "Hola, soy tu bot";
}
elseif (strpos($text, "carne") !== false || strpos($text, "queso") !== false) {
    $respuesta = "Pasillo 1";
}
elseif (strpos($text, "leche") !== false) {
    $respuesta = "Pasillo 2";
}
elseif (strpos($text, "bebida") !== false) {
    $respuesta = "Pasillo 3";
}
elseif (strpos($text, "pan") !== false) {
    $respuesta = "Pasillo 4";
}
elseif (strpos($text, "detergente") !== false) {
    $respuesta = "Pasillo 5";
}

file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($respuesta));

echo "OK";
?>
