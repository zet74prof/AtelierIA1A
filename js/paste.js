// Récupérer le contexte du canvas
var canvas = document.getElementById('myCanvas');
var context = canvas.getContext('2d');

// Définir la couleur de fond en blanc
context.fillStyle = '#ffffff'; // Utilisez la couleur blanche (#ffffff) ou 'white'

// Remplir le canvas avec la couleur de fond
context.fillRect(0, 0, canvas.width, canvas.height);

var isPaste = false;


// Fonction pour dessiner une image collée
function pasteImage(e) {
    var items = e.clipboardData.items;
    for (var i = 0; i < items.length; i++) {
        var item = items[i];
        if (item.type.indexOf("image") !== -1) {
            isPaste = true;
            var blob = item.getAsFile();
            var img = new Image();
            var url = URL.createObjectURL(blob);
            img.src = url;
            img.onload = function () {
                // Dessiner l'image dans le canvas
                context.drawImage(img, 0, 0, canvas.width, canvas.height);
                URL.revokeObjectURL(url); // Libérer la mémoire utilisée par l'URL
            };
        }
    }
}

// Écouteur pour l'événement "paste"
window.addEventListener('paste', function (e) {
    pasteImage(e);
});
