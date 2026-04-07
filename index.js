const express = require("express");
const app = express();

app.use(express.json());

const TOKEN = "TU_TOKEN";
const URL = `https://api.telegram.org/bot${TOKEN}`;

app.post("/", async (req, res) => {
    const message = req.body.message;

    if (!message) return res.sendStatus(200);

    const chatId = message.chat.id;
    const text = message.text.toLowerCase();

    let response = "";

    if (text === "/start") {
        response = "Hola 👋 Bienvenido al supermercado.";
    } 
    else if (text.includes("carne") || text.includes("queso") || text.includes("jamon")) {
        response = "Pasillo 1";
    } 
    else if (text.includes("leche") || text.includes("yogurth") || text.includes("cereal")) {
        response = "Pasillo 2";
    } 
    else if (text.includes("bebidas") || text.includes("jugos")) {
        response = "Pasillo 3";
    } 
    else if (text.includes("pan") || text.includes("pasteles") || text.includes("tortas")) {
        response = "Pasillo 4";
    } 
    else if (text.includes("detergente") || text.includes("lavaloza")) {
        response = "Pasillo 5";
    } 
    else {
        response = "No entiendo la pregunta";
    }

    await fetch(`${URL}/sendMessage`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            chat_id: chatId,
            text: response
        })
    });

    res.sendStatus(200);
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log("Bot funcionando");
});
