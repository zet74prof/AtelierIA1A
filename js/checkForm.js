//Verification du formulaire
document.getElementById('commentForm').addEventListener('submit', async function (e) {
    var name = document.getElementById('name').value.trim();
    var comment = document.getElementById('comment').value.trim();
    e.preventDefault(); // Empêche la soumission du formulaire

    // Simple validation JS pour s'assurer que les champs ne sont pas vides
    if (name === '' || comment === '')
        document.getElementById('error').textContent = 'Veuillez remplir tous les champs.';
    else if (!isPaste)
        document.getElementById('error').textContent = 'Veuillez remplir le contrôle de sécurité';
    else {
        var res = await checkGoodFruit();
        console.log("resultat du check : " + res);
        if (!res)
            document.getElementById('error').textContent = 'Vous avez échoué au contrôle de sécurité';
        else{
            document.getElementById('error').textContent = 'OKKKKKKKK!!!!!!!';
            e.target.submit(); // Active la soumission du formulaire si check réussi
        }
    }
});