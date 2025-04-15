<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="styles/home_style.css" rel="stylesheet">
    <title>Home</title>
</head>
<body>
    <!-- Блок навигации -->
    <div class="nav-bar">
        <button class="nav-bar__icon"><img src="images/home.svg" alt="Лента"></button>  
        <img src="images/Dot.svg" alt="Dot" class="nav-bar__separator">
        <button class="nav-bar__icon"><img src="images/Profile.svg" alt="Профиль"></button>
        <button class="nav-bar__icon"><img src="images/New_post.svg" alt="Добавить пост"></button>
    </div>
    
    <!-- Блок поста -->
    <?php
    require_once 'load_data.php';
    

// Подготовка данных для шаблона поста
    foreach ($posts as $post) {
    $author = $users[array_search($post['user_id'], array_column($users, 'id'))];
    $post['author_name'] = $author['name'];
    include 'templates/post_templates.php';
    }
    ?> 
</body>
</html>