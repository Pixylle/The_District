<!DOCTYPE html>
<html lang="fr">
    <?php include 'header.php'; ?>
<body>

    
    <div class="container col-4">
        <form id="monFormulaire" action="process_form.php" method="post" onSubmit="return checkForm(this);"
>
            <fieldset>
                <legend>Vos coordonnées</legend>
                <div class="form-group">
                    <label for="votrenom">Votre nom*</label>
                    <input type="text" id="votrenom" name="votrenom" required>
                </div>
                <div class="form-group">
                    <label for="votreprénom">Votre prénom*</label>
                    <input type="text" id="votreprénom" name="votreprénom" required>
                </div>
        
            <div class="form-group">
                <label for="CP">Code Postal</label>
                <input type="text" id="CP" name="CP" required>
            </div>
                <div class="form-group">
                    <label for="Adresse">Adresse</label>
                    <input type="text" id="Adresse" name="Adresse" required>
                </div>
                <div class="form-group">
                    <label for="Ville">Ville</label>
                    <input type="text" id="Ville" name="Ville" required>
                </div>
             
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
            
            </fieldset>

           

           

            <div class="form-group buttons">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
    </div>


    <?php include 'footer.php'; ?>

</body>
</html>