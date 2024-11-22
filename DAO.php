<?php 
include 'connexion.php';  

function get_categories() {
    
    global $db;
    
    
    $popcat = $db->prepare('
        SELECT cat.id, cat.libelle, cat.image, SUM(com.quantite) AS total_quantite 
        FROM categorie cat
        LEFT JOIN plat p ON p.id_categorie = cat.id 
        LEFT JOIN commande com ON com.id_plat = p.id
        GROUP BY cat.libelle
        ORDER BY total_quantite DESC
        LIMIT 6;
    ');
    
   
    $popcat->execute();
    
    $categories = $popcat->fetchAll(PDO::FETCH_OBJ); 
    return $categories;
    
}

function get_cat($cat_id) {
    global $db;
    $requete = $db->prepare("SELECT libelle, id FROM categorie  
    where id=?");
    $requete->execute([$cat_id]);
    $cat = $requete->fetch(PDO::FETCH_OBJ);
    return $cat; 

}

function get_plats($cat_id) {
    global $db;
    $requete = $db->prepare("SELECT libelle, image, id_categorie, description, id, prix, COUNT(*) FROM plat WHERE id_categorie = ? GROUP BY libelle;");
    $requete->execute([$cat_id]);
    $plats = $requete->fetchAll(PDO::FETCH_OBJ); 
    return $plats; 
}



function plus_populaire() {
    global $db;
    $requete = $db->prepare("SELECT p.libelle, p.description, p.image, p.id, sum(c.quantite) from plat p
LEFT JOIN commande c ON c.id_plat=p.id 
GROUP BY p.libelle
ORDER BY c.quantite DESC 
LIMIT 3;");
 $requete->execute();
 $plats_pop=$requete->fetchAll(PDO::FETCH_OBJ); 
 return $plats_pop;
}

function toutes_plats() {
    global $db;
    $requete = $db->prepare("SELECT libelle, description, image, id, prix from plat
;");
 $requete->execute();
 $toutes=$requete->fetchAll(PDO::FETCH_OBJ); 
 return  $toutes;
}



function getCartTotalQuantity($cart) {
    $totalQuantity = 0;
    foreach ($cart as $item) {
        $totalQuantity += $item['quantity'];
    }
    return $totalQuantity;
}



function get_allcategories() {
    
    global $db;
    
    
    $allcat = $db->prepare('
        SELECT cat.id, cat.libelle, cat.image, SUM(com.quantite) AS total_quantite 
        FROM categorie cat
        LEFT JOIN plat p ON p.id_categorie = cat.id 
        LEFT JOIN commande com ON com.id_plat = p.id
        GROUP BY cat.libelle
        ORDER BY total_quantite DESC
        LIMIT 6;
    ');
    
   
    $allcat->execute();
    
    $categories = $allcat->fetchAll(PDO::FETCH_OBJ); 
    return $categories;
    
}

?>
