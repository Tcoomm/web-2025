<?php
// Подключение к базе данных
try {
    $pdo = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}

// Получаем пользователей
$users = $pdo->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);

// Получаем посты
$posts = $pdo->query("SELECT * FROM posts")->fetchAll(PDO::FETCH_ASSOC);
?>
