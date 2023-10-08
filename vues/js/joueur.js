async function getJoueurs() {
  const reponse = await fetch("../../controleurs/JoueurControleur.php?resource=joueurs", {
    method: "GET",
  });
  //Recupere au format json
  return reponse.json();
}

async function ajouterJoueur(nom, prenom, age) {
  const reponse = await fetch("../../controleurs/JoueurControleur.php", {
    method: "POST",
    body: new URLSearchParams({
      action: 0,
      nom: nom,
      prenom: prenom,
      age: age,
    }),
  });
  return reponse.json();
}
