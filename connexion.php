<?php
    $host = 'localhost';
    $db = 'resto';
    $user = 'root'; 
    $pass = '20021975'; 
    try {
        $db = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }