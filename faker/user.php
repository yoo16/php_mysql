<?php
require_once __DIR__ . '/../vendor/fzaninotto/faker/src/autoload.php';
$faker = Faker\Factory::create('ja_JP');
// $faker = Faker\Factory::create();

$table_name = 'users';
$columns = ['name', 'email', 'password', 'gender'];
$gender = ['male', 'female'];

foreach (range(1, 100) as $index) {
    $user['name'] = $faker->name;
    $user['email'] = $faker->email;
    $user['password'] = password_hash('password', PASSWORD_BCRYPT);
    $user['gender'] = $faker->randomElement($gender);
    $users[] = $user;
}

$file_path = __DIR__ . '/../sql/insert_users.sql';
$file = fopen($file_path, 'a+');

$sql_column = implode(',', $columns);
foreach ($users as $user) {
    foreach ($user as $column => $value) {
        $values[$column] = "'{$value}'";
    }
    $sql_value = implode(',', $values);
    $sql = "INSERT INTO {$table_name} ($sql_column) VALUES ($sql_value);" . PHP_EOL;

    fputs($file, $sql);
}
fclose($file);
