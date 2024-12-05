<?php
include 'connexion.php';  
// Включаем отображение ошибок для отладки
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); // Убедитесь, что сессия стартована

// Проверяем, есть ли необходимые данные в POST запросе
if (!isset($_POST['nom'], $_POST['prenom'], $_POST['telephone'], $_POST['email'], $_POST['adresse'])) {
    die("Ошибка: Некоторые данные не были переданы в форму!");
}

// Формируем имя файла
$date = date('Ymd');
$nomfile = $_POST["nom"] . $_POST["prenom"] . '_' . $date . ".txt";
$cards = $_SESSION['cart'] ?? []; // Проверка на наличие товаров в корзине

// Если корзина пуста, выводим ошибку
if (empty($cards)) {
    die("Ошибка: В корзине нет товаров.");
}

$liste = comm($cards); // Формируем список заказанных товаров
$myfile = fopen($nomfile, "w");

// Формируем текст для записи в файл
$text = "Nom: " . $_POST["nom"] . "\n" .
        "Prénom: " . $_POST["prenom"] . "\n" .
        "Téléphone: " . $_POST["telephone"] . "\n" .
        "Email: " . $_POST["email"] . "\n" .
        "Adresse de livraison: " . $_POST["adresse"] . "\n" .
        "Commande:\n" . $liste;

// Записываем в файл
fwrite($myfile, $text);
fclose($myfile);

// Функция для формирования списка покупок
function comm($cards) {
    $result = ""; // Для накопления результата
    foreach ($cards as $card) {
        $result .= $card['name'] . "     " . $card['quantite'] . "\n";
    }
    return $result; // Возвращаем результат
}

// Функция для добавления данных в базу данных
function add_commandToBase() {
    global $db; // Предполагаем, что $db уже инициализирован для работы с БД

    try {
        $addcombase = $db->prepare('INSERT INTO resto.commande
        (id_plat, quantite, total, date_commande, etat, nom_client, telephone_client, email_client, adresse_client)
        VALUES(:id_plat, :quantite, :total, :date_commande, :etat, :nom_client, :telephone_client, :email_client, :adresse_client);');
        
        // Заполняем данные
        $addcombase->execute([
            ':id_plat' => $_SESSION['cart'][0]['id'],
            ':quantite' => $_SESSION['cart'][0]['quantite'],
            ':total' => $_SESSION['cart'][0]['price'] * $_SESSION['cart'][0]['quantite'],
            ':date_commande' => date('Ymd'),
            ':etat' => 'Nouvelle',
            ':nom_client' => $_POST['nom'].' '. $_POST['prenom'],
            ':telephone_client' => $_POST['telephone'],
            ':email_client'=> $_POST['email'],
            ':adresse_client'=> $_POST['adresse'],
        ]);

    } catch (PDOException $e) {
        die("Ошибка при добавлении в базу данных: " . $e->getMessage());
    }
}

// Добавляем заказ в базу данных
add_commandToBase();

// Очищаем корзину
session_destroy();

// Перенаправляем на страницу благодарности
header('Location: remerciement.php');
exit();
?>
