<!DOCTYPE html>
<html lang="fr">
    <?php include 'header.php'; 
    include 'connexion.php';
include 'DAO.php'; 
?>
<body>

<section id="section1" class="Catégorie parallax p-2">
    <div class="container justify-content-center mb-3">
        <?php 
        $toutes = toutes_plats();
        $i = 0; // Счетчик для контроля количества колонок
        foreach ($toutes as $plat):
            // Если элемент первый или кратен 3, открываем строку
            if ($i % 3 == 0) {
                echo '<div class=" mb-4">';
            }
        ?>
            <div class="col-3 cath">
                <div class="card">
                    <img src="src/img/<?php echo $plat->image; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($plat->libelle); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($plat->libelle); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($plat->description); ?></p>
                        <p><?php echo "$plat->prix €"; ?></p>
                        <button class="btn btn-outline-success btn-add-to-cart">
                            <i class="fa fa-shopping-cart"></i> Add to cart
                        </button>
                    </div>
                </div>
            </div>
        <?php 
            $i++;
            // Если элемент последний в строке (3 в строке), закрываем строку
            if ($i % 3 == 0) {
                echo '</div>'; 
            }
            
        endforeach; 

        // Закрываем незавершённый ряд
        if ($i % 3 != 0) {
            echo '</div>';
        }
        ?>       
    </div>
</section>
<div class="d-flex justify-content-center">
<button class="btn btn-outline-success mb-5" ><a href="addplat.php">
                            Ajouter un plat</a>
                        </button>
      </div>

    
     


    <?php include 'footer.php'; ?>
<!-- Модальное окно -->
<div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addToCartModalLabel">Commander</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-4">
                <!-- Здесь изображение блюда -->
                <img src="/src/img/pp1.jpeg" class="img-fluid" alt="Crustaceans Lobsters">
              </div>
              <div class="col-md-8">
                <!-- Здесь информация о блюде -->
                <h5>Crustaceans Lobsters</h5>
                <p>Цена: $51.00</p>
                <p>Состав: 4 Chicken Legs • Chili Sauce • Soft Drinks</p>
                <!-- Поле для выбора количества -->
                <div class="input-group mb-3">
                  <span class="input-group-text">Quantité</span>
                  <input type="number" class="form-control" value="1" min="1">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Выбрать еще</button>
          <button type="button" class="btn btn-success">Choisir encore</button>
        </div>
      </div>
    </div>
  </div>
  

</body>
</html>