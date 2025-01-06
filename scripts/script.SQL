CREATE DATABASE driveloc;

USE driveloc;

CREATE TABLE role (
    role_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(225) NOT NULL
);

CREATE TABLE user (
    user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_id INT NOT NULL,
    FOREIGN KEY (role_id) REFERENCES role(role_id)
);

CREATE TABLE Categorie (
    Categorie_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    description VARCHAR(255)
);

CREATE TABLE vehicule (
    vehicule_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    modele VARCHAR(255) NOT NULL,
    marque VARCHAR(255) NOT NULL,
    prix FLOAT NOT NULL,
    status ENUM('active', 'Maintenance', 'Reserved'),
    vehicule_image VARCHAR(225),
    Categorie_id INT NOT NULL,
    FOREIGN KEY (Categorie_id) REFERENCES Categorie(Categorie_id) ON DELETE CASCADE
);

CREATE TABLE reservation (
    reservation_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    status ENUM('waiting', 'accepte', 'refuse'),
    user_id INT NOT NULL,
    vehicule_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY (vehicule_id) REFERENCES vehicule(vehicule_id) ON DELETE CASCADE
);

CREATE TABLE avis (
    avis_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    commentaire VARCHAR(225),
    date_creation DATE,
    user_id INT NOT NULL,
    vehicule_id INT NOT NULL,
    status ENUM('active', 'archived');
    FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE,
    FOREIGN KEY (vehicule_id) REFERENCES vehicule(vehicule_id) ON DELETE CASCADE
);

CREATE VIEW showAllVehicule AS
SELECT v.*, c.nom
FROM vehicule v
LEFT JOIN Categorie c
ON v.Categorie_id = c.Categorie_id;

DELIMITER $$

CREATE PROCEDURE ReserverVehicule(
    IN p_date_debut DATE, 
    IN p_date_fin DATE, 
    IN p_client_id INT, 
    IN p_vehicule_id INT
)
BEGIN

    INSERT INTO reservation (date_debut, date_fin, status, user_id, vehicule_id)
    VALUES (p_date_debut, p_date_fin, 'waiting', p_client_id, p_vehicule_id);
    
END $$

DELIMITER ;