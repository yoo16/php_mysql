<?php
require_once 'Model.php';

class User extends Model
{
    public function auth($email, $password)
    {
        $this->findByEmail($email);
        return (password_verify($password, $this->value['password']));
    }

    public function validate($data)
    {
        $errors = [];
        if (empty($data['name'])) $errors['name'] = 'ユーザ名を入力してください。';
        if (empty($data['email'])) $errors['email'] = 'Emailを入力してください。';
        if (empty($data['password'])) $errors['password'] = 'パスワードを入力してください。';
        return $errors;
    }

    public function all($limit = 20, $offset = 0)
    {
        $sql = "SELECT * FROM users LIMIT {$limit} OFFSET {$offset};";
        $this->values = $this->pdo->query($sql);
        return $this->values;
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $this->value = $stmt->fetch(PDO::FETCH_ASSOC);
        return $this->value;
    }

    public function findByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $this->value = $stmt->fetch(PDO::FETCH_ASSOC);
        return $this->value;
    }

    public function insert($data)
    {
        $sql = "INSERT INTO users (name, email, password, gender)
            VALUES (:name, :email, :password, :gender)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }

    public function update($data)
    {
        $sql = "UPDATE users SET 
            name = :name,
            email = :email,
            password = password:
            gender = gender:
            WHERE id = :id;";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id = :id;";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    public function count()
    {
        $sql = "SELECT count(id) AS count FROM users;";
        $row = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $row['count'];
    }
}
