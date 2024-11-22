<!DOCTYPE html>
<html lang="fr">
    <?php include 'header.php'; ?>
<body>
    

    <div class="containerform col-4">
        <form id="monFormulaire" action="process_form.php" method="post">
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
                <label>Sexe*</label>
                <div>
                    <label>
                        <input type="radio" name="Sexe" value="male" required> Féminin
                    </label>
                    <label>
                        <input type="radio" name="Sexe" value="female" required> Masculin
                    </label>
            
                </div>
            </div>
            <div class="form-group">
                <label for="date">Date de naissance* :</label>
                <input type="date" id="date" name="date" required>
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

            <fieldset>
                <legend>Votre demande</legend>
                <div class="form-group">
                    <label for="demande">Sujet*</label>
                    <select id="demande" name="demande">
                        <option value="Veuillez séléctionner un sujet" disabled required>Veuillez séléctionner un sujet</option>
                        <option value="Mes commandes">Mes commandes</option>
                        <option value="Question sur un produit">Question sur un produit</option>
                        <option value="Réclamation">Réclamation</option>
                        <option value="Autres">Autres</option> 
                    </select>
                </div>
                <div class="form-group">
                    <label>
                        <input type="checkbox" name="agree" value="oui" required> J'accepte le traitement informatique de ce formulaire
                    </label>
                </div>
            </fieldset>

            <fieldset>
                <legend>Message</legend>
                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
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