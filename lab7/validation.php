<?php

function validateLength($value, $maxLength) {
    return is_string($value) && mb_strlen($value) <= $maxLength;
}


function validateTimestamp($timestamp, $allowFuture = false) {
    if (!is_numeric($timestamp)) return false;
    $currentTime = time();
    return ($allowFuture) 
        ? ($timestamp >= 0) 
        : ($timestamp >= 0 && $timestamp <= $currentTime);
}


function validateType($value, $type) {
    switch ($type) {
        case 'int': return is_int($value);
        case 'string': return is_string($value);
        default: return false;
    }
}


function validateUserIdExists($userId, $users) {
    $userIds = array_column($users, 'id');
    return in_array($userId, $userIds, true);
}


function validateUsersData($users) {
    $userIds = [];
    foreach ($users as $user) {
        // Проверка обязательных полей
        $requiredFields = ['id', 'name', 'avatar', 'createdAt', 'posts_count'];
        foreach ($requiredFields as $field) {
            if (!isset($user[$field])) {
                throw new Exception("Отсутствует поле '$field' у пользователя");
            }
        }

        // Проверка условий
        $checks = [
            'id' => validateType($user['id'], 'int') && $user['id'] > 0,
            'name' => validateType($user['name'], 'string') && 
                      validateLength($user['name'], 100) && 
                      !empty(trim($user['name'])),
            'avatar' => validateType($user['avatar'], 'string') && 
                       validateLength($user['avatar'], 255),
            'description' => (!isset($user['description']) || 
                            (validateType($user['description'], 'string') && 
                             validateLength($user['description'], 500))),
            'createdAt' => validateTimestamp($user['createdAt'], true),
            'posts_count' => validateType($user['posts_count'], 'int') && 
                            $user['posts_count'] >= 0
        ];

        if (in_array(false, $checks, true)) {
            throw new Exception("Невалидные данные пользователя ID: {$user['id']}");
        }

        // Проверка уникальности ID пользователя
        if (in_array($user['id'], $userIds)) {
            throw new Exception("Дубликат ID пользователя: {$user['id']}");
        }
        $userIds[] = $user['id'];
    }
}


function validatePostsData($posts, $users) {
    $postIds = [];
    foreach ($posts as $post) {
        // Проверка обязательных полей
        $requiredFields = ['id', 'user_id', 'image', 'description', 'likes', 'date'];
        foreach ($requiredFields as $field) {
            if (!isset($post[$field])) {
                throw new Exception("Отсутствует поле '$field' у поста");
            }
        }

        // Проверка условий
        $checks = [
            'id' => validateType($post['id'], 'int') && $post['id'] > 0,
            'user_id' => validateUserIdExists($post['user_id'], $users),
            'image' => validateType($post['image'], 'string') && 
                      validateLength($post['image'], 255),
            'description' => validateType($post['description'], 'string') && 
                            validateLength($post['description'], 1000) && 
                            (!empty(trim($post['description']))),
            'likes' => validateType($post['likes'], 'int') && $post['likes'] >= 0,
            'date' => validateTimestamp($post['date'])
        ];

        if (in_array(false, $checks, true)) {
            throw new Exception("Невалидные данные поста ID: {$post['id']}");
        }

        // Проверка уникальности ID поста (user_id может повторяться)
        if (in_array($post['id'], $postIds)) {
            throw new Exception("Дубликат ID поста: {$post['id']}");
        }
        $postIds[] = $post['id'];
    }
}