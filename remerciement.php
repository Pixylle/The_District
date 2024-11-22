<!DOCTYPE html>
<html lang="fr">
    <?php 
    include 'header.php'; 
    include 'connexion.php';
    include 'DAO.php'; 
    ?>
<body>

<div class="container mt-5 d-flex justify-content-center align-items-center">
  <div class="card shadow-lg p-4 text-center" style="max-width: 500px; border-radius: 15px;">
    <div class="card-body">
      <h2 class="card-title text-success mb-4">
        Merci pour votre commande !
      </h2>
      <p class="card-text text-muted mb-4">
        Nous avons bien reçu votre commande. Un email de confirmation vous sera envoyé à l'adresse fournie sous peu. 
        Si vous avez des questions, n'hésitez pas à nous contacter.
      </p>
      <a href="index.php" class="btn btn-outline-success px-4">
        Retour à la page principale
      </a>
    </div>
  </div>
</div>



    <?php include 'footer.php'; ?>
</body>

</html>
