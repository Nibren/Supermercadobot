<?php

$token = "8769706438:AAEuRrkvz8TRqi3svGDbEARtKsnn0xvTQrU";
$website = "https://api.telegram.org/bot".$token;

// Obtener datos
$update = file_get_contents("php://input");
$update = json_decode($update, TRUE);

if(isset($update["message"])){

    $chatId = $update["message"]["chat"]["id"];
    $message = strtolower($update["message"]["text"]);

    if($message == "/start"){
        $response = "Hola 👋 Bienvenido al supermercado.";
    }
    elseif (strpos($message, "carne") !== false || strpos($message, "queso") !== false || strpos($message, "jamon") !== false) {
        $response = "Pasillo 1";
    }
    elseif (strpos($message, "leche") !== false || strpos($message, "yogurth") !== false || strpos($message, "cereal") !== false) {
        $response = "Pasillo 2";
    }
    elseif (strpos($message, "bebidas") !== false || strpos($message, "jugos") !== false) {
        $response = "Pasillo 3";
    }
    elseif (strpos($message, "pan") !== false || strpos($message, "pasteles") !== false || strpos($message, "tortas") !== false) {
        $response = "Pasillo 4";
    }
    elseif (strpos($message, "detergente") !== false || strpos($message, "lavaloza") !== false) {
        $response = "Pasillo 5";
    }
    else {
        $response = "No entiendo la pregunta";
    }

    file_get_contents($website."/sendMessage?chat_id=".$chatId."&text=".$response);
}

?>
