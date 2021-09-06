<?php
require_once 'Model.php';

class User extends Model
{
    public function auth($email, $password)
    {
        $value = $this->findByEmail($email);
        return (password_verify($password, $value['password']));
    }

    public function validate($data)
    {
        $errors = [];
        if (empty($data['name'])) $errors['name'] = 'ユーザ名を入力してください。';
        if (empty($data['email'])) $errors['email'] = 'Emailを入力してください。';
        if (empty($data['password'])) $errors['password'] = 'パスワードを入力してください。';
        return $errors;
    }

    public function validateEdit($data)
    {
        $errors = [];
        if (empty($data['name'])) $errors['name'] = 'ユーザ名を入力してください。';
        if (empty($data['email'])) $errors['email'] = 'Emailを入力してください。';
        return $errors;
    }

    public function validatePassword($data)
    {
        $errors = [];
        if (empty($data['new_password'])) {
            $errors['new_password'] = '新しいパスワードを入力してください。';
        } else if (empty($data['new_password_2'])) {
            $errors['new_password'] = '新しいパスワード（確認用）を入力してください。';
        } else if ($data['new_password']) {
            $errors['new_password'] = 'パスワードが一致していません。';
        }
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
        $value = $stmt->fetch(PDO::FETCH_ASSOC);
        return $value;
    }

    public function insert($data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (name, email, password, gender)
            VALUES (:name, :email, :password, :gender)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }

    public function update($data)
    {
        foreach (array_keys($data) as $column) {
            if ($column != 'id') $columns[] = "{$column} = :{$column}";
        }
        $column = implode(',', $columns);
        $sql = "UPDATE users SET {$column} WHERE id = :id;";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }

    public function saveAuth($id)
    {
        $this->findById($id);
        if ($this->value) Session::save('auth_user', $this->value);
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
