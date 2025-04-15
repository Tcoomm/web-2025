<?php
require_once 'load_data.php';

// Если параметр id не передан - редирект на home.php
if (!isset($_GET['id'])) {
    header('Location: home.php');
    exit();
}

// Получение ID пользователя
$userId = (int)$_GET['id'];

// Поиск пользователя
$user = null;
foreach ($users as $u) {
    if ($u['id'] === $userId) {
        $user = $u;
        break;
    }
}

// Редирект, если пользователь не найден
if (!$user) {
    header('Location: home.php');
    exit();
}

// Фильтрация постов пользователя
$userPosts = array_filter($posts, fn($p) => $p['user_id'] === $userId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="styles/profile_style.css" rel="stylesheet">
    <title>Профиль: <?= htmlspecialchars($user['name']) ?></title>
</head>
<body>
    <!-- Блок навигации -->
    <div class="nav-bar">
        <button class="nav-bar__icon"><img src="images/Home.svg" alt="Лента"></button>  
        <button class="nav-bar__icon"><img src="images/Profile.svg" alt="Профиль"></button>
        <img src="images/Dot.svg" alt="Dot" class="nav-bar__separator">
        <button class="nav-bar__icon"><img src="images/New_post.svg" alt="Добавить пост"></button>
    </div>

    <!-- Подключение шаблона профиля -->
    <?php include 'templates/templates_profile.php'; ?>
</body>
</html>