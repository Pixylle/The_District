<!DOCTYPE html>
<html lang="fr">
    <?php include 'header.php'; 
    include 'connexion.php';
include 'DAO.php'; 
$plat= get_plat();
$listcat = get_listcategories();

?>
<body>
<section class="menu-section">
<div class="container mt-4 col-3">
        <form action="update_script.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$plat->id?>">

            <div class="mb-3">
                <label for="Libelle" class="form-label">Libelle</label>
                <input type="text" name="Libelle" class="form-control" id="Libelle" value="<?=$plat->libelle?>" required>
            </div>
            <div class="mb-3">
                <label for="Catégory">Catégory</label>
                <select name="Catégory" class="form-select" id="Catégory" required>
                <?php foreach ($listcat as $cat): ?>
        <option value="<?= $cat->id ?>" <?= $cat->id == $plat->id_categorie ? 'selected' : '' ?>>
            <?= htmlspecialchars($cat->libelle) ?>
        </option>
    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="Prix" class="form-label">Prix</label>
                <input type="number" name="Prix" class="form-control" id="Prix" min="1" max="2024" value="<?=$plat->prix?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" id="description" value="<?=$plat->description?>" required>
            </div>
            <div class="mb-3">
                <label for="Active" class="form-label">Active</label>
                <input type="text" name="Active" class="form-control" id="Active" value="<?=$plat->active?>" required>
            </div>
            <div class="mb-3">
                <label for="image">Image</label><br>
                <input type="file" id="image" name="image" accept="image/png, image/jpeg" />
            </div>
            
            
        <div class="col-md-6">
            <img src="src/img/<?php echo $plat->image; ?>" width="300" height="300" alt="<?php echo $plat->image; ?>">
        </div>
         
        <div class="d-flex justify-content-start pt-3">
<button type="submit" class="single-card-btn single-card-btn-edit m-2"><a href="delete.php?id=<?php echo $plat->id; ?>">Modifier</a></button>
<button type="button" class="single-card-btn single-card-btn-edit m-2" onclick="window.location.href='plat.php?id=<?=$plat->id?>'">Retour</button>
</div>

</section>


<?php include 'footer.php'; ?>
</body>
</html>