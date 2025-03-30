DROP TABLE IF EXISTS items;

CREATE TABLE items (
    id bigint UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) UNIQUE NOT NULL,
    type varchar(255) NOT NULL,
    price int NOT NULL,
    attack_power int NOT NULL,
    defense_power int NOT NULL,
    created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);