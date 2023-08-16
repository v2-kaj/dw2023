CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    seller INT NOT NULL,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(100) NOT NULL,
    image_path VARCHAR(255) NOT NULL, -- Storing the image path instead of image data
    price FLOAT(6,2),
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (seller) REFERENCES users(id)
);
