 <?php 
    include 'connexion.php';
include 'DAO.php'; 


// Получаем идентификатор из URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $platid = $_GET['id'];

    $requete = $db->prepare("DELETE FROM resto.plat WHERE id = :id");
    $requete->bindParam(':id', $platid, PDO::PARAM_INT);

    if ($requete->execute()) {
        // Успешное удаление, можно перенаправить
        header("Location: plats.php");
        exit();
    } else {
        echo "Erreur.";
    }
} else {
    echo "Erreur";
}
?>


