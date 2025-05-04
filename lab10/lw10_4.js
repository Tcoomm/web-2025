function mergeObjects(obj1, obj2) {
    if (typeof obj1 !== 'object' || typeof obj2 !== 'object' || obj1 === null || obj2 === null) {
        console.error('Ошибка: оба параметра должны быть объектами');
        return;
    }

    const merged = { ...obj1, ...obj2 }; // obj2 перезаписывает obj1
    console.log(merged);
    return merged;
}
mergeObjects({ a: 1, b: 2 }, { b: 3, c: 4 }) // { a: 1, b: 3, c: 4 }
