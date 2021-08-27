CREATE TABLE users (
    id bigint(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name varchar(32) NOT NULL,
    kana varchar(32) NOT NULL,
    email varchar(255) UNIQUE NOT NULL,
    password varchar(255) NOT NULL,
    tel varchar(32) DEFAULT NULL,
    birthday_at datetime DEFAULT NULL,
    gender varchar(8) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
