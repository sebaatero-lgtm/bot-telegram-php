<?php

$token = "8781839744:AAEA4r4AqdrUUQnUQRvnudDjdgUfQyj3nNU";

$update = json_decode(file_get_contents("php://input"), true);

if (!$update) {
    echo "OK";
    exit;
}

$chat_id = $update["message"]["chat"]["id"];
$text = strtolower($update["message"]["text"] ?? "");

$respuesta = "No entiendo, Vuelve a preguntar";

if ($text == "/start") {
    $respuesta = "Hola, soy tu bot, Que deseas buscar?";
}
elseif (strpos($text, "carne") !== false || strpos($text, "queso") !== false) {
    $respuesta = "Se encuentra en el Pasillo 1";
}
elseif (strpos($text, "leche") !== false) {
    $respuesta = "Se encuentra en el Pasillo 2";
}
elseif (strpos($text, "bebida") !== false) {
    $respuesta = "Se encuentra en el Pasillo 3";
}
elseif (strpos($text, "pan") !== false) {
    $respuesta = "Se encuentra en el Pasillo 4";
}
elseif (strpos($text, "detergente") !== false) {
    $respuesta = "Se encuentra en el Pasillo 5";
}

file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($respuesta));

echo "OK";
?>
