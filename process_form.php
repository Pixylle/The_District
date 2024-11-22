<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $votrenom = htmlspecialchars($_POST['votrenom']);
    $votreprénom = htmlspecialchars($_POST['votreprénom']);
    $sexe = htmlspecialchars($_POST['Sexe']);
    $date = htmlspecialchars($_POST['date']);
    $cp = htmlspecialchars($_POST['CP']);
    $adresse = htmlspecialchars($_POST['Adresse']);
    $ville = htmlspecialchars($_POST['Ville']);
    $email = htmlspecialchars($_POST['email']);
    $demande = htmlspecialchars($_POST['demande']);
    $message = htmlspecialchars($_POST['message']);

    
    $filename = date('Y-m-d-H-i-s') . '.txt';

  
    $content = "Nom: $votrenom\n";
    $content .= "Prénom: $votreprénom\n";
    $content .= "Sexe: $sexe\n";

    $content .= "Code Postal: $cp\n";
    $content .= "Adresse: $adresse\n";
    $content .= "Ville: $ville\n";
    $content .= "Email: $email\n";
  


    file_put_contents($filename, $content, FILE_APPEND);

   
    echo "Formulaire envoyé avec succès ! Vos données ont été enregistrées.";
} else {
    echo "Erreur";
}
?>