<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Переводчик</h2>
    <form method="post">
        <label for="digit">Введите цифру от 0 до 9:</label>
        <input type="number" name="digit" min="0" max="9">
    </form>

    <?php
    if (isset($_POST["digit"]) && $_POST["digit"] !== ''){
        $digit = $_POST["digit"];
        $words = ["Ноль", "Один", "Два", "Три", "Четыре", "Пять", "Шесть", "Семь", "Восемь", "Девять"];
        if ($digit >= 0 && $digit <= 9) {
            echo "<p>$words[$digit]</p>";
        } else {
            echo "<p>Ошибка: Введите цифру от 0 до 9.</p>";
        }
    }
    ?>
</body>
</html>
