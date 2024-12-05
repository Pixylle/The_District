<?php
include 'connexion.php';

global $db;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $libelle = $_POST['Libelle'];
    $cathegorie = $_POST['Cathegorie'];
    $prix = $_POST['Prix'];
    $active = $_POST['Active'];
    $price = $_POST['Price'];
    $description = $_POST['Descriptions'];

    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        
       
        if ($file['error'] === UPLOAD_ERR_OK) {
            
            $fileTmpPath = $file['tmp_name'];
            $fileName = $file['name'];
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
            
            
            $newFileName = uniqid() . '.' . $fileExtension;

            
            $uploadFileDir = './src/img/';
            $dest_path = $uploadFileDir . $newFileName;

            
            if(move_uploaded_file($fileTmpPath, $dest_path)) {
               
            } else {
                die("Ошибка при загрузке файла.");
            }
        } else {
            die("Ошибка загрузки файла: " . $file['error']);
        }
    } else {
        die("Файл не загружен.");
    }

   
    try {
        $stmt= $db->prepare("INSERT INTO plat (image, prix, libelle, id_categorie, description, active)
            VALUES (:image, :prix, :libelle, :id_categorie, :description, :active)");

        // Используем только имя файла и расширение
        $stmt->execute([
            ':libelle' => $libelle,
            ':prix' => $prix,
            ':image' => $newFileName, // Сохраняем новое имя файла
            ':id_categorie' => $cathegorie,
            ':description' => $description,
            ':active' => $active
        ]);

        header("Location: plats.php");
            exit();
    } catch (PDOException $e) {
        die("Ошибка при добавлении в базу данных: " . $e->getMessage());
    }
}
?>
