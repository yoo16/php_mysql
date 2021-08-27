CREATE TABLE users (
    id bigint(20) UNSIGNED NOT NULL,
    name varchar(32) NOT NULL,
    kana varchar(32) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    tel varchar(32) NOT NULL,
    year int(11) NOT NULL,
    gender varchar(8) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;