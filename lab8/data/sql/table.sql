CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    photo VARCHAR(255),
    text TEXT,
    timestamp INT,
    likes INT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
