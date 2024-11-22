<!DOCTYPE html>
<html lang="fr">
    <?php include 'header.php'; 
    include 'connexion.php';
include 'DAO.php'; 
?>
<body>
    
<?php 
    
   $cat_id = $_GET["id"];
   $cat = get_cat($cat_id);
   $plats = get_plats($cat_id);
   $i=0;
   
    ?>
    <section>
        <div class="row justify-content-center mb-4 title">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <span class="decorative-element me-2"></span>
                <h3 class="category-title"><?php echo $cat->libelle; ?></h3>
                <span class="decorative-element ms-2"></span>
            </div>
        </div>
        
        <div class="container d-block w-100">
    <?php 
    $i = 0; // Счётчик для строк
    foreach ($plats as $plat): 
        if ($i % 3 == 0): echo '<div class="row">'; // Открываем строку каждые 3 карточки
        endif; 
    ?>
        <div class="col-md-4">
            <!-- Карточка как форма -->
            <form method="POST" action="addcard.php" class="card">
                <img src="src/img/<?php echo $plat->image ?>" class="card-img-top" alt="<?php $plat->libelle; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $plat->prix ?>$</h5>
                    <p class="card-text"><?php echo $plat->libelle; ?></p>
                    <p><?php echo $plat->description; ?></p>
                    
                    <!-- Только ID товара -->
                    <input type="hidden" name="plat_id" value="<?php echo $plat->id; ?>">
                    <input type="hidden" name="plat_name" value="<?php echo $plat->libelle; ?>">
                    <input type="hidden" name="plat_prix" value="<?php echo $plat->prix; ?>">
                    <input type="hidden" name="id_categorie" value="<?php echo $plat->id_categorie; ?>">
                    <!-- Кнопка "Добавить в корзину" -->
                    <button type="submit" name="action" value="add_to_cart" class="btn btn-outline-success">
                        <i class="fa-solid fa-plus"></i> Ajouter
                    </button>

                    <!-- Кнопка "Купить" -->
                    <button type="submit" name="action" value="buy_now" class="btn btn-outline-success">
                        <i class="fa fa-shopping-cart"></i> Acheter
                    </button>
                </div>
            </form>
        </div>
    <?php 
        if ($i % 3 == 2): echo '</div>'; // Закрываем строку каждые 3 карточки
        endif; 
        $i++; 
    endforeach; 
    ?>
</div>
</div>
    
     


    


  
<?php include 'footer.php'; ?>
</body>

</html>