<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Факториал (рекурсивно)</h2>
    <form method="post">
        <label for="n">Введите целое число:</label>
        <input type="number" name="n" min="0" required>
        <button type="submit">Вычислить</button>
    </form>

    <?php
    function factorial($n) {
        if ($n <= 1) return 1;
        return $n * factorial($n - 1);
    }

    if (isset($_POST["n"])) {
        $n = intval($_POST["n"]);
        $result = factorial($n);
        echo "<p>$result</p>";
    }
    ?>
</body>
</html>
