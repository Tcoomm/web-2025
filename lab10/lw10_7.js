function generatePassword(length) {
    if (length < 4) {
        console.error('Ошибка: длина пароля должна быть не меньше 4');
        return;
    }

    const lowercase = 'abcdefghijklmnopqrstuvwxyz';
    const uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const digits = '0123456789';
    const symbols = '!@#$%^&*()_+-=<>?';

    function getRandomChar(str) {
        return str[Math.floor(Math.random() * str.length)];
    }

    const allChars = lowercase + uppercase + digits + symbols;

    const passwordChars = [
        getRandomChar(lowercase),
        getRandomChar(uppercase),
        getRandomChar(digits),
        getRandomChar(symbols),
    ]
    for (let i = 4; i < length; i++) {
        passwordChars.push(getRandomChar(allChars));
    }
    // Fisher–Yates shuffle
    for (let i = passwordChars.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [passwordChars[i], passwordChars[j]] = [passwordChars[j], passwordChars[i]];
    }
    return passwordChars.join('');
}
console.log(generatePassword(8));  // Пример вывода: A8!rtsKd


// Использование сортировки и случайного выбора (например, arr.sort(() => 0.5 - Math.random())) для перемешивания массива не рекомендуется, так как оно приводит к смещенным результатам и не обеспечивает равных шансов для каждого возможного порядка элементов. Более эффективным методом является использование алгоритма перемешивания Фишера-Йейтса (или его разновидностей), который обеспечивает равномерное распределение вероятностей и гарантирует несмещенные результаты. 