async function getJoueurs() {
  /*$.ajax({
    url: "/services/DAOJoueur.php",
    type: "POST",
    data: {
      code: 0,
    },
    dataType: "json",
    success: function (joueurs) {
      joueurs;
    },
    error: function (erreur) {
      erreur;
    },
  });*/

  const reponse = await fetch("/services/DAOJoueur.php?resource=joueurs", {
    method: "GET",
  });
  //Recupere au format json
  return reponse.json();
}

async function ajouterJoueur(nom, prenom, age) {
  const reponse = await fetch("/services/DAOJoueur.php", {
    method: "POST",
    body: new URLSearchParams({
      code: 0,
      nom: nom,
      prenom: prenom,
      age: age,
    }),
  });
  return reponse.json();
}
