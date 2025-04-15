<!-- Блок информации -->
<div class="info">
    <img class="info__avatar" src="<?= htmlspecialchars($user['avatar']) ?>" alt="Фото профиля">
    <h2 class="info__name"><?= htmlspecialchars($user['name']) ?></h2>
    <span class="info__description"><?= htmlspecialchars($user['description'] ?? '') ?></span>
    <button class="info__counter">
        <img src="images/count_posts.svg">
        <?= htmlspecialchars($user['posts_count']) ?> постов 
    </button>
</div>

<!-- Блок галереи -->
<div class="gallery">
    <?php foreach ($userPosts as $post): ?>
        <img class="gallery__item" src="<?= htmlspecialchars($post['image']) ?>" alt="Пост">
    <?php endforeach; ?>
</div>