function uniqueElements(arr) {
    if (!Array.isArray(arr)) {
        console.error('Ошибка: вход должен быть массивом');
        return;
    }
    const result = {};

    for (let item of arr) {
        const key = String(item); // приводим всё к строке
        if (result[key]) {
            result[key]++;
        } else {
            result[key] = 1;
        }
    }

    console.log(result);
    return result;
}
uniqueElements(['привет', 'hello', 1, '1']); // {'привет': 1, 'hello': 1, '1': 2}