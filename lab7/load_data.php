<?php
require_once 'validation.php';

try {
    // Загрузка данных
    $users = json_decode(file_get_contents('data/users.json'), true);
    $posts = json_decode(file_get_contents('data/posts.json'), true);

    // Валидация
    validateUsersData($users);
    validatePostsData($posts, $users);

} catch (Exception $e) {
    die("Ошибка валидации: " . $e->getMessage());
}

// Данные готовы к использованию