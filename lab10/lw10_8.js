function transformArray(arr) {
    if (!Array.isArray(arr)) {
        console.error('Ошибка: вход должен быть массивом чисел');
        return;
    }

    const mapped = arr.map(x => x * 3);
    const filtered = mapped.filter(x => x > 10);

    console.log(filtered);
    return filtered;
}
transformArray([1, 2, 3, 4, 5]);
// map:  [3, 6, 9, 12, 15]
// filter: [12, 15]
