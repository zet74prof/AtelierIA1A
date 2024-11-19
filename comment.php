<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $comment = isset($_POST['comment']) ? $_POST['comment'] : '';
        $prompt = isset($_POST['prompt']) ? $_POST['prompt'] : '';

        // Construire la structure JSON en PHP
        $data = [
            "model" => "gpt-3.5-turbo",
            "messages" => [
                [
                    "role" => "system",
                    "content" => $prompt
                ],
                [
                    "role" => "user",
                    "content" => $comment
                ]
            ]
        ];

        // Encoder le tableau en JSON
        $json_data = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        // Afficher ou envoyer le JSON à l'API
        echo "<pre> Requete Envoyée : \n <b>" . $json_data . "</b><pre>";

        $apiKey = ""; // Remplace par ta clé API

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/chat/completions");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Authorization: Bearer $apiKey"
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

        $response = curl_exec($ch);
        curl_close($ch);

        $responseArray = json_decode($response, true);

        $messageContent = $responseArray['choices'][0]['message']['content'];

        echo $messageContent;
        ?>
    </body>
</html>
