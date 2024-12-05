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
       
    ');
    
   
    $allcat->execute();
    
    $allcategories = $allcat->fetchAll(PDO::FETCH_OBJ); 
    return $allcategories;
    
}


function get_listcategories() {
    global $db;

    try {
        // Исправленный SQL-запрос
        $listlcat = $db->prepare('SELECT id, libelle, image FROM categorie');

        // Выполняем запрос
        $listlcat->execute();

        // Получаем результаты
        $listcategories = $listlcat->fetchAll(PDO::FETCH_OBJ);

        return $listcategories;

    } catch (PDOException $e) {
        // Логируем ошибку и возвращаем пустой массив
        error_log('Ошибка SQL: ' . $e->getMessage());
        return [];
    }
}

function add_commandToBase() {
    global $db;

try {
    $addcombase = $db->prepare('INSERT INTO resto.commande
(id_plat, quantite, total, date_commande, etat, nom_client, telephone_client, email_client, adresse_client)
VALUES(:id_plat, :quantite, :total, :date_commande, :etat, :nom_client, :telephone_client, :email_client, :adresse_client);');

    
$addcombase->execute([
        ':id_plat' => $_SESSION['cart'][0]['id'],
        ':quantite' => $_SESSION['cart'][0]['quantite'],
        ':total' => $_SESSION['cart'][0]['price'] * $_SESSION['cart'][0]['quantity'], // Сохраняем новое имя файла
        ':date_commande' => date('Ymd'),
        ':etat' => 'Nouvelle',
        ':nom_client' => $_POST['nom'].' '. $_POST['prenom'], 
        ':telephone_client' => $_POST['telephone'],
        ':email_client'=> $_POST['email'], 
        ':adresse_client'=> $_POST['adresse'],
        
    ]);

    header("Location: index.php");
        exit();
} catch (PDOException $e) {
    die("Ошибка при добавлении в базу данных: " . $e->getMessage());
}
}

function get_plat() {
    global $db;
    $requete = $db->prepare("SELECT libelle, image, id_categorie, description, id, prix, active FROM plat  WHERE id=?;");
    $requete->execute(array($_GET["id"]));
    $plat = $requete->fetch(PDO::FETCH_OBJ); 
    return $plat; 
}

?>






