INSERT INTO users (account_name, email, display_name, password, created_at, updated_at) VALUES
('john_doe', 'john@example.com', 'John Doe', '$2b$10$eB9ePBsEb3NK7mHiN0c8ZOJL.HoqiKc39sEyyDklSTUAdp6S3o9Zy', NOW(), NULL),
('jane_smith', 'jane@example.com', 'Jane Smith', '$2b$10$eB9ePBsEb3NK7mHiN0c8ZOJL.HoqiKc39sEyyDklSTUAdp6S3o9Zy', NOW(), NULL),
('alice_wonder', 'alice@example.com', 'Alice Wonder', '$2b$10$eB9ePBsEb3NK7mHiN0c8ZOJL.HoqiKc39sEyyDklSTUAdp6S3o9Zy', NOW(), NULL),
('bob_builder', 'bob@example.com', 'Bob Builder', '$2b$10$eB9ePBsEb3NK7mHiN0c8ZOJL.HoqiKc39sEyyDklSTUAdp6S3o9Zy', NOW(), NULL),
('charlie_brown', 'charlie@example.com', 'Charlie Brown', '$2b$10$eB9ePBsEb3NK7mHiN0c8ZOJL.HoqiKc39sEyyDklSTUAdp6S3o9Zy', NOW(), NULL),
('daisy_duck', 'daisy@example.com', 'Daisy Duck', '$2b$10$eB9ePBsEb3NK7mHiN0c8ZOJL.HoqiKc39sEyyDklSTUAdp6S3o9Zy', NOW(), NULL),
('ethan_hunt', 'ethan@example.com', 'Ethan Hunt', '$2b$10$eB9ePBsEb3NK7mHiN0c8ZOJL.HoqiKc39sEyyDklSTUAdp6S3o9Zy', NOW(), NULL),
('fiona_apple', 'fiona@example.com', 'Fiona Apple', '$2b$10$eB9ePBsEb3NK7mHiN0c8ZOJL.HoqiKc39sEyyDklSTUAdp6S3o9Zy', NOW(), NULL),
('george_clark', 'george@example.com', 'George Clark', '$2b$10$eB9ePBsEb3NK7mHiN0c8ZOJL.HoqiKc39sEyyDklSTUAdp6S3o9Zy', NOW(), NULL),
('hannah_montana', 'hannah@example.com', 'Hannah Montana', '$2b$10$eB9ePBsEb3NK7mHiN0c8ZOJL.HoqiKc39sEyyDklSTUAdp6S3o9Zy', NOW(), NULL);

INSERT INTO tweets (message, user_id, image_path, created_at, updated_at) VALUES
('今日もいい天気ですね。', 1, NULL, NOW(), NULL),
('ランチはカレーにしました！🍛', 2, NULL, NOW(), NULL),
('新しいプロジェクトが始まった💻', 3, 'images/project.png', NOW(), NULL),
('猫の写真をアップしました🐱', 1, 'images/cat.jpg', NOW(), NULL),
('今夜は映画鑑賞🎬', 1, NULL, NOW(), NULL),
('Reactの勉強中！', 6, NULL, NOW(), NULL),
('週末は登山に行ってきました⛰️', 7, 'images/mountain.jpg', NOW(), NULL),
('コーヒーが手放せない☕️', 8, NULL, NOW(), NULL),
('ランニング5km達成！🏃', 8, NULL, NOW(), NULL),
('読書の秋📚 最近のお気に入りはミステリー小説。', 3, NULL, NOW(), NULL);

