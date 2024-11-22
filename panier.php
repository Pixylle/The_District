<!DOCTYPE html>
<html lang="fr">
    <?php 
    include 'header.php'; 
    include 'connexion.php';
    include 'DAO.php'; 
    session_start();

    // Проверяем содержимое сессии
   
    $cards = isset($_SESSION['cart']) ? $_SESSION['cart'] : []; // Если пусто, устанавливаем пустой массив
    ?>
<body>

<div class="container mt-5">
  <div class="row">
    <div class="col-12">
      <h2 class="cart-header mb-4">
        <i class="fas fa-shopping-cart cart-icon"></i> Panier
      </h2>
      
      <?php if (!empty($cards)): // Проверяем, есть ли товары в корзине ?>
          <?php foreach ($cards as $card): ?>
          <div class="cart-item">
            <div class="row">
              <div class="col-6">
                <p><strong><?php echo htmlspecialchars($card['name']); ?></strong></p> <!-- Название -->
              </div>
              <div class="col-2">
                <p><?php echo (int)$card['quantity']; ?></p> <!-- Количество -->
              </div>
              <div class="col-2">
                <p><?php echo number_format($card['price'], 2); ?>$</p> <!-- Цена -->
              </div>
              <div class="col-2">
                <p><?php echo number_format($card['quantity'] * $card['price'], 2); ?>$</p> <!-- Общая сумма -->
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          
          <!-- Итоговая сумма -->
          <div class="total mt-3">
            <p>Total: 
              <?php 
              $total = array_sum(array_map(function($item) {
                  return $item['quantity'] * $item['price'];
              }, $cards));
              echo number_format($total, 2);
              ?>$
            </p>
          </div>
          <a href='contact.php'>
    <button name="action" value="buy_now" class="btn btn-outline-success">
                        <i class="fa fa-shopping-cart"></i> Commander
                    </button></a>
      <?php else: ?>
          <p>Votre panier est vide</p>
      <?php endif; ?>
    </div>
  </div>
</div>
     
<?php include 'footer.php'; ?>
</body>

</html>
