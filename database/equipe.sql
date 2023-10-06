CREATE DATABASE cupmanager; 

CREATE TABLE cupmanager.joueur(
    id int NOT NULL AUTO_INCREMENT,
    nom varchar(255),
    prenom varchar(255),
    age int,
    PRIMARY KEY (id)
);


Insert into cupmanager.joueur(id, nom, prenom, age) VALUES(1, "Mbappe", "Kylain", 23);
Insert into cupmanager.joueur(id, nom, prenom, age) VALUES(2, "Haland", "Erling", 20);
Insert into cupmanager.joueur(id, nom, prenom, age) VALUES(3, "Ronaldo", "Christiano", 45);
