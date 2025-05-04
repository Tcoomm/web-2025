function extractNames(users) {
    if (!Array.isArray(users)) {
        console.error('Ошибка: вход должен быть массивом объектов');
        return;
    }

    const names = users.map(user => user.name);
    console.log(names);
    return names;
}


const users = [
    { id: 1, name: "Alice" },
    { id: 2, name: "Bob" },
    { id: 3, name: "Charlie" }
];

extractNames(users);
// Вывод: ["Alice", "Bob", "Charlie"]
