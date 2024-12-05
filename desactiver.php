<?php
 include 'connexion.php';
 include 'DAO.php'; 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $libelle = $_POST['Libelle'];
    $categorie = $_POST['Catégory'];
    $prix = $_POST['Prix'];
    $description = $_POST['description'];
    $active = $_POST['Active'];

    // Извлекаем текущее значение имени файла из базы данных
    $requete = $db->prepare("SELECT image FROM plat WHERE id = ?");
    $requete->execute([$id]);
    $currentImage = $requete->fetchColumn(); // Получаем текущее имя файла

    // Проверяем наличие файла
    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        
        // Проверяем, был ли файл успешно загружен
        if ($file['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $file['tmp_name'];
            $fileName = $file['name'];
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
            $newFileName = uniqid() . '.' . $fileExtension;
            $uploadFileDir = './src/';
            $dest_path = $uploadFileDir . $newFileName;

            // Перемещение загруженного файла
            if (!move_uploaded_file($fileTmpPath, $dest_path)) {
                die("Erreur de téléchargement.");
            }

            // Обновляем переменную текущего изображения, если файл загружен
            $currentImage = $newFileName;
        } elseif ($file['error'] === UPLOAD_ERR_NO_FILE) {
            
        } else {
            // Если произошла другая ошибка
            die("Erreur de téléchargement: " . $file['error']);
        }
    }

    // Запись информации в базу данных
    try {
        $request = $pdo->prepare("UPDATE resto.plat
            SET libelle=tlibelle, prix=:prix, image=:image, id_categorie=:id_cat, descriprion=:descriprion, active=:active,
            WHERE id=:id");

$request->execute([
            ':libelle' => $libelle,
            ':id_cat' => $categorie,
            ':image' => $image, // Используем текущее или новое значение имени файла
            ':prix' => $prix,
            ':descriprion' => $descriprion,
            ':active' => $active,
            
        ]);

        if ($request->rowCount() > 0) {
            header("Location: plats.php");
            exit();
        } else {
            echo "Запись не найдена или данные не изменены.";
        }
    } catch (PDOException $e) {
        die("Ошибка при обновлении в базу данных: " . $e->getMessage());
    }
}
?>
