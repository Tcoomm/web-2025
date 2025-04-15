<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Знак зодиака (произвольный формат даты)</h2>
    <form method="post">
        <label for="date">Введите дату (например: 15.04.1995, 15-04-1995, 15/04/1995):</label>
        <input type="text" name="date" placeholder="15.04.1995">
    </form>

    <?php

if (!empty($_POST["date"])) {
    $input = $_POST["date"];
    // Создаём пустую строку, куда будем накапливать только цифры из $input
    $digits = '';
    // Проходим по каждому символу строки $input
    for ($i = 0; $i < strlen($input); $i++) {
        // Если символ — цифра (0–9), добавляем его к строке $digits
        if (ctype_digit($input[$i])) {
            $digits .= $input[$i];
        }
    }
    // Проверяем, что в полученной строке хотя бы 4 цифры (2 на день и 2 на месяц)
    if (strlen($digits) >= 4) {
        // Извлекаем первые две цифры — это день
        $day = intval(substr($digits, 0, 2));
        // Извлекаем следующие две цифры — это месяц
        $month = intval(substr($digits, 2, 2));
            function zodiac($day, $month) {
                if (($month == 1 && $day >= 20) || ($month == 2 && $day <= 18)) return "Водолей";
                if (($month == 2 && $day >= 19) || ($month == 3 && $day <= 20)) return "Рыбы";
                if (($month == 3 && $day >= 21) || ($month == 4 && $day <= 19)) return "Овен";
                if (($month == 4 && $day >= 20) || ($month == 5 && $day <= 20)) return "Телец";
                if (($month == 5 && $day >= 21) || ($month == 6 && $day <= 20)) return "Близнецы";
                if (($month == 6 && $day >= 21) || ($month == 7 && $day <= 22)) return "Рак";
                if (($month == 7 && $day >= 23) || ($month == 8 && $day <= 22)) return "Лев";
                if (($month == 8 && $day >= 23) || ($month == 9 && $day <= 22)) return "Дева";
                if (($month == 9 && $day >= 23) || ($month == 10 && $day <= 22)) return "Весы";
                if (($month == 10 && $day >= 23) || ($month == 11 && $day <= 21)) return "Скорпион";
                if (($month == 11 && $day >= 22) || ($month == 12 && $day <= 21)) return "Стрелец";
                return "Козерог";
            }

            echo "<p>" . zodiac($day, $month) . "</p>";
        } else {
            echo "<p>Ошибка: невозможно извлечь день и месяц</p>";
        }
    }
    ?>
</body>
</html>
