<!DOCTYPE html>
<html lang="fr">
    <?php include 'header.php'; 
    include 'connexion.php';
include 'DAO.php'; 
?>
<body>
<?php $toutes = toutes_plats();
 $i=0;
?>

<section>
    <div class="row justify-content-center mb-4 title">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <span class="decorative-element me-2"></span>
            <h3 class="category-title">Toutes plats</h3>
            <span class="decorative-element ms-2"></span>
        </div>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <?php 
            $groupIndex = 0; // Индекс для отслеживания активной группы
            foreach ($toutes as $plat): 
                // Открываем новую группу каждые 6 элементов
                if ($i % 6 == 0): 
                    $isActive = ($groupIndex == 0) ? 'active' : ''; 
                    echo '<div class="carousel-item ' . $isActive . '">
                              <div class="container d-block w-100">';
                    $groupIndex++; 
                endif;

                // Открываем новую строку каждые 3 элемента
                if ($i % 3 == 0): 
                    echo '<div class="row">';
                endif;
            ?>

            <div class="col-md-4">
                <div class="card">
                    <img src="src/img/<?php echo $plat->image ?>" class="card-img-top" alt="<?php echo $plat->libelle ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $plat->prix ?></h5>
                        <p class="card-text"><?php echo $plat->libelle ?></p>
                        <p>4 Chicken Legs • Chili Sauce • Soft Drinks</p>
                        <button class="btn btn-outline-success btn-add-to-cart">
                            <i class="fa fa-shopping-cart"></i> Add to cart
                        </button>
                    </div>
                </div>
            </div>

            <?php 
                $i++;

                // Закрываем строку каждые 3 элемента
                if ($i % 3 == 0): 
                    echo '</div>'; // Закрытие строки
                endif;

                // Закрываем группу каждые 6 элементов
                if ($i % 6 == 0): 
                    echo '</div></div>'; // Закрытие группы и контейнера
                endif;
            endforeach;

            // Закрываем открытые теги, если они не завершены
            if ($i % 3 != 0): 
                echo '</div>'; // Закрываем последнюю строку
            endif;
            if ($i % 6 != 0): 
                echo '</div></div>'; // Закрываем последнюю группу
            endif;
            ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

            
      
      
      
        
        
    

    </section>

    
     


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