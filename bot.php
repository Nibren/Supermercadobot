<?php

$token = "8769706438:AAEuRrkvz8TRqi3svGDbEARtKsnn0xvTQrU";
$website = "https://api.telegram.org/bot".$token;

$update = file_get_contents("php://input");
$update = json_decode($update, true);

if(isset($update["message"])){

    $chatId = $update["message"]["chat"]["id"];
    $message = strtolower($update["message"]["text"]);

    // Respuesta para /start
    if($message == "/start"){
        $response = "Hola 👋 Bienvenido al supermercado. Pregunta por un producto.";
    }
    elseif (strpos($message, "carne") !== false || strpos($message, "queso") !== false || strpos($message, "jamon") !== false) {
        $response = "Los productos están en el Pasillo 1";
    }
    elseif (strpos($message, "leche") !== false || strpos($message, "yogurth") !== false || strpos($message, "cereal") !== false) {
        $response = "Los productos están en el Pasillo 2";
    }
    elseif (strpos($message, "bebidas") !== false || strpos($message, "jugos") !== false) {
        $response = "Los productos están en el Pasillo 3";
    }
    elseif (strpos($message, "pan") !== false || strpos($message, "pasteles") !== false || strpos($message, "tortas") !== false) {
        $response = "Los productos están en el Pasillo 4";
    }
    elseif (strpos($message, "detergente") !== false || strpos($message, "lavaloza") !== false) {
        $response = "Los productos están en el Pasillo 5";
    }
    else {
        $response = "No entiendo la pregunta";
    }

    // Enviar respuesta a Telegram
    file_get_contents($website."/sendMessage?chat_id=".$chatId."&text=".urlencode($response));
}

?>
