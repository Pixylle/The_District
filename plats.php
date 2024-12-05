<!DOCTYPE html>
<html lang="fr">
    <?php include 'header.php'; 
    include 'connexion.php';
include 'DAO.php'; 
?>
<body>



<section class="menu-section">
  <div class="menu-container">
    <!-- Карточка -->
    <?php 
        $toutes = toutes_plats();
        foreach ($toutes as $plat):
            
        ?>
        
        <form action="addcard.php" method="POST" class="custom-card">
    <a href="plat.php?id=<?php echo $plat->id; ?>" class="custom-card-link">
   
    
    <img src="src/img/<?php echo $plat->image; ?>" alt="<?php echo htmlspecialchars($plat->libelle); ?>" class="custom-card-img">
      
    <h5 class="custom-card-title"><?php echo htmlspecialchars($plat->libelle); ?> <i class="far fa-edit corrige"></i> </h5> 
        <p class="custom-card-description"><?php echo htmlspecialchars($plat->description); ?></p>
        <p class="custom-card-price"><?php echo "$plat->prix €"; ?></p>
    </a>
    <div class="custom-card-footer">
        <!-- Поле для количества -->
        <input type="number" name="quantite" min="1" value="1" class="custom-card-quantity" required>
        <input type="hidden" name="image" value="<?php echo $plat->image; ?>">
        <input type="hidden" name="libelle" value="<?php echo $plat->libelle; ?>">
        <input type="hidden" name="id" value="<?php echo $plat->id; ?>">
        <input type="hidden" name="prix" value="<?php echo $plat->prix; ?>">

        <!-- Кнопка отправки формы -->
        <button type="submit" class="custom-card-btn">
            <i class="fa fa-shopping-cart"></i> Acheter
        </button>
    </div>
</form>

   
    <?php endforeach; ?>
    <!-- Повторить карточки -->
  </div>
  
</section>
<div class="col-12 d-flex justify-content-center align-items-center my-2">
  <button class="custom-card-btn" id="add"><a href="addplat.php">Ajouter plat</a></button>
</div>
    <?php include 'footer.php'; ?>
</body>
</html>