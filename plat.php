<!DOCTYPE html>
<html lang="fr">
    <?php include 'header.php'; 
    include 'connexion.php';
include 'DAO.php'; 
$plat=get_plat();


?>
<body>
<section class="menu-section">
  <div class="single-card-container">
    <!-- Картинка блюда -->
    <img src="src/img/<?php echo $plat->image; ?>" alt="Название блюда" class="single-card-img">
    
    <h5 class="single-card-title"><?php echo $plat->libelle; ?></h5>

    <!-- Описание блюда -->
    <p class="single-card-description"><?php echo $plat->description; ?></p>
    
    <!-- Цена блюда -->
    <p class="single-card-price"><?php echo $plat->prix; ?></p>
    

    
    <!-- Кнопки -->
    <div class="single-card-actions">
      <button class="single-card-btn single-card-btn-edit"><a href="editplat.php?id=<?php echo $plat->id;?>">Corriger</button>
      <button class="single-card-btn single-card-btn-delete"><a href="delete.php?id=<?php echo $plat->id;?>">Supprimer</a></button>
      <button class="single-card-btn single-card-btn-disable">Désactiver</button>
    </div>
  </div>
</section>


<?php include 'footer.php'; ?>
</body>
</html>