CREATE DATABASE cup-manager; 

CREATE TABLE cup-manager.joueur(
    id int,
    nom varchar(255),
    prenom varchar(255),
    age int,
    PRIMARY KEY (id)
);


Insert into cup-manager.joueur(id, nom, prenom, age) VALUES(1, "Mbappe", "Kylain", 23);
Insert into cup-manager.joueur(id, nom, prenom, age) VALUES(2, "Haland", "Erling", 20);
Insert into cup-manager.joueur(id, nom, prenom, age) VALUES(3, "Ronaldo", "Christiano", 45);
