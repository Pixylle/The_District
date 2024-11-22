/*des requêtes d'interrogation de la base de données */

/*Afficher la liste des commandes ( la liste doit faire apparaitre la date, les informations du client, le plat et le prix )*/
SELECT c.date_commande, c.nom_client, c.telephone_client, c.email_client, c.adresse_client, p.libelle, p.prix FROM commande c 
LEFT JOIN plat p ON p.id = c.id_plat

/*Afficher la liste des plats en spécifiant la catégorie*/
SELECT p.libelle, c.libelle FROM plat p
LEFT JOIN categorie c ON c.id=p.id_categorie

/*Afficher les catégories et le nombre de plats actifs dans chaque catégorie */
SELECT c.libelle, COUNT(p.libelle) AS quantite 
FROM categorie c
LEFT JOIN plat p ON p.id_categorie = c.id AND p.active = 'Yes'
GROUP BY c.libelle;

/*Liste des plats les plus vendus par ordre décroissant*/
SELECT p.libelle, SUM(c.quantite) quant FROM plat p
LEFT JOIN commande c ON c.id_plat=p.id
GROUP BY libelle
HAVING quant>0
ORDER BY quant DESC;

/*Le plat le plus rémunérateur*/
SELECT p.libelle, SUM(c.total) AS remu 
FROM plat p
LEFT JOIN commande c ON c.id_plat = p.id
GROUP BY p.libelle
ORDER BY remu DESC
LIMIT 1;

/*Liste des clients et le chiffre d'affaires généré par client (par ordre décroissant)*/
SELECT nom_client, SUM(total) FROM commande c 
GROUP BY nom_client
ORDER BY SUM(total) DESC;


/* des requêtes de modification de la base de données */


