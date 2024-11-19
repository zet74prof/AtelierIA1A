<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Import Materialize CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css">
        <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>
        <script>
            fruits = ["Fraise", "Banane", "Kiwi", "Pomme"];
        </script>
    </head>
    <body>
        <div class="container">
            <h4>Laisser un commentaire</h4>

            <form id="commentForm" action="comment.php" method="POST">
                <!-- Champ pour le nom -->
                <div class="input-field">
                    <label for="name">Votre Nom</label>
                    <input type="text" id="name" name="name" >
                </div>

                <!-- Champ pour le commentaire -->
                <div class="input-field">
                    <textarea id="comment" name="comment" class="materialize-textarea" ></textarea>
                    <label for="comment">Votre Commentaire</label>
                </div>

                <div><p>🛡️ Controle "Anti-Bot" : Coller une image représentant le fruit suivant : 
                        <b> <script> indexOfFruit = Math.floor(Math.random() * fruits.length); document.write(fruits[indexOfFruit]);</script> </b> </p>
                    <p> Copie de screen touche <b> Win + shift + S </b> ; Coller <b>Ctrl + V</b></p>
                </div>

                <canvas id="myCanvas" width="150" height="150"></canvas>

                <!-- Bouton de soumission -->
                <button class="btn waves-effect waves-light" type="submit">Soumettre</button>
                
                <div class="input-field">
                    <textarea id="prompt" name="prompt" class="materialize-textarea" >
                    </textarea>
                    <label for="prompt">Votre prompt</label>
                </div>

                <div id="error" class="red-text"></div>
            </form>

            <!-- Zone pour afficher le message d'erreur si la validation échoue -->

        </div>

        <!-- Import jQuery et Materialize JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script type="text/javascript" src="js/paste.js"></script>
        <script type="text/javascript" src="js/checkImageTeachableMachine.js"></script>
        <script type="text/javascript" src="js/checkForm.js"></script>
    </body>
</html>
