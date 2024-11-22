<?php
session_start();
include 'connexion.php';
include 'DAO.php';

// Проверяем входные данные
if (!isset($_POST['plat_id'], $_POST['action'])) {
    die('Ошибка: ID товара или действие не переданы!');
}

$plat_id = $_POST['plat_id'];
$action = $_POST['action'];
$cat_id = $_POST['id_categorie'] ?? null;

// Инициализируем корзину
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

switch ($action) {
    case 'add_to_cart':
        $productKey = array_search($plat_id, array_column($_SESSION['cart'], 'id'));

        if ($productKey !== false) {
            // Увеличиваем количество, если товар уже есть
            $_SESSION['cart'][$productKey]['quantity'] += 1;
        } else {
            // Добавляем новый товар в корзину
            $_SESSION['cart'][] = [
                'id' => $plat_id,
                'name' => $_POST['plat_name'],
                'price' => $_POST['plat_prix'],
                'quantity' => 1,
            ];
        }
        break;

    case 'buy_now':
        // Добавляем товар в корзину и перенаправляем на оплату
        $_SESSION['cart'][] = [
            'id' => $plat_id,
            'name' => $_POST['plat_name'],
            'price' => $_POST['plat_prix'],
            'quantity' => 1,
        ];
        header('Location: checkout.php');
        exit();

    default:
        die('Ошибка: Неизвестное действие!');
}

header('Location: categorie.php?id=' . $cat_id);
exit();



?>
