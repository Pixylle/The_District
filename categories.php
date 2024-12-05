<!DOCTYPE html>
<html lang="fr">
    <?php include 'header.php'; 
    include 'connexion.php';
include 'DAO.php'; 
?>
<body>
    
<section id="section1" data-speed="8" data-type="background" class="Catégorie parallax p-2">
    <div class="">
        <div class="row justify-content-center mb-4 title">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <span class="decorative-element me-2"></span>
                <h3 class="category-title">Catégories</h3>
                 <span class="decorative-element ms-2"></span>
            </div>
        </div>  
        <div class="container justify-content-center mb-3">
            <?php 
            $categories = get_categories(); // Сохраняем результат работы функции
            // Проверяем, что категории не пусты
            if (!empty($categories)) {
            foreach($categories as $category): ?>
        <div class="col-3 cath">
            <a href="categorie.php?id=<?php echo $category->id;?>">
                <!-- Название категории над картинкой -->
                <p class="category-name"><?php echo $category->libelle; ?></p>                
                <!-- Картинка категории -->
                <img src="src/img/<?php echo $category->image; ?>" alt="<?php echo $category->libelle; ?>" class="category-image">
            </a>
        </div>
            <?php endforeach; 
            } else {
                echo "<p>Категории не найдены</p>";
            }
            ?>
    </div>
</section>
<?php include 'footer.php'; ?>
</body>
</html>