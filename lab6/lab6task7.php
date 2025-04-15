<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Обратная польская запись</h2>
    <form method="post">
        <label for="expression">Введите выражение:</label>
        <input type="text" name="expression" placeholder="8 9 + 1 7 - *" required>
        <button type="submit">Вычислить</button>
    </form>

    <?php
    if (!empty($_POST["expression"])) {
        $expr = $_POST["expression"];
        $tokens = explode(" ", $expr);
        $stack = [];

        foreach ($tokens as $token) {
            if (is_numeric($token)) {
                $stack[] = intval($token);
            } elseif (in_array($token, ['+', '-', '*'])) {
                $b = array_pop($stack);
                $a = array_pop($stack);

                switch ($token) {
                    case '+': $stack[] = $a + $b; break;
                    case '-': $stack[] = $a - $b; break;
                    case '*': $stack[] = $a * $b; break;
                }
            }
        }

        if (count($stack) === 1) {
            echo "<p>Результат: " . $stack[0] . "</p>";
        } else {
            echo "<p>Ошибка: некорректное выражение</p>";
        }
    }
    ?>
</body>
</html>
