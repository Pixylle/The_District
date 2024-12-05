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
   session_start(); 
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
                <?php foreach($plats as $plat):
                    if($i==0): echo '<div class="row">';
                endif; ?>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="src/img/<?php echo $plat->image?>" class="card-img-top" alt="Crustaceans Lobsters">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $plat->prix?>$</h5>
                                    <p class="card-text"><?php echo $plat->libelle?></p>
                                    <p><?php echo $plat->description?></p>
                                    <button class="btn btn-outline-success btn-add-to-cart" value='Ajouter'><i class="fa fa-shopping-cart"></i>Ajouter</button>
                                    
                                    <button class="btn btn-outline-success btn-add-to-cart"><i class="fa fa-shopping-cart"></i> Acheter</button>
                                </div>
                            </div>
                        </div>
                        <?php if($i==5): echo '</div>';
                        endif;
                        $i++; ?>
                        <?php endforeach; ?>


    </section>

    
     


    <?php include 'footer.php'; ?>
<!-- Модальное окно -->

  

</body>
</html>