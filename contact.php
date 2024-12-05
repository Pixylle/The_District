<!DOCTYPE html>
<html lang="fr">
<?php 
include 'header.php'; 
include 'connexion.php';
include 'DAO.php'; 
session_start();

// Проверяем содержимое сессии
$cards = isset($_SESSION['cart']) ? $_SESSION['cart'] : []; 
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de commande</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>

<div class="containercont mt-5 mb-5">
    <div class="row">
        <!-- Форма заказа -->
        <div class="col-md-8">
            <form action="form.php" method="POST" id="contactForm" class="row g-4" onSubmit="return checkForm(this)">
                <div class="col-md-6">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Votre prénom" required>
                </div>
                <div class="col-md-6">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" id="nom" name="nom" class="form-control" placeholder="Votre nom" required>
                </div>
                <div class="col-md-6">
                    <label for="telephone" class="form-label">Téléphone</label>
                    <input type="tel" id="telephone" name="telephone" class="form-control" placeholder="Votre téléphone" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Votre email" required>
                </div>
                <div class="col-md-6">
                    <label for="adresse" class="form-label">Adresse de Livraison</label>
                    <input type="text" id="adresse" name="adresse" class="form-control" placeholder="Votre adresse" required>
                </div>
                <div class="col-md-12">
                    <label for="commentaire" class="form-label">Commentaire</label>
                    <textarea id="commentaire" name="commentaire" class="form-control" rows="4" placeholder="Vos remarques ou préférences..."></textarea>
                    <input type="hidden" name="id" value="<?php $_SESSION['cart'][0]['quantite'] ; ?>">
                </div>
                <!-- Кнопка отправки формы -->
                <div class="col-12 text-center mt-3">
                    <button type="submit" class="btn btn-outline-success px-5">Envoyer</button>
                </div>
            </form>
        </div>

        <!-- Корзина заказа -->
        <div class="col-md-4">
            <div class="order-summary">
                <h5>Résumé de votre commande</h5>
                <?php if (empty($cards)): ?>
                    <p>Votre panier est vide.</p>
                <?php else: ?>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-center mb-3">
                            <img src="src/img/<?= htmlspecialchars($cards[0]['image']) ?>" alt="<?= htmlspecialchars($cards[0]['name']) ?>" style="width: 100px; height: auto; margin-right: 10px;">
                            <div>
                                <strong><?= htmlspecialchars($cards[0]['name']) ?></strong><br>
                                Quantité: <?= htmlspecialchars($cards[0]['quantite']) ?><br>
                                Prix: <?= htmlspecialchars($cards[0]['price']) ?> €
                            </div>
                        </li>
                    </ul>
                    <p class="text-end fw-bold">Total: <?= $cards[0]['price'] * $cards[0]['quantite'] ?> €</p>
                <?php endif; ?>
            </div>

            <!-- Кнопка очистки корзины -->
            <form action="clear_session.php" method="POST" class="mt-3">
                <button type="submit" class="btn btn-outline-danger w-100">Vider le panier</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
