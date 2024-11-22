document.addEventListener('DOMContentLoaded', function () {
   
    const formulaire = document.getElementById('monFormulaire');

    // Добавляем обработчик события 'submit' для формы
    formulaire.addEventListener('submit', function (e) {
        // Предотвращаем отправку формы до завершения валидации
        e.preventDefault();

      
        let estValide = true;
        
      
       estValide &= validerChamp(/^[a-zA-ZÀ-ÿ-]+$/, document.getElementById('votrenom'), 'Nom invalide.');
       estValide &= validerChamp(/^[a-zA-ZÀ-ÿ-]+$/, document.getElementById('votreprénom'), 'Prénom invalide.');
       estValide &= validerChamp(/^\S+@\S+\.\S+$/, document.getElementById('email'), 'Email invalide.');
       estValide &= validerChamp(/.*/, document.getElementById('sexe'), ''); 
       estValide &= validerChamp(/.+/ , document.getElementById('Adresse'), 'Adresse invalide.');
       estValide &= validerChamp(/^[0-9]{5}$/, document.getElementById('CP'), 'Code Postal invalide.');
       estValide &= validerChamp(/^[a-zA-ZÀ-ÿ-\s]+$/, document.getElementById('Ville'), 'Ville invalide.'); 

          if (estValide) {
            console.log("Formulaire valide, prêt à être soumis.");
            formulaire.submit();
        }
    });
});