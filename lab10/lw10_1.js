function isPrime(num) {
    if (typeof num !== 'number' || !Number.isInteger(num) || num < 2) return false;
    for (let i = 2; i <= Math.sqrt(num); i++) {
        if (num % i === 0) return false;
    }
    return true;
}

function isPrimeNumber(input) {
    if (typeof input === 'number') {
        const result = isPrime(input) ? `${input} простое число` : `${input} не простое число`;
        console.log(result);
    } else if (Array.isArray(input)) {
        input.forEach(item => {
            if (typeof item !== 'number') {
                console.error(`Ошибка: элемент массива "${item}" не является числом`);
            } else {
                const result = isPrime(item) ? `${item} простое число` : `${item} не простое число`;
                console.log(result);
            }
        });
    } else {
        console.error('Ошибка: входной параметр должен быть числом или массивом чисел');
    }
}
isPrimeNumber(3)              // Результат: 3 простое число
isPrimeNumber(4)              // Результат: 4 не простое число
isPrimeNumber([3, 4, 5])  // Результат: 3, 5 простые числа, 4 не простое число