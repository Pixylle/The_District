<!DOCTYPE html>
<html lang="fr">
    <?php include 'header.php'; 
    include 'connexion.php';
include 'DAO.php'; 
$listcategories=get_listcategories();

?>
<body>
    
<section class="">
<div class="col-12 d-flex align-items-center justify-content-center my-3">
        <form action="add_pl.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="Libelle" class="form-label">Libelle</label>
                <input type="text" name="Libelle" class="form-control" id="Libelle" required>
            </div>
            <div class="mb-3">
                <label for="Cathegorie">Cathegorie</label>
                <select name="Cathegorie" class="form-select" id="Cathegorie" required>
                <?php foreach($listcategories as $cat):
                ?>
                    <option value="<?php echo $cat->id; ?>"><?php echo $cat->libelle; ?></option>
            
                 <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="Prix" class="form-label">Prix </label>
                <input type="number" name="Prix" class="form-control" id="Prix" min="0" required>
            </div>
            <div class="mb-3">
                <label for="active" class="form-label">Active</label>
    
                <select name="Active" class="form-select" id="Active" required>
                    <option value="Yes" selected>Yes</option>
                    <option value="No">No</option>
                
                </select> 


            </div>
        
            <div class="mb-3">
                <label for="Descriptions" class="form-label">Descriptions</label>
                <input type="text" name="Descriptions" class="form-control" id="Descriptions" required>
            </div>
            
            <div class="mb-3">
                <label for="image">Image</label><br>
                <input type="file" id="image" name="image" accept="image/png, image/jpeg" required />
            </div>
            <button type="submit" class="custom-card-btn">Submit</button>
        </form>
    </div>
</section>



<?php include 'footer.php'; ?>