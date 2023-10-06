function getJoueurs() {
    $.ajax({
        url: "/services/DAOJoueur.php",
        type: 'POST',
        data: {
            code: 0,
        },
        dataType: 'json',
        success: function (joueurs) {
            joueurs;
        },
        error: function (erreur) {
            erreur;
        }
    });

    fetch("flowers.jpg")
    .then(function (response) {
        return response.blob();
    })

}

function ajouterJoueur() {

}