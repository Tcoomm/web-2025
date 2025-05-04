function countVowels(str) {
    if (typeof str !== 'string') {
        console.error('Ошибка: вход должен быть строкой');
        return;
    }

    const vowels = 'аеёиоуыэюяАЕЁИОУЫЭЮЯ';
    let count = 0;

    for (let char of str) {
        if (vowels.includes(char)) count++;
    }

    console.log(`Количество гласных: ${count}`);
}
countVowels("Привет, мир!") // 3 (и, е, и)
