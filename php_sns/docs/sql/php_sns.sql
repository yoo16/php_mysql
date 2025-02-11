CREATE TABLE users (
    id bigint PRIMARY KEY AUTO_INCREMENT,
    account_name varchar(255) UNIQUE NOT NULL,
    email varchar(255) UNIQUE NOT NULL,
    password varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    profile text DEFAULT NULL,
    created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at datetime NULL DEFAULT NULL
);

CREATE TABLE tweets (
  id bigint Primary KEY AUTO_INCREMENT,
  message text NOT NULL,
  user_id bigint NOT NULL,
  image_path text DEFAULT NULL,
  created_at timestamp NULL DEFAULT current_timestamp(),
  updated_at timestamp NULL DEFAULT NULL
);

CREATE TABLE likes (
  id bigint Primary KEY AUTO_INCREMENT,
  user_id bigint NOT NULL,
  tweet_id bigint NOT NULL,
  created_at timestamp NULL DEFAULT current_timestamp(),
  updated_at timestamp NULL DEFAULT NULL
);

ALTER TABLE likes ADD CONSTRAINT likes_user_id_fk FOREIGN KEY (user_id) 
  REFERENCES users(id) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE;

ALTER TABLE likes ADD CONSTRAINT likes_tweet_id_fk FOREIGN KEY (tweet_id) 
  REFERENCES tweets(id) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE;