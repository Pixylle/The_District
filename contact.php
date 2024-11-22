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
        
<form action="form.php" method="POST" class="row g-4">
    <!-- Prénom -->
    <div class="col-md-6">
        <label for="prenom" class="form-label">Prénom</label>
        <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Votre prénom" required>
    </div>
    <!-- Nom -->
    <div class="col-md-6">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" id="nom" name="nom" class="form-control" placeholder="Votre nom" required>
    </div>
    <!-- Téléphone -->
    <div class="col-md-6">
        <label for="telephone" class="form-label">Téléphone</label>
        <input type="tel" id="telephone" name="telephone" class="form-control" placeholder="Votre téléphone" required>
    </div>
    <!-- Email -->
    <div class="col-md-6">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Votre email" required>
    </div>
    <!-- Adresse -->
    <div class="col-md-6">
        <label for="adresse" class="form-label">Adresse de Livraison</label>
        <input type="text" id="adresse" name="adresse" class="form-control" placeholder="Votre adresse" required>
    </div>
    <!-- Commentaire -->
    <div class="col-md-12">
        <label for="commentaire" class="form-label">Commentaire</label>
        <textarea id="commentaire" name="commentaire" class="form-control" rows="4" placeholder="Vos remarques ou préférences..."></textarea>
    </div>
    <!-- Bouton Soumettre -->
    <div class="col-12 text-center">
        <button type="submit" class="btn btn-outline-success px-5">Envoyer</button>
    </div>
</form>

    </div>




<?php include 'footer.php'; ?>
</body>

</html>
