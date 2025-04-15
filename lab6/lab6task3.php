<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Знак зодиака</h2>
    <form method="post">
        <label for="birthdate">Введите дату в формате ДД.ММ.ГГГГ:</label>
        <input type="text" name="birthdate" placeholder="01.02.1993">
    </form>

    <?php
    if (!empty($_POST["birthdate"])) {
        $parts = explode('.', $_POST["birthdate"]);
        if (count($parts) == 3) {
            $day = (int)$parts[0];
            $month = (int)$parts[1];

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
                if (($month == 12 && $day >= 21) || ($month == 1 && $day <= 19)) return "Козерог";
                return "Неверная дата";
            }

            echo "<p>" . zodiac($day, $month) . "</p>";
        } else {
            echo "<p>Неверный формат даты</p>";
        }
    }
    ?>
</body>
</html>
