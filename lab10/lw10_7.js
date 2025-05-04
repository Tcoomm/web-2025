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

    // Гарантированное включение всех 4 категорий
    const passwordChars = [
        getRandomChar(lowercase),
        getRandomChar(uppercase),
        getRandomChar(digits),
        getRandomChar(symbols),
    ];

    // Остальные символы — любые
    for (let i = 4; i < length; i++) {
        passwordChars.push(getRandomChar(allChars));
    }

    // Перемешать символы
    return passwordChars.sort(() => Math.random() - 0.5).join('');
}
console.log(generatePassword(8));  // Пример вывода: A8!rtsKd
