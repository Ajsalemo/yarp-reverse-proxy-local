CREATE DATABASE phpyarp;

CREATE TABLE todos (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    todo VARCHAR(255) NOT NULL,
    completed BOOLEAN NOT NULL
);

INSERT INTO todos (
    todo,
    completed
) VALUES 
('sweep the floor', false),
('clean the car', false),
('mow the grass', true),
('vacuum the carpet', true);