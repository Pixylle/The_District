<?php
session_start(); // Убедитесь, что сессия стартована

$date = date('Ymd');
$nomfile = $_POST["nom"] . $_POST["prenom"] . '_' . $date . ".txt";
$cards = $_SESSION['cart'] ?? []; // Проверка, чтобы избежать ошибок, если корзина пуста

$liste = comm($cards); // Передаем корзину в функцию
$myfile = fopen($nomfile, "w");

// Формируем текст для записи в файл
$text = "Nom: " . $_POST["nom"] . "\n" .
        "Prénom: " . $_POST["prenom"] . "\n" .
        "Téléphone: " . $_POST["telephone"] . "\n" .
        "Email: " . $_POST["email"] . "\n" .
        "Commande:\n" . $liste;

// Записываем в файл
fwrite($myfile, $text);
fclose($myfile);

// Функция для формирования списка покупок
function comm($cards) {
    $result = ""; // Для накопления результата
    foreach ($cards as $card) {
        $result .= $card['name'] . "     " . $card['quantity'] . "\n";
    }
    return $result; // Возвращаем результат
}

session_destroy();
header('Location: remerciement.php');
?>

