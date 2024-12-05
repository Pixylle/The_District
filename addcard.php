<?php
session_start();
include 'connexion.php';
include 'DAO.php';

// Проверяем наличие всех необходимых данных
if (!isset($_POST['id'], $_POST['libelle'], $_POST['prix'], $_POST['quantite'])) {
    die('Ошибка: Не все необходимые данные переданы!');
}

// Получаем данные из формы
$plat_id = intval($_POST['id']); // Приведение к числу для безопасности
$libelle = htmlspecialchars($_POST['libelle']); // Защита от XSS
$prix = $_POST['prix']; 
$quantite = $_POST['quantite']; 
$image = $_POST['image']; 

// Инициализируем корзину, если она пуста
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Если корзина пустая, добавляем товар
if (empty($_SESSION['cart'])) {
    $_SESSION['cart'][] = [
        'id' => $plat_id,
        'name' => $libelle,
        'price' => $prix,
        'quantite' => $quantite,
        'image' => $image,
    ];
} else {
    // Проверяем, есть ли уже товар в корзине
    $existing_item = $_SESSION['cart'][0]; // Корзина содержит только один товар

    if ($existing_item['id'] === $plat_id) {
        // Если это тот же товар, увеличиваем его количество
        $_SESSION['cart'][0]['quantite'] += $quantite;
    } else {
        // Если это другой товар, выводим ошибку
        die('Erreur : Vous ne pouvez commander qu\'un seul plat à la fois!');
    }
}

// Перенаправляем пользователя на страницу после успешного добавления
header('Location: contact.php');
exit();
?>
