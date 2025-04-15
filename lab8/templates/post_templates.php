<div class="post">
    <div class="profile">
        <img class="profile__avatar" src="<?= htmlspecialchars($users[$post['user_id'] - 1]['avatar'] ?? 'images/default.png') ?>" alt="Аватар">
        <span class="profile__name"><?= htmlspecialchars($users[$post['user_id'] - 1]['name'] ?? 'Неизвестный') ?></span>
        <button class="profile__edit-btn"><img src="images/Edit.svg" alt="Редактировать"></button>
    </div>

    <img class="post__image" src="<?= htmlspecialchars($post['image']) ?>" alt="Пост">
    <span class="post__description"><?= htmlspecialchars($post['description']) ?></span>
    <button class="post__more-btn">ещё</button>
    <span class="post__date"><?= date('d.m.Y', $post['date']) ?></span>

    <button class="post__like-btn">
        <img src="images/heart.png" alt="Лайк">
        <?= htmlspecialchars($post['likes']) ?>
    </button>
</div>
